<?php

namespace YukataRm\Laravel\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * View Renderer Facade
 *
 * @package YukataRm\Laravel\Facade
 *
 * @method static \YukataRm\Laravel\Interface\View\Render\RendererInterface make()
 * @method static \YukataRm\Laravel\Interface\View\Render\RendererInterface storage()
 * @method static \YukataRm\Laravel\Interface\View\Render\RendererInterface public()
 *
 * @see \YukataRm\Laravel\Facade\Manager\RendererManager
 */
class Renderer extends Facade
{
    /**
     * Facade Accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return static::class;
    }
}
