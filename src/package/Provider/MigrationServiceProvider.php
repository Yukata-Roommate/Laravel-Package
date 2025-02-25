<?php

namespace YukataRm\Laravel\Package\Provider;

use Illuminate\Support\ServiceProvider;

/**
 * Migration Service Provider
 *
 * @package YukataRm\Laravel\Package\Provider
 */
class MigrationServiceProvider extends ServiceProvider
{
    /*----------------------------------------*
     * Boot
     *----------------------------------------*/

    /**
     * load migrations
     *
     * @return void
     */
    public function boot(): void
    {
        $migrations = $this->migrations();

        if (empty($migrations)) return;

        foreach ($migrations as $migration) {
            $this->loadMigrationsFrom($this->path($migration));
        }
    }

    /**
     * get migrations
     *
     * @return array<string>
     */
    protected function migrations(): array
    {
        return [
            "0001_01_01_100000_create_email_reset_tokens_table.php",
            "0001_01_01_100001_create_password_reset_tokens_table.php",
        ];
    }

    /**
     * migrations path
     *
     * @param string $name
     * @return string
     */
    protected function path(string $name): string
    {
        return __DIR__ . "/../../../migrations/{$name}";
    }
}
