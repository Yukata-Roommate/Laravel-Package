<?php

namespace YukataRm\Laravel\Trait\Log;

/**
 * Logging trait
 *
 * @package YukataRm\Laravel\Trait\Log
 *
 * @property-read \YukataRm\Enum\Log\LogLevelEnum $logLevel
 */
trait Logging
{
    /**
     * whether logging
     *
     * @return bool
     */
    #[\Override]
    protected function isLogging(): bool
    {
        if (!parent::isLogging()) return false;

        if (!function_exists("config")) return false;

        if ($this->logLevel->isDebug() && !config("app.debug")) return false;

        return true;
    }
}
