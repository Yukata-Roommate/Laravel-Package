<?php

namespace YukataRm\Laravel\Package\Command\Deploy;

use YukataRm\Laravel\Command\BaseCommand;

/**
 * Artisan Command
 *
 * @package YukataRm\Laravel\Package\Command\Deploy
 */
class ArtisanCommand extends BaseCommand
{
    /**
     * command signature
     *
     * @var string
     */
    protected $signature = "deploy:artisan";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "run artisan command";

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
        $this->artisanOptimize();

        $this->artisanMigrate(true);

        return [true, []];
    }
}
