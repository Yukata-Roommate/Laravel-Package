<?php

namespace YukataRm\Laravel\Package\Command\Deploy;

use YukataRm\Laravel\Command\BaseCommand;

/**
 * Npm Command
 *
 * @package YukataRm\Laravel\Package\Command\Deploy
 */
class NpmCommand extends BaseCommand
{
    /**
     * command signature
     *
     * @var string
     */
    protected $signature = "deploy:npm";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "update packages from npm";

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
        $this->npmInstall(true);

        $this->npmRun("build");

        return [true, []];
    }
}
