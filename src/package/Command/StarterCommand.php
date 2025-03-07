<?php

namespace YukataRm\Laravel\Package\Command;

use YukataRm\Laravel\Command\BaseCommand;

use YukataRm\Laravel\Package\Command\Starter\PublishStarterCommand;
use YukataRm\Laravel\Package\Command\Starter\DeleteUnnecessaryCommand;
use YukataRm\Laravel\Package\Command\Starter\ManagePackageCommand;
use YukataRm\Laravel\Package\Command\Starter\FormatEnvCommand;
use YukataRm\Laravel\Package\Command\Starter\RunArtisanCommand;

/**
 * Starter Command
 *
 * @package YukataRm\Laravel\Package\Command
 */
class StarterCommand extends BaseCommand
{
    /**
     * command signature
     *
     * @var string
     */
    protected $signature = "starter:run {--appName=} {--dbName=}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Run starter commands uniformly";

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * .env APP_NAME
     *
     * @var string|null
     */
    protected string|null $appName;

    /**
     * .env DB_DATABASE
     *
     * @var string|null
     */
    protected string|null $dbName;

    /**
     * set parameter
     *
     * @return void
     */
    protected function setParameter(): void
    {
        $this->appName = $this->option("appName");
        $this->dbName  = $this->option("dbName");
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
        $this->publishStarter();
        $this->deleteUnnecessary();
        $this->managePackage();
        $this->formatEnv();
        $this->runArtisan();

        return [true, []];
    }

    /**
     * call publish starter command
     *
     * @return void
     */
    protected function publishStarter(): void
    {
        $this->call(
            PublishStarterCommand::class,
            []
        );
    }

    /**
     * call delete unnecessary command
     *
     * @return void
     */
    protected function deleteUnnecessary(): void
    {
        $this->call(
            DeleteUnnecessaryCommand::class,
            []
        );
    }

    /**
     * call manage package command
     *
     * @return void
     */
    protected function managePackage(): void
    {
        $this->call(
            ManagePackageCommand::class,
            []
        );
    }

    /**
     * call format env command
     *
     * @return void
     */
    protected function formatEnv(): void
    {
        $this->call(
            FormatEnvCommand::class,
            [
                "--appName" => $this->appName,
                "--dbName"  => $this->dbName,
            ]
        );
    }

    /**
     * call run artisan command
     *
     * @return void
     */
    protected function runArtisan(): void
    {
        $this->call(
            RunArtisanCommand::class,
            []
        );
    }
}
