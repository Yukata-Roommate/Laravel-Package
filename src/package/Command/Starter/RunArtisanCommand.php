<?php

namespace YukataRm\Laravel\Package\Command\Starter;

use YukataRm\Laravel\Command\BaseCommand;

/**
 * Run Artisan Command
 *
 * @package YukataRm\Laravel\Package\Command\Starter
 */
class RunArtisanCommand extends BaseCommand
{
    /**
     * command signature
     *
     * @var string
     */
    protected $signature = "starter:artisan";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Run default artisan command";

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * set parameter
     *
     * @return void
     */
    protected function setParameter(): void
    {
    }

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
        $this->outputInfo("Run Artisan Command");

        $this->artisanKeyGenerate();

        $this->artisanStorageLink();

        $this->artisanMigrate();

        return [true, []];
    }
}
