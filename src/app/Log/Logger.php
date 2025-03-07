<?php

namespace YukataRm\Laravel\Log;

use YukataRm\Laravel\Interface\Log\LoggerInterface;

use YukataRm\Log\Logger as PHPLogger;

use YukataRm\Laravel\Trait\Log\Env;
use YukataRm\Laravel\Trait\Log\Logging;

/**
 * Laravel Logger
 *
 * @package YukataRm\Laravel\Log
 */
class Logger extends PHPLogger implements LoggerInterface
{
    use Env, Logging;
}
