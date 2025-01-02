<?php

namespace YukataRm\Laravel\Package\Command\Starter;

use YukataRm\Laravel\Command\PackageManagerCommand;

/**
 * Manage Package Command
 *
 * @package YukataRm\Laravel\Package\Command\Starter
 */
class ManagePackageCommand extends PackageManagerCommand
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

        $this->npmInstall("sass", true);

        $this->npmInstall("bootstrap");

        $this->npmInstall("admin-lte@4.0.0-beta3");

        $this->npmInstall("@fontsource/source-sans-3");

        $this->npmInstall("bootstrap-icons");

        $this->npmInstall("prismjs");

        $this->npmRun("build");
    }
}
