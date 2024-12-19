<?php

namespace YukataRm\Laravel\Interface\Db;

use Closure;

/**
 * DB Transaction Interface
 *
 * @package YukataRm\Laravel\Interface\Db
 */
interface TransactionInterface
{
    /**
     * execute transaction
     *
     * @param \Closure $transactional
     * @return void
     */
    public function execute(Closure $transactional): void;
}
