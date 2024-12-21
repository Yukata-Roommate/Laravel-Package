<?php

namespace YukataRm\Laravel\Package\Provider;

use YukataRm\Laravel\Provider\FacadeServiceProvider as ServiceProvider;

use YukataRm\Laravel\Facade;
use YukataRm\Laravel\Facade\Manager;

/**
 * Facade Service Provider
 *
 * @package YukataRm\Laravel\Package\Provider
 */
class FacadeServiceProvider extends ServiceProvider
{
    /**
     * get facades
     *
     * @return array<string, string>
     */
    protected function facades(): array
    {
        return [
            Facade\Db::class        => Manager\DbManager::class,
            Facade\Exception::class => Manager\ExceptionManager::class,
            Facade\Http::class      => Manager\HttpManager::class,
            Facade\Log::class       => Manager\LogManager::class,
            Facade\Renderer::class  => Manager\RendererManager::class,
            Facade\Rules::class     => Manager\RulesManager::class,
        ];
    }
}
