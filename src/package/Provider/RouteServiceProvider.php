<?php

namespace YukataRm\Laravel\Package\Provider;

use Illuminate\Support\ServiceProvider;

/**
 * Route Service Provider
 *
 * @package YukataRm\Laravel\Package\Provider
 */
class RouteServiceProvider extends ServiceProvider
{
    /*----------------------------------------*
     * Boot
     *----------------------------------------*/

    /**
     * load routes
     *
     * @return void
     */
    public function boot(): void
    {
        $routes = $this->routes();

        if (empty($routes)) return;

        foreach ($routes as $route) {
            $this->loadRoutesFrom($this->path($route));
        }
    }

    /**
     * get routes
     *
     * @return array<string>
     */
    protected function routes(): array
    {
        return [
            "console.php",
        ];
    }

    /**
     * routes path
     *
     * @param string $name
     * @return string
     */
    protected function path(string $name): string
    {
        return __DIR__ . "/../../../routes/{$name}";
    }
}
