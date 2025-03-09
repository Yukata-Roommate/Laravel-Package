<?php

namespace YukataRm\Laravel\Package\Command\Make;

use YukataRm\Laravel\Package\Command\Base\Make\AppCommand;

use YukataRm\Text\Proxies\Text;

/**
 * Service Make Command
 *
 * @package YukataRm\Laravel\Package\Command\Make
 */
class ServiceMakeCommand extends AppCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "service";

    /**
     * option names
     *
     * @var array<string>
     */
    protected array $options = ["redirect", "both", "entity"];

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * whether to return redirect response
     *
     * @var bool
     */
    protected bool $redirect;

    /**
     * whether to return view and redirect response
     *
     * @var bool
     */
    protected bool $both;

    /**
     * whether to use entity
     *
     * @var bool
     */
    protected bool $entity;

    /**
     * set parameter
     *
     * @return void
     */
    #[\Override]
    protected function setParameter(): void
    {
        parent::setParameter();

        $this->redirect = $this->option("redirect");
        $this->both     = $this->option("both");
        $this->entity   = $this->option("entity");
    }

    /*----------------------------------------*
     * Process
     *----------------------------------------*/

    /**
     * get search key
     *
     * @return array<string>
     */
    protected function search(): array
    {
        return [
            "RequestEntityClassName",
            "Name",
            "RepositoryFacadeMethod",
            "VariableName",
            "ModelClassName",
        ];
    }

    /**
     * get replace value
     *
     * @return array<string>
     */
    protected function replace(): array
    {
        $directory = array_map(fn($directory) => Text::toCamel($directory), $this->directory);

        return [
            $this->requestEntityClassName($this->targetUpper()),
            implode(".", $directory),
            implode("()->", $directory),
            end($directory),
            $this->modelClassName(),
        ];
    }

    /**
     * get stub file path
     *
     * @return string
     */
    protected function stub(): string
    {
        if ($this->resource) return $this->resourceStubPath($this->target);

        $fileName = match (true) {
            $this->entity && $this->both     => "entity.both",
            $this->entity && $this->redirect => "entity.redirect",
            $this->entity                    => "entity",
            $this->both                      => "both",
            $this->redirect                  => "redirect",

            default => "default",
        };

        return $this->stubPath($fileName);
    }
}
