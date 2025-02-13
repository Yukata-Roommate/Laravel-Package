<?php

namespace YukataRm\Laravel\Package\Command\Starter;

use YukataRm\Laravel\Command\BaseCommand;

/**
 * Manage Package Command
 *
 * @package YukataRm\Laravel\Package\Command\Starter
 */
class ManagePackageCommand extends BaseCommand
{
    /**
     * command signature
     *
     * @var string
     */
    protected $signature = "starter:package";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Manage Composer and NPM packages";

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
        $this->manageComposerPackages();

        $this->manageNpmPackages();

        return [true, []];
    }

    /**
     * manage composer packages
     *
     * @return void
     */
    protected function manageComposerPackages(): void
    {
        $this->outputInfo("Manage Composer packages.");

        $this->composerRequire("barryvdh/laravel-debugbar", true);

        $this->composerRequire("beyondcode/laravel-query-detector", true);

        $this->composerRequire("squizlabs/php_codesniffer", true);

        $this->composerRequire("larastan/larastan", true);

        $this->composerDumpAutoload();
    }

    /**
     * manage npm packages
     *
     * @return void
     */
    protected function manageNpmPackages(): void
    {
        $this->outputInfo("Manage NPM packages.");

        $this->npmUninstall("postcss");

        $this->npmUninstall("tailwindcss");

        $this->npmInstall();

        $this->npmInstallPackage("sass", true);

        $this->npmInstallPackage("typescript", true);

        $this->npmInstallPackage("ts-loader", true);

        $this->npmInstallPackage("vite-plugin-checker", true);

        $this->npmInstallPackage("bootstrap");
        $this->npmInstallPackage("@types/bootstrap");

        $this->npmInstallPackage("admin-lte@4.0.0-beta3");

        $this->npmInstallPackage("@fontsource/source-sans-3");

        $this->npmInstallPackage("bootstrap-icons");

        $this->npmInstallPackage("crypto-js");
        $this->npmInstallPackage("@types/crypto-js");

        $this->npmRun("build");
    }
}
