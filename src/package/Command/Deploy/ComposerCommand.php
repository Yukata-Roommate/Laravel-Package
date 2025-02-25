<?php

namespace YukataRm\Laravel\Package\Command\Deploy;

use YukataRm\Laravel\Command\BaseCommand;

/**
 * Composer Command
 *
 * @package YukataRm\Laravel\Package\Command\Deploy
 */
class ComposerCommand extends BaseCommand
{
    /**
     * command signature
     *
     * @var string
     */
    protected $signature = "deploy:composer";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "update packages from composer";

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
     * run command process
     *
     * @return array<mixed>
     */
    protected function process(): array
    {
        $this->composerInstall(["--no-dev", "--optimize-autoloader"]);

        $this->composerDumpAutoload();

        return [true, []];
    }
}
