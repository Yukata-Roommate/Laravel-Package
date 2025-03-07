<?php

namespace YukataRm\Laravel\Log;

use YukataRm\Laravel\Interface\Log\JsonLoggerInterface;

use YukataRm\Log\JsonLogger as PHPJsonLogger;

use YukataRm\Laravel\Trait\Log\Env;
use YukataRm\Laravel\Trait\Log\Logging;

/**
 * Laravel JSON Logger
 *
 * @package YukataRm\Laravel\Log
 */
class JsonLogger extends PHPJsonLogger implements JsonLoggerInterface
{
    use Env, Logging;
}
