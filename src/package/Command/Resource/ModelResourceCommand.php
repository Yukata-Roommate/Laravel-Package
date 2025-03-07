<?php

namespace YukataRm\Laravel\Package\Command\Resource;

use YukataRm\Laravel\Package\Command\Base\Resource\BaseCommand;

use YukataRm\Laravel\Package\Command\Make\ModelMakeCommand;

/**
 * Model Resource Command
 *
 * @package YukataRm\Laravel\Package\Command\Resource
 */
class ModelResourceCommand extends BaseCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "model";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Make model resource";

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
            ModelMakeCommand::class,
            $this->makeArguments([
                "--migration" => true,
            ]),
        );

        return [true, []];
    }
}
