<?php

namespace YukataRm\Laravel\Package\Command\Make;

use YukataRm\Laravel\Package\Command\Base\Make\AppEntityCommand;

/**
 * Repository Entity Make Command
 *
 * @package YukataRm\Laravel\Package\Command\Make
 */
class RepositoryEntityMakeCommand extends AppEntityCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "repository-entity";

    /**
     * option names
     *
     * @var array<string>
     */
    protected array $options = ["relation"];

    /**
     * parent class name
     *
     * @var string
     */
    protected string $parent = "repository";

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * whether to use relation
     *
     * @var bool
     */
    protected bool $relation;

    /**
     * set parameter
     *
     * @return void
     */
    #[\Override]
    protected function setParameter(): void
    {
        parent::setParameter();

        $this->relation = $this->option("relation");
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
        $fileName = match (true) {
            $this->relation => "relation",

            default => "default",
        };

        return $this->stubPath($fileName);
    }
}
