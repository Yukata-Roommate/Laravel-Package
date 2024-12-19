<?php

namespace YukataRm\Laravel\Command;

use YukataRm\Laravel\Command\BaseCommand;

/**
 * Package Manager Command
 *
 * @package YukataRm\Laravel\Command
 */
abstract class PackageManagerCommand extends BaseCommand
{
    /*----------------------------------------*
     * Composer
     *----------------------------------------*/

    /**
     * run composer command
     *
     * @param string $message
     * @param string $command
     * @return void
     */
    protected function runComposerCommand(string $message, string $command): void
    {
        $this->runShellCommand(
            sprintf(
                "Composer %s",
                $message
            ),
            sprintf(
                "composer %s",
                $command
            )
        );
    }

    /**
     * run composer require
     *
     * @param string $package
     * @param bool $isDev
     * @return void
     */
    protected function composerRequire(string $package, bool $isDev = false): void
    {
        $this->runComposerCommand(
            "require [{$package}]",
            sprintf(
                "require %s %s",
                $isDev ? "--dev" : "",
                $package
            )
        );
    }

    /**
     * run composer remove
     *
     * @param string $package
     * @return void
     */
    protected function composerRemove(string $package): void
    {
        $this->runComposerCommand(
            "remove [{$package}]",
            sprintf(
                "remove %s",
                $package
            )
        );
    }

    /**
     * run composer dump-autoload
     *
     * @return void
     */
    protected function composerDumpAutoload(): void
    {
        $this->runComposerCommand(
            "dump-autoload",
            "dump-autoload"
        );
    }

    /*----------------------------------------*
     * Npm
     *----------------------------------------*/

    /**
     * run npm command
     *
     * @param string $message
     * @param string $command
     * @return void
     */
    protected function runNpmCommand(string $message, string $command): void
    {
        $this->runShellCommand(
            sprintf(
                "Npm %s",
                $message
            ),
            sprintf(
                "npm %s",
                $command
            )
        );
    }

    /**
     * run npm install
     *
     * @param string $package
     * @param bool $isDev
     * @return void
     */
    protected function npmInstall(string $package, bool $isDev = false): void
    {
        $this->runNpmCommand(
            "install [{$package}]",
            sprintf(
                "install %s %s",
                $isDev ? "--save-dev" : "--save",
                $package
            )
        );
    }

    /**
     * run npm uninstall
     *
     * @param string $package
     * @return void
     */
    protected function npmUninstall(string $package): void
    {
        $this->runNpmCommand(
            "uninstall [{$package}]",
            sprintf(
                "uninstall %s",
                $package
            )
        );
    }

    /**
     * run npm run
     *
     * @param string $script
     * @return void
     */
    protected function npmRun(string $script): void
    {
        $this->runNpmCommand(
            "run [{$script}]",
            sprintf(
                "run %s",
                $script
            )
        );
    }

    /*----------------------------------------*
     * Git
     *----------------------------------------*/

    /**
     * run git command
     *
     * @param string $message
     * @param string $command
     * @return void
     */
    protected function runGitCommand(string $message, string $command): void
    {
        $this->runShellCommand(
            sprintf(
                "Git %s",
                $message
            ),
            sprintf(
                "git %s",
                $command
            )
        );
    }

    /**
     * run git add
     *
     * @param string $file
     * @return void
     */
    protected function gitAdd(string $file): void
    {
        $this->runGitCommand(
            "add [{$file}]",
            sprintf(
                "add %s",
                $file
            )
        );
    }

    /**
     * run git commit
     *
     * @param string $message
     * @return void
     */
    protected function gitCommit(string $message): void
    {
        $this->runGitCommand(
            "commit",
            sprintf(
                "commit -m \"%s\"",
                $message
            )
        );
    }

    /**
     * run git push
     *
     * @return void
     */
    protected function gitPush(): void
    {
        $this->runGitCommand(
            "push",
            "push"
        );
    }
}
