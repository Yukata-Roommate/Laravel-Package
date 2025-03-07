<?php

namespace YukataRm\Laravel\Facade\Manager;

use YukataRm\Laravel\Interface\Log\LoggerInterface;
use YukataRm\Laravel\Interface\Log\JsonLoggerInterface;

use YukataRm\Laravel\Log\Logger;
use YukataRm\Laravel\Log\JsonLogger;

use YukataRm\Interface\Log\BaseLoggerInterface;

/**
 * Log Facade Manager
 *
 * @package YukataRm\Laravel\Facade\Manager
 */
class LogManager
{
    /**
     * make Logger instance
     *
     * @return \YukataRm\Laravel\Interface\Log\LoggerInterface
     */
    public function make(): LoggerInterface
    {
        return new Logger();
    }

    /**
     * make JsonLogger instance
     *
     * @return \YukataRm\Laravel\Interface\Log\JsonLoggerInterface
     */
    public function makeJson(): JsonLoggerInterface
    {
        return new JsonLogger();
    }

    /*----------------------------------------*
     * Logging
     *----------------------------------------*/

    /**
     * logging
     *
     * @param \YukataRm\Interface\Log\BaseLoggerInterface $logger
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    protected function logging(BaseLoggerInterface $logger, mixed $message, mixed $value = null): void
    {
        $logger->setStackTraceIndex(3)->add($message, $value)->logging();
    }

    /**
     * logging at debug level
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function debug(mixed $message, mixed $value = null): void
    {
        $this->logging(
            $this->make()->debug(),
            $message,
            $value
        );
    }

    /**
     * logging JSON format at debug level
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function debugJson(mixed $message, mixed $value = null): void
    {
        $this->logging(
            $this->makeJson()->debug(),
            $message,
            $value
        );
    }

    /**
     * logging at info level
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function info(mixed $message, mixed $value = null): void
    {
        $this->logging(
            $this->make()->info(),
            $message,
            $value
        );
    }

    /**
     * logging JSON format at info level
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function infoJson(mixed $message, mixed $value = null): void
    {
        $this->logging(
            $this->makeJson()->info(),
            $message,
            $value
        );
    }

    /**
     * logging at notice level
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function notice(mixed $message, mixed $value = null): void
    {
        $this->logging(
            $this->make()->notice(),
            $message,
            $value
        );
    }

    /**
     * logging JSON format at notice level
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function noticeJson(mixed $message, mixed $value = null): void
    {
        $this->logging(
            $this->makeJson()->notice(),
            $message,
            $value
        );
    }

    /**
     * logging at warning level
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function warning(mixed $message, mixed $value = null): void
    {
        $this->logging(
            $this->make()->warning(),
            $message,
            $value
        );
    }

    /**
     * logging JSON format at warning level
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function warningJson(mixed $message, mixed $value = null): void
    {
        $this->logging(
            $this->makeJson()->warning(),
            $message,
            $value
        );
    }

    /**
     * logging at error level
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function error(mixed $message, mixed $value = null): void
    {
        $this->logging(
            $this->make()->error(),
            $message,
            $value
        );
    }

    /**
     * logging JSON format at error level
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function errorJson(mixed $message, mixed $value = null): void
    {
        $this->logging(
            $this->makeJson()->error(),
            $message,
            $value
        );
    }

    /**
     * logging at critical level
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function critical(mixed $message, mixed $value = null): void
    {
        $this->logging(
            $this->make()->critical(),
            $message,
            $value
        );
    }

    /**
     * logging JSON format at critical level
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function criticalJson(mixed $message, mixed $value = null): void
    {
        $this->logging(
            $this->makeJson()->critical(),
            $message,
            $value
        );
    }

    /**
     * logging at alert level
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function alert(mixed $message, mixed $value = null): void
    {
        $this->logging(
            $this->make()->alert(),
            $message,
            $value
        );
    }

    /**
     * logging JSON format at alert level
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function alertJson(mixed $message, mixed $value = null): void
    {
        $this->logging(
            $this->makeJson()->alert(),
            $message,
            $value
        );
    }

    /**
     * logging at emergency level
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function emergency(mixed $message, mixed $value = null): void
    {
        $this->logging(
            $this->make()->emergency(),
            $message,
            $value
        );
    }

    /**
     * logging JSON format at emergency level
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function emergencyJson(mixed $message, mixed $value = null): void
    {
        $this->logging(
            $this->makeJson()->emergency(),
            $message,
            $value
        );
    }
}
