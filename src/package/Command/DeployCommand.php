<?php

namespace YukataRm\Laravel\Package\Command;

use YukataRm\Laravel\Command\BaseCommand;

use YukataRm\Laravel\Package\Command\Deploy\GitCommand;
use YukataRm\Laravel\Package\Command\Deploy\ComposerCommand;
use YukataRm\Laravel\Package\Command\Deploy\NpmCommand;
use YukataRm\Laravel\Package\Command\Deploy\ArtisanCommand;

/**
 * Deploy Command
 *
 * @package YukataRm\Laravel\Package\Command
 */
class DeployCommand extends BaseCommand
{
    /**
     * command signature
     *
     * @var string
     */
    protected $signature = "deploy {--remote=} {--branch=}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Deploy application";

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * git pull remote
     *
     * @var string
     */
    protected string $remote;

    /**
     * git pull branch
     *
     * @var string
     */
    protected string $branch;

    /**
     * set parameter
     *
     * @return void
     */
    protected function setParameter(): void
    {
        $this->remote = $this->option("remote") ?? "origin";
        $this->branch = $this->option("branch") ?? "master";
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
        $this->runGit();
        $this->runComposer();
        $this->runNpm();
        $this->runArtisan();

        return [true, []];
    }

    /**
     * run git command
     *
     * @return void
     */
    protected function runGit(): void
    {
        $this->call(
            GitCommand::class,
            [
                "--remote" => $this->remote,
                "--branch" => $this->branch,
            ]
        );
    }

    /**
     * run composer command
     *
     * @return void
     */
    protected function runComposer(): void
    {
        $this->call(
            ComposerCommand::class,
            []
        );
    }

    /**
     * run npm command
     *
     * @return void
     */
    protected function runNpm(): void
    {
        $this->call(
            NpmCommand::class,
            []
        );
    }

    /**
     * run artisan command
     *
     * @return void
     */
    protected function runArtisan(): void
    {
        $this->call(
            ArtisanCommand::class,
            []
        );
    }
}
