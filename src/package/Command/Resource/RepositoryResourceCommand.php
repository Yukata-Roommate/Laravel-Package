<?php

namespace YukataRm\Laravel\Package\Command\Resource;

use YukataRm\Laravel\Package\Command\Base\Resource\BaseCommand;

use YukataRm\Laravel\Package\Command\Make\RepositoryMakeCommand;

/**
 * Repository Resource Command
 *
 * @package YukataRm\Laravel\Package\Command\Resource
 */
class RepositoryResourceCommand extends BaseCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "repository";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Make repository resource";

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
            RepositoryMakeCommand::class,
            $this->makeArguments([
                "--search" => true,
            ]),
        );

        return [true, []];
    }
}
