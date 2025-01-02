<?php

namespace YukataRm\Laravel\Package\Command\Resource;

use YukataRm\Laravel\Package\Command\Base\Resource\BaseCommand;

use YukataRm\Laravel\Package\Command\Make\ViewMakeCommand;

/**
 * View Resource Command
 *
 * @package YukataRm\Laravel\Package\Command\Resource
 */
class ViewResourceCommand extends BaseCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "view";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Make view resource";

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
        $targets = ["index", "show", "create", "edit"];

        foreach ($targets as $targets) {
            $this->call(
                ViewMakeCommand::class,
                $this->makeMultipleArguments($targets),
            );
        }

        return [true, []];
    }
}
