<?php

namespace YukataRm\Laravel\Facade\Manager;

use YukataRm\Laravel\Interface\Db\TransactionInterface;
use YukataRm\Laravel\Db\Transaction;

use Closure;

/**
 * DB Facade Manager
 *
 * @package YukataRm\Laravel\Facade\Manager
 */
class DbManager
{
    /**
     * make Transaction instance
     *
     * @return \YukataRm\Laravel\Interface\Db\TransactionInterface
     */
    public function transaction(): TransactionInterface
    {
        return new Transaction();
    }

    /**
     * execute transaction
     *
     * @param \Closure $transactional
     * @return void
     */
    public function execute(Closure $transactional): void
    {
        $this->transaction()->execute($transactional);
    }
}
