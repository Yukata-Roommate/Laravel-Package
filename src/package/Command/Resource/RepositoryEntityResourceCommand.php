<?php

namespace YukataRm\Laravel\Package\Command\Resource;

use YukataRm\Laravel\Package\Command\Base\Resource\BaseCommand;

use YukataRm\Laravel\Package\Command\Make\RepositoryEntityMakeCommand;

/**
 * Repository Entity Resource Command
 *
 * @package YukataRm\Laravel\Package\Command\Resource
 */
class RepositoryEntityResourceCommand extends BaseCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "repository-entity";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Make repository entity resource";

    /*----------------------------------------*
     * Process
     *----------------------------------------*/

    /**
     * run command process
     *
     * @return array<mixed>
     */
    protected function process(): array
    {
        $this->call(
            RepositoryEntityMakeCommand::class,
            $this->makeArguments([]),
        );

        return [true, []];
    }
}
