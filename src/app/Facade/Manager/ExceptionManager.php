<?php

namespace YukataRm\Laravel\Facade\Manager;

use YukataRm\Laravel\Interface\Exception\HandlerInterface;

use YukataRm\Laravel\Exception\Handler;

/**
 * Exception Facade Manager
 *
 * @package YukataRm\Laravel\Facade\Manager
 */
class ExceptionManager
{
    /**
     * make Handler instance
     *
     * @return \YukataRm\Laravel\Interface\Exception\HandlerInterface
     */
    public function handler(): HandlerInterface
    {
        return new Handler();
    }

    /**
     * handle exception
     *
     * @param \Throwable $exception
     * @return void
     */
    public function handle(\Throwable $exception): void
    {
        $this->handler()->handle($exception);
    }
}
