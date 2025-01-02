<?php

namespace YukataRm\Laravel\Db;

use YukataRm\Laravel\Interface\Db\TransactionInterface;

use Illuminate\Support\Facades\DB;

use Closure;
use Throwable;
use Exception;

/**
 * DB Transaction
 *
 * @package YukataRm\Laravel\Db
 */
class Transaction implements TransactionInterface
{
    /**
     * execute transaction
     *
     * @param \Closure $transactional
     * @return void
     */
    public function execute(Closure $transactional): void
    {
        try {
            DB::beginTransaction();

            $transactional();

            DB::commit();
        } catch (Throwable $exception) {
            try {
                DB::rollBack();
            } catch (Throwable $rollbackException) {
                $exception = new Exception($exception->getMessage() . PHP_EOL . $rollbackException->getMessage());
            }

            throw $exception;
        }
    }
}
