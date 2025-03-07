<?php

namespace YukataRm\Laravel\Package\Command\Deploy;

use YukataRm\Laravel\Command\BaseCommand;

/**
 * Git Command
 *
 * @package YukataRm\Laravel\Package\Command\Deploy
 */
class GitCommand extends BaseCommand
{
    /**
     * command signature
     *
     * @var string
     */
    protected $signature = "deploy:git {--remote=} {--branch=}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Deploy application from git repository";

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
        $this->gitPull($this->remote, $this->branch);

        return [true, []];
    }
}
