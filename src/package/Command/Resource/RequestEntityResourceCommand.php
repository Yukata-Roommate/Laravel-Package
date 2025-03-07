<?php

namespace YukataRm\Laravel\Package\Command\Resource;

use YukataRm\Laravel\Package\Command\Base\Resource\BaseCommand;

use YukataRm\Laravel\Package\Command\Make\RequestEntityMakeCommand;

/**
 * Request Entity Resource Command
 *
 * @package YukataRm\Laravel\Package\Command\Resource
 */
class RequestEntityResourceCommand extends BaseCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "request-entity";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Make request entity resource";

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
                RequestEntityMakeCommand::class,
                $this->makeMultipleArguments($targets),
            );
        }

        return [true, []];
    }
}
