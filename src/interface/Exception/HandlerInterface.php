<?php

namespace YukataRm\Laravel\Interface\Exception;

/**
 * Handler Interface
 *
 * @package YukataRm\Laravel\Interface\Exception
 */
interface HandlerInterface
{
    /**
     * handle exception
     *
     * @param \Throwable $exception
     * @return void
     */
    public function handle(\Throwable $exception): void;
}
