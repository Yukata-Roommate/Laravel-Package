<?php

namespace YukataRm\Laravel\Auth\Middleware\Base;

use YukataRm\Laravel\Middleware\BaseMiddleware;

use YukataRm\Laravel\Trait\Auth\Lang;

/**
 * Auth Middleware
 *
 * @package YukataRm\Laravel\Auth\Middleware\Base
 */
abstract class AuthMiddleware extends BaseMiddleware
{
    use Lang;
}
