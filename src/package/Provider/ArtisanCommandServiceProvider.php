<?php

namespace YukataRm\Laravel\Package\Provider;

use Illuminate\Support\ServiceProvider;

use YukataRm\Laravel\Package\Command as PackageCommand;

use Illuminate\Console\Command;

/**
 * Artisan Command Service Provider
 *
 * @package YukataRm\Laravel\Package\Provider
 */
class ArtisanCommandServiceProvider extends ServiceProvider
{
    /**
     * get artisan commands
     *
     * @return array<string>
     */
    protected function artisanCommands(): array
    {
        return [
            PackageCommand\DeleteTokensCommand::class,

            PackageCommand\DumpDatabaseCommand::class,

            PackageCommand\UpdatePackageCommand::class,

            PackageCommand\DeployCommand::class,
            PackageCommand\Deploy\GitCommand::class,
            PackageCommand\Deploy\ComposerCommand::class,
            PackageCommand\Deploy\NpmCommand::class,
            PackageCommand\Deploy\ArtisanCommand::class,

            PackageCommand\ResourceCommand::class,
            PackageCommand\Resource\ControllerResourceCommand::class,
            PackageCommand\Resource\RequestResourceCommand::class,
            PackageCommand\Resource\RequestEntityResourceCommand::class,
            PackageCommand\Resource\ServiceResourceCommand::class,
            PackageCommand\Resource\ModelResourceCommand::class,
            PackageCommand\Resource\RepositoryResourceCommand::class,
            PackageCommand\Resource\RepositoryEntityResourceCommand::class,
            PackageCommand\Resource\ViewResourceCommand::class,

            PackageCommand\Make\ControllerMakeCommand::class,
            PackageCommand\Make\RequestMakeCommand::class,
            PackageCommand\Make\RequestEntityMakeCommand::class,
            PackageCommand\Make\ServiceMakeCommand::class,
            PackageCommand\Make\ModelMakeCommand::class,
            PackageCommand\Make\RepositoryMakeCommand::class,
            PackageCommand\Make\RepositoryEntityMakeCommand::class,
            PackageCommand\Make\ViewMakeCommand::class,

            PackageCommand\StarterCommand::class,
            PackageCommand\Starter\PublishStarterCommand::class,
            PackageCommand\Starter\DeleteUnnecessaryCommand::class,
            PackageCommand\Starter\ManagePackageCommand::class,
            PackageCommand\Starter\FormatEnvCommand::class,
            PackageCommand\Starter\RunArtisanCommand::class,
        ];
    }

    /*----------------------------------------*
     * Boot
     *----------------------------------------*/

    /**
     * define Artisan
     *
     * @return void
     */
    public function boot(): void
    {
        if (!$this->app->runningInConsole()) return;

        $commands = $this->getValidArtisanCommands();

        if (empty($commands)) return;

        $this->commands($commands);
    }

    /**
     * get valid artisan commands
     *
     * @return array<string>
     */
    protected function getValidArtisanCommands(): array
    {
        return array_filter($this->artisanCommands(), function ($command) {
            return is_subclass_of($command, Command::class);
        });
    }
}
