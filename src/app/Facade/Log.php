<?php

namespace YukataRm\Laravel\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Log Facade
 *
 * @package YukataRm\Laravel\Facade
 *
 * @method static \YukataRm\Laravel\Interface\Log\LoggerInterface make()
 * @method static \YukataRm\Laravel\Interface\Log\JsonLoggerInterface makeJson()
 *
 * @method static void debug(mixed $message, mixed $value = null)
 * @method static void debugJson(mixed $message, mixed $value = null)
 * @method static void info(mixed $message, mixed $value = null)
 * @method static void infoJson(mixed $message, mixed $value = null)
 * @method static void notice(mixed $message, mixed $value = null)
 * @method static void noticeJson(mixed $message, mixed $value = null)
 * @method static void warning(mixed $message, mixed $value = null)
 * @method static void warningJson(mixed $message, mixed $value = null)
 * @method static void error(mixed $message, mixed $value = null)
 * @method static void errorJson(mixed $message, mixed $value = null)
 * @method static void critical(mixed $message, mixed $value = null)
 * @method static void criticalJson(mixed $message, mixed $value = null)
 * @method static void alert(mixed $message, mixed $value = null)
 * @method static void alertJson(mixed $message, mixed $value = null)
 * @method static void emergency(mixed $message, mixed $value = null)
 * @method static void emergencyJson(mixed $message, mixed $value = null)
 *
 * @see \YukataRm\Laravel\Facade\Manager\LogManager
 */
class Log extends Facade
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
