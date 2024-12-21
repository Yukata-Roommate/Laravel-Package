<?php

namespace YukataRm\Laravel\Package\Command\Make;

use YukataRm\Laravel\Package\Command\Base\Make\AppEntityCommand;

/**
 * Request Entity Make Command
 *
 * @package YukataRm\Laravel\Package\Command\Make
 */
class RequestEntityMakeCommand extends AppEntityCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "request-entity";

    /**
     * option names
     *
     * @var array<string>
     */
    protected array $options = ["pagination"];

    /**
     * parent class name
     *
     * @var string
     */
    protected string $parent = "request";

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * whether to use pagination
     *
     * @var bool
     */
    protected bool $pagination;

    /**
     * set parameter
     *
     * @return void
     */
    #[\Override]
    protected function setParameter(): void
    {
        parent::setParameter();

        $this->pagination = $this->option("pagination");
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
        return [];
    }

    /**
     * get replace value
     *
     * @return array<string>
     */
    protected function replace(): array
    {
        return [];
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
            $this->pagination => "pagination",

            default => "default",
        };

        return $this->stubPath($fileName);
    }
}
