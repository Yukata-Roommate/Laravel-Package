<?php

namespace YukataRm\Laravel\Package\Provider;

use YukataRm\Laravel\Provider\MacroServiceProvider as ServiceProvider;

use Illuminate\Routing\Router;

/**
 * Macro Service Provider
 *
 * @package YukataRm\Laravel\Package\Provider
 *
 * @method \Illuminate\Routing\RouteRegistrar group(array $attributes, \Closure $routes)
 * @method \Illuminate\Routing\RouteRegistrar controller(string $controller)
 * @method \Illuminate\Routing\Route get(string $uri, array|string|callable|null $action = null)
 * @method \Illuminate\Routing\Route post(string $uri, array|string|callable|null $action = null)
 * @see \Illuminate\Routing\Router
 */
class MacroServiceProvider extends ServiceProvider
{
    /**
     * get macros
     *
     * @return array<string, array<string, \Closure>>
     */
    protected function macros(): array
    {
        return array_merge(
            $this->routerMacros(),
        );
    }

    /*----------------------------------------*
     * Router
     *----------------------------------------*/

    /**
     * get Router macros
     *
     * @return array<string, array<string, \Closure>>
     */
    protected function routerMacros(): array
    {
        return [
            Router::class => [
                "phpinfo" => $this->phpinfo(),
            ],
        ];
    }

    /**
     * get router phpinfo macro
     *
     * @return \Closure
     */
    protected function phpinfo(): \Closure
    {
        return function (): void {
            $this->get("/phpinfo", function () {
                phpinfo();
            });
        };
    }
}
