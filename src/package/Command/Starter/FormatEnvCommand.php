<?php

namespace YukataRm\Laravel\Package\Command\Starter;

use YukataRm\Laravel\Command\BaseCommand;

/**
 * Format Env Command
 *
 * @package YukataRm\Laravel\Package\Command\Starter
 */
class FormatEnvCommand extends BaseCommand
{
    /**
     * command signature
     *
     * @var string
     */
    protected $signature = "starter:env {--appName=} {--dbName=}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Format .env file";

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
        $this->outputInfo("Formatting .env file.");

        if (!is_null($this->appName)) $this->formatAppName();

        if (!is_null($this->dbName)) $this->formatDbName();

        $this->task("Copy .env.example to .env", function () {
            return copy(base_path(".env.example"), base_path(".env"));
        });

        return [true, []];
    }

    /**
     * format APP_NAME
     *
     * @return void
     */
    protected function formatAppName(): void
    {
        $appName = $this->appName;

        $this->task("Format APP_NAME", function () use ($appName) {
            $path = base_path(".env.example");

            return file_put_contents($path, preg_replace(
                "/APP_NAME=\"[^\"]+\"/",
                "APP_NAME=\"{$appName}\"",
                file_get_contents($path)
            ));
        });
    }

    /**
     * format DB_DATABASE
     *
     * @return void
     */
    protected function formatDbName(): void
    {
        $dbName = $this->dbName;

        $this->task("Format DB_DATABASE", function () use ($dbName) {
            $path = base_path(".env.example");

            return file_put_contents($path, preg_replace(
                "/DB_DATABASE=[^\n]+/",
                "DB_DATABASE={$dbName}",
                file_get_contents($path)
            ));
        });
    }
}
