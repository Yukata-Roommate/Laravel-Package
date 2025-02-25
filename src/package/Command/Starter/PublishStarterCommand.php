<?php

namespace YukataRm\Laravel\Package\Command\Starter;

use YukataRm\Laravel\Command\PublishStubsCommand;

/**
 * Publish Starter Command
 *
 * @package YukataRm\Laravel\Package\Command\Starter
 */
class PublishStarterCommand extends PublishStubsCommand
{
    /**
     * command signature
     *
     * @var string
     */
    protected $signature = "starter:publish";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Publish starter resources";

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * set parameter
     *
     * @return void
     */
    protected function setParameter(): void {}

    /*----------------------------------------*
     * Process
     *----------------------------------------*/

    /**
     * assets name
     *
     * @var string
     */
    protected string $assetsName = "starter";

    /**
     * stubs directory path
     *
     * @var string
     */
    protected string $stubsDirectory = __DIR__ . "/../../../../stubs/starter";
}
