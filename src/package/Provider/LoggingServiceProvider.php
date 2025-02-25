<?php

namespace YukataRm\Laravel\Package\Provider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Events\QueryExecuted;

use YukataRm\Laravel\Interface\Log\LoggerInterface;
use YukataRm\Laravel\Facade\Log;
use YukataRm\Enum\Log\LogFormatEnum;
use YukataRm\Enum\Log\LogLevelEnum;

/**
 * Logging Service Provider
 *
 * @package YukataRm\Laravel\Package\Provider
 */
class LoggingServiceProvider extends ServiceProvider
{
    /**
     * register logging
     *
     * @return void
     */
    public function register(): void
    {
        if (!$this->isEnable()) return;

        $provider = $this;

        DB::listen(static function (QueryExecuted $event) use ($provider) {
            $contents = $provider->contents($event);

            $logLevel = $contents["time"] > $provider->configSlowTimeThreshold()
                ? LogLevelEnum::WARNING
                : LogLevelEnum::INFO;

            $provider->logging($logLevel, $contents);
        });
    }

    /**
     * whether enable
     *
     * @return bool
     */
    protected function isEnable(): bool
    {
        return $this->configEnable();
    }

    /*----------------------------------------*
     * Contents
     *----------------------------------------*/

    /**
     * get contents
     *
     * @param \Illuminate\Database\Events\QueryExecuted $event
     * @return array<string, mixed>
     */
    public function contents(QueryExecuted $event): array
    {
        return [
            "timestamp" => $this->timestamp(),
            "sql"       => $this->sql($event),
            "bindings"  => $this->bindings($event),
            "time"      => $this->time($event),
        ];
    }

    /**
     * get timestamp
     *
     * @return string
     */
    protected function timestamp(): string
    {
        return date("Y-m-d H:i:s");
    }

    /**
     * get event sql
     *
     * @param \Illuminate\Database\Events\QueryExecuted $event
     * @return string
     */
    protected function sql(QueryExecuted $event): string
    {
        return $event->connection
            ->getQueryGrammar()
            ->substituteBindingsIntoRawSql(
                sql: $event->sql,
                bindings: $this->bindings($event)
            );
    }

    /**
     * get event bindings
     *
     * @param \Illuminate\Database\Events\QueryExecuted $event
     * @return array<mixed>
     */
    protected function bindings(QueryExecuted $event): array
    {
        return $event->connection->prepareBindings($event->bindings);
    }

    /**
     * get event time
     *
     * @param \Illuminate\Database\Events\QueryExecuted $event
     * @return float
     */
    protected function time(QueryExecuted $event): float
    {
        return $event->time;
    }

    /*----------------------------------------*
     * Logging
     *----------------------------------------*/

    /**
     * logging
     *
     * @param \YukataRm\Enum\Log\LogLevelEnum $logLevel
     * @param array<string, mixed> $contents
     * @return void
     */
    protected function logging(LogLevelEnum $logLevel, array $contents): void
    {
        $logger = $this->logger()->setLogLevel($logLevel);

        $logger->add($contents);

        $logger->logging();
    }

    /**
     * get Logger instance
     *
     * @return \YukataRm\Laravel\Interface\Log\LoggerInterface
     */
    protected function logger(): LoggerInterface
    {
        $logger = Log::make();

        $logger->setBaseDirectory($this->configBaseDirectory());

        $logger->setDirectory($this->configDirectory());

        $logger->setFileNameFormat($this->configFileNameFormat());

        $logger->setFileExtension($this->configFileExtension());

        $logger->setLogFormat(LogFormatEnum::MESSAGE);

        return $logger;
    }

    /*----------------------------------------*
     * Config
     *----------------------------------------*/

    /**
     * get config or default
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    protected function config(string $key, mixed $default): mixed
    {
        return config("package.logging.query.{$key}", $default);
    }

    /**
     * get config enable
     *
     * @return bool
     */
    protected function configEnable(): bool
    {
        return $this->config("enable", false);
    }

    /*----------------------------------------*
     * Config - Contents
     *----------------------------------------*/

    /**
     * get contents config
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    protected function contentsConfig(string $key, mixed $default): mixed
    {
        return $this->config("contents.{$key}", $default);
    }

    /**
     * get config slow time threshold
     *
     * @return int
     */
    protected function configSlowTimeThreshold(): int
    {
        return $this->contentsConfig("slow_time_threshold", 1000);
    }

    /*----------------------------------------*
     * Config - Logging
     *----------------------------------------*/

    /**
     * get logging config
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    protected function loggingConfig(string $key, mixed $default): mixed
    {
        return $this->config("logging.{$key}", $default);
    }

    /**
     * get config base directory
     *
     * @return string
     */
    protected function configBaseDirectory(): string
    {
        return $this->loggingConfig("base_directory", storage_path("logs"));
    }

    /**
     * get config directory
     *
     * @return string
     */
    protected function configDirectory(): string
    {
        return $this->loggingConfig("directory", "query");
    }

    /**
     * get config file name format
     *
     * @return string
     */
    protected function configFileNameFormat(): string
    {
        return $this->loggingConfig("file.name_format", "Y-m-d");
    }

    /**
     * get config file extension
     *
     * @return string
     */
    protected function configFileExtension(): string
    {
        return $this->loggingConfig("file.extension", "log");
    }
}
