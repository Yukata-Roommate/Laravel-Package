<?php

namespace YukataRm\Laravel\Package\Provider;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Blade;

/**
 * View Service Provider
 *
 * @package YukataRm\Laravel\Package\Provider
 */
class ViewServiceProvider extends ServiceProvider
{
    /*----------------------------------------*
     * Boot
     *----------------------------------------*/

    /**
     * load views and blade components
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadViewsFrom($this->path(), "yukata-rm");

        Blade::componentNamespace($this->namespace(), "yukata-rm");
    }

    /**
     * views path
     *
     * @return string
     */
    protected function path(): string
    {
        return __DIR__ . "/../../../resources/views";
    }

    /**
     * blade components namespace
     *
     * @return string
     */
    protected function namespace(): string
    {
        return "YukataRm\\Laravel\\View\\Component";
    }
}
