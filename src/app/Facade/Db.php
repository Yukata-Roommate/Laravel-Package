<?php

namespace YukataRm\Laravel\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * DB Facade
 *
 * @package YukataRm\Laravel\Facade
 *
 * @method static \YukataRm\Laravel\Interface\Db\TransactionInterface transaction()
 *
 * @method static void execute(\Closure $transactional)
 *
 * @see \YukataRm\Laravel\Facade\Manager\DbManager
 */
class Db extends Facade
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
