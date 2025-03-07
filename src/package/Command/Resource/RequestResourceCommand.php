<?php

namespace YukataRm\Laravel\Package\Command\Resource;

use YukataRm\Laravel\Package\Command\Base\Resource\BaseCommand;

use YukataRm\Laravel\Package\Command\Make\RequestMakeCommand;

/**
 * Request Resource Command
 *
 * @package YukataRm\Laravel\Package\Command\Resource
 */
class RequestResourceCommand extends BaseCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "request";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Make request resource";

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
        $targets = ["index", "show", "store", "edit", "update", "destroy"];

        foreach ($targets as $targets) {
            $this->call(
                RequestMakeCommand::class,
                $this->makeMultipleArguments($targets),
            );
        }

        return [true, []];
    }
}
