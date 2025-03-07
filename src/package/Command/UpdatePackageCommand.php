<?php

namespace YukataRm\Laravel\Package\Command;

use YukataRm\Laravel\Command\BaseCommand;

/**
 * Update Package Command
 *
 * @package YukataRm\Laravel\Package\Command
 */
class UpdatePackageCommand extends BaseCommand
{
    /**
     * command signature
     *
     * @var string
     */
    protected $signature = "package:update";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Update package before push to repository";

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
        $this->composerUpdate();

        $this->composerDumpAutoload();

        $this->runShellCommandWithoutTimeout("Npx [package update]", "npx -p npm-check-updates  -c \"ncu -u\"");

        $this->npmInstall();

        $this->npmAuditFix();

        $this->npmRun("build");

        return [true, []];
    }
}
