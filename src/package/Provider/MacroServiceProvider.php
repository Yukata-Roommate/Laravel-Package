<?php

namespace YukataRm\Laravel\Package\Provider;

use YukataRm\Laravel\Provider\MacroServiceProvider as ServiceProvider;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ColumnDefinition;
use Illuminate\Support\Fluent;

use Illuminate\Routing\Router;

/**
 * Macro Service Provider
 *
 * @package YukataRm\Laravel\Package\Provider
 *
 * @method \Illuminate\Database\Schema\ColumnDefinition tinyInteger(string $column, bool $autoIncrement = false, bool $unsigned = false)
 * @method \Illuminate\Support\Fluent dropColumn(array|mixed $columns)
 * @see \Illuminate\Database\Schema\Blueprint
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
            $this->blueprintMacros(),

            $this->routerMacros(),
        );
    }

    /*----------------------------------------*
     * Blueprint
     *----------------------------------------*/

    /**
     * get Blueprint macros
     *
     * @return array<string, array<string, \Closure>>
     */
    protected function blueprintMacros(): array
    {
        return [
            Blueprint::class => [
                "isActive"     => $this->isActive(),
                "dropIsActive" => $this->dropIsActive(),
            ],
        ];
    }

    /**
     * get blueprint isActive macro
     *
     * @return \Closure
     */
    protected function isActive(): \Closure
    {
        return function (int $default = 1): ColumnDefinition {
            return $this->tinyInteger("is_active")->default($default);
        };
    }

    /**
     * get blueprint dropIsActive macro
     *
     * @return \Closure
     */
    protected function dropIsActive(): \Closure
    {
        return function (): Fluent {
            return $this->dropColumn("is_active");
        };
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
