<?php

namespace YukataRm\Laravel\Package\Command\Make;

use YukataRm\Laravel\Package\Command\Base\Make\AppCommand;

/**
 * Repository Make Command
 *
 * @package YukataRm\Laravel\Package\Command\Make
 */
class RepositoryMakeCommand extends AppCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "repository";

    /**
     * option names
     *
     * @var array<string>
     */
    protected array $options = ["custom"];

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * whether to use custom
     *
     * @var bool
     */
    protected bool $custom;

    /**
     * set parameter
     *
     * @return void
     */
    #[\Override]
    protected function setParameter(): void
    {
        parent::setParameter();

        $this->custom = $this->option("custom");
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
            "RepositoryEntityClassName",
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
        return [
            $this->repositoryEntityClassName($this->targetUpper()),
            $this->modelClassName($this->targetUpper()),
        ];
    }

    /**
     * get stub file path
     *
     * @return string
     */
    protected function stub(): string
    {
        $fileName = match (true) {
            $this->custom => "custom",

            default => "default",
        };

        return $this->stubPath($fileName);
    }
}
