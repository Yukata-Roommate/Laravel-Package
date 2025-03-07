<?php

namespace YukataRm\Laravel\Package\Command\Resource;

use YukataRm\Laravel\Package\Command\Base\Resource\BaseCommand;

use YukataRm\Laravel\Package\Command\Make\ServiceMakeCommand;

/**
 * Service Resource Command
 *
 * @package YukataRm\Laravel\Package\Command\Resource
 */
class ServiceResourceCommand extends BaseCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "service";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Make service resource";

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
        $targets = ["index", "show", "create", "store", "edit", "update", "destroy"];

        foreach ($targets as $targets) {
            $this->call(
                ServiceMakeCommand::class,
                $this->makeMultipleArguments($targets),
            );
        }

        return [true, []];
    }
}
