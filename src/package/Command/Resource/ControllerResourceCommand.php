<?php

namespace YukataRm\Laravel\Package\Command\Resource;

use YukataRm\Laravel\Package\Command\Base\Resource\BaseCommand;

use YukataRm\Laravel\Package\Command\Make\ControllerMakeCommand;

/**
 * Controller Resource Command
 *
 * @package YukataRm\Laravel\Package\Command\Resource
 */
class ControllerResourceCommand extends BaseCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "controller";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Make controller resource";

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
            ControllerMakeCommand::class,
            $this->makeArguments([
                "--resource" => true,
            ]),
        );

        return [true, []];
    }
}
