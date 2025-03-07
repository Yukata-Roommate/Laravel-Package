<?php

namespace YukataRm\Laravel\Package\Provider;

use Illuminate\Support\ServiceProvider;

/**
 * Lang Service Provider
 *
 * @package YukataRm\Laravel\Package\Provider
 */
class LangServiceProvider extends ServiceProvider
{
    /*----------------------------------------*
     * Boot
     *----------------------------------------*/

    /**
     * load langs
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadTranslationsFrom($this->path(), "yukata-rm");
    }

    /**
     * lang path
     *
     * @return string
     */
    protected function path(): string
    {
        return __DIR__ . "/../../../langs";
    }
}
