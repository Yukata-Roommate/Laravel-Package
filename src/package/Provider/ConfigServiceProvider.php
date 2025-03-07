<?php

namespace YukataRm\Laravel\Package\Provider;

use Illuminate\Support\ServiceProvider;

/**
 * Config Service Provider
 *
 * @package YukataRm\Laravel\Package\Provider
 */
class ConfigServiceProvider extends ServiceProvider
{
    /**
     * get configs
     *
     * @return array<string>
     */
    protected function configs(): array
    {
        return [
            "package",
        ];
    }

    /*----------------------------------------*
     * Boot
     *----------------------------------------*/

    /**
     * merge configs
     *
     * @return void
     */
    public function register()
    {
        $configs = $this->configs();

        if (empty($configs)) return;

        foreach ($configs as $config) {
            $this->mergeConfigFrom($this->path($config), $config);
        }
    }

    /**
     * config path
     *
     * @param string $config
     * @return string
     */
    protected function path(string $config): string
    {
        return __DIR__ . "/../../../configs/{$config}.php";
    }
}
