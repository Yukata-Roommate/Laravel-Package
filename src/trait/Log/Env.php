<?php

namespace YukataRm\Laravel\Trait\Log;

/**
 * Env trait
 *
 * @package YukataRm\Laravel\Trait\Log
 */
trait Env
{
    /**
     * get config or default
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    protected function config(string $key, mixed $default): mixed
    {
        return config("package.log.{$key}", $default);
    }

    /**
     * get env is rotate
     *
     * @return bool
     */
    #[\Override]
    protected function envIsRotate(): bool
    {
        if (!function_exists("config")) return parent::envIsRotate();

        return $this->config("is_rotate", parent::envIsRotate());
    }

    /**
     * get env retention days
     *
     * @return int
     */
    #[\Override]
    protected function envRetentionDays(): int
    {
        if (!function_exists("config")) return parent::envRetentionDays();

        return $this->config("retention_days", parent::envRetentionDays());
    }

    /**
     * get env format
     *
     * @return string
     */
    #[\Override]
    protected function envFormat(): string
    {
        if (!function_exists("config")) return parent::envFormat();

        return $this->config("log_format", parent::envFormat());
    }

    /**
     * get env format json
     *
     * @return array<string>
     */
    #[\Override]
    protected function envFormatJson(): array
    {
        if (!function_exists("config")) return parent::envFormatJson();

        return explode(
            ",",
            str_replace(
                " ",
                "",
                $this->config("log_format_json", "")
            )
        );
    }

    /**
     * get env base directory
     *
     * @return string
     */
    #[\Override]
    protected function envBaseDirectory(): string
    {
        if (!function_exists("config")) return parent::envBaseDirectory();

        return $this->config("base_directory", parent::envBaseDirectory());
    }

    /**
     * get env file name format
     *
     * @return string
     */
    #[\Override]
    protected function envFileNameFormat(): string
    {
        if (!function_exists("config")) return parent::envFileNameFormat();

        return $this->config("file.name_format", parent::envFileNameFormat());
    }

    /**
     * get env file extension
     *
     * @return string
     */
    #[\Override]
    protected function envFileExtension(): string
    {
        if (!function_exists("config")) return parent::envFileExtension();

        return $this->config("file.extension", parent::envFileExtension());
    }

    /**
     * get env whether real memory usage
     *
     * @return bool
     */
    #[\Override]
    protected function envIsMemoryRealUsage(): bool
    {
        if (!function_exists("config")) return parent::envIsMemoryRealUsage();

        return $this->config("is_memory_real_usage", parent::envIsMemoryRealUsage());
    }

    /**
     * get env whether memory format
     *
     * @return bool
     */
    #[\Override]
    protected function envIsMemoryFormat(): bool
    {
        if (!function_exists("config")) return parent::envIsMemoryFormat();

        return $this->config("is_memory_format", parent::envIsMemoryFormat());
    }

    /**
     * get env memory usage precision
     *
     * @return int
     */
    #[\Override]
    protected function envMemoryPrecision(): int
    {
        if (!function_exists("config")) return parent::envMemoryPrecision();

        return $this->config("memory_precision", parent::envMemoryPrecision());
    }
}
