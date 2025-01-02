<?php

namespace YukataRm\Laravel\Package\Command;

use YukataRm\Laravel\Package\Command\Base\Resource\BaseCommand;

use YukataRm\Laravel\Package\Command\Resource\ControllerResourceCommand;
use YukataRm\Laravel\Package\Command\Resource\RequestResourceCommand;
use YukataRm\Laravel\Package\Command\Resource\RequestEntityResourceCommand;
use YukataRm\Laravel\Package\Command\Resource\ServiceResourceCommand;
use YukataRm\Laravel\Package\Command\Resource\ModelResourceCommand;
use YukataRm\Laravel\Package\Command\Resource\RepositoryResourceCommand;
use YukataRm\Laravel\Package\Command\Resource\RepositoryEntityResourceCommand;
use YukataRm\Laravel\Package\Command\Resource\ViewResourceCommand;

/**
 * Resource Command
 *
 * @package YukataRm\Laravel\Package\Command
 */
class ResourceCommand extends BaseCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "run";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Run resource commands uniformly";

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
        $commands = [
            ControllerResourceCommand::class,
            RequestResourceCommand::class,
            RequestEntityResourceCommand::class,
            ServiceResourceCommand::class,
            ModelResourceCommand::class,
            RepositoryResourceCommand::class,
            RepositoryEntityResourceCommand::class,
            ViewResourceCommand::class,
        ];

        foreach ($commands as $command) {
            $this->call($command, $this->resourceArguments());
        }

        return [true, []];
    }
}
