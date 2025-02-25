<?php

namespace YukataRm\Laravel\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Http Facade
 *
 * @package YukataRm\Laravel\Facade
 *
 * @method static \YukataRm\Laravel\Interface\Http\RequestInterface make(string $method, string $url, array $params)
 *
 * @method static \YukataRm\Laravel\Interface\Http\RequestInterface getRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Interface\Http\RequestInterface postRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Interface\Http\RequestInterface putRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Interface\Http\RequestInterface deleteRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Interface\Http\RequestInterface headRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Interface\Http\RequestInterface patchRequest(string $url, array $params)
 *
 * @method static \YukataRm\Laravel\Interface\Http\ResponseInterface get(string $url, array $params)
 * @method static \YukataRm\Laravel\Interface\Http\ResponseInterface post(string $url, array $params)
 * @method static \YukataRm\Laravel\Interface\Http\ResponseInterface put(string $url, array $params)
 * @method static \YukataRm\Laravel\Interface\Http\ResponseInterface delete(string $url, array $params)
 * @method static \YukataRm\Laravel\Interface\Http\ResponseInterface head(string $url, array $params)
 * @method static \YukataRm\Laravel\Interface\Http\ResponseInterface patch(string $url, array $params)
 *
 * @see \YukataRm\Laravel\Facade\Manager\HttpManager
 */
class Http extends Facade
{
    /**
     * Facade Accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return static::class;
    }
}
