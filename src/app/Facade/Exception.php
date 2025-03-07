<?php

namespace YukataRm\Laravel\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Exception Facade
 *
 * @package YukataRm\Laravel\Facade
 *
 * @method static \YukataRm\Laravel\Interface\Exception\HandlerInterface handler()
 *
 * @method static void handle(\Throwable $exception)
 *
 * @see \YukataRm\Laravel\Facade\Manager\ExceptionManager
 */
class Exception extends Facade
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
