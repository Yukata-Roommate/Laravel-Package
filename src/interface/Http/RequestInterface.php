<?php

namespace YukataRm\Laravel\Interface\Http;

use YukataRm\Laravel\Interface\Http\ResponseInterface;

/**
 * Request Interface
 *
 * @package YukataRm\Laravel\Interface\Http
 */
interface RequestInterface
{
    /*----------------------------------------*
     * Send Request
     *----------------------------------------*/

    /**
     * send request
     *
     * @return \YukataRm\Laravel\Interface\Http\ResponseInterface
     */
    public function send(): ResponseInterface;

    /*----------------------------------------*
     * Auth
     *----------------------------------------*/

    /**
     * set basic auth
     *
     * @param string $userName
     * @param string $password
     * @return static
     */
    public function basicAuth(string $userName, string $password): static;

    /**
     * set digest auth
     *
     * @param string $userName
     * @param string $password
     * @return static
     */
    public function digestAuth(string $userName, string $password): static;

    /*----------------------------------------*
     * Body Format
     *----------------------------------------*/

    /**
     * set body format
     *
     * @param string $bodyFormat
     * @return static
     */
    public function bodyFormat(string $bodyFormat): static;

    /**
     * set body format as body
     *
     * @return static
     */
    public function asBody(): static;

    /**
     * set body format as json
     *
     * @return static
     */
    public function asJson(): static;

    /**
     * set body format as form params
     *
     * @return static
     */
    public function asForm(): static;

    /**
     * set body format as multipart
     *
     * @return static
     */
    public function asMultipart(): static;

    /*----------------------------------------*
     * Headers
     *----------------------------------------*/

    /**
     * set headers
     *
     * @param array $headers
     * @return static
     */
    public function headers(array $headers): static;

    /**
     * add header
     *
     * @param string $name
     * @param string $value
     * @return static
     */
    public function addHeader(string $name, string $value): static;

    /**
     * set accept header
     *
     * @param string $accept
     * @return static
     */
    public function accept(string $accept): static;

    /**
     * set accept json header
     *
     * @return static
     */
    public function acceptJson(): static;

    /**
     * set accept form header
     *
     * @return static
     */
    public function acceptForm(): static;

    /**
     * set accept html header
     *
     * @return static
     */
    public function acceptHtml(): static;

    /**
     * set token header
     *
     * @param string $tokenType
     * @param string $token
     * @return static
     */
    public function token(string $tokenType, string $token): static;

    /**
     * set bearer token header
     *
     * @param string $token
     * @return static
     */
    public function bearerToken(string $token): static;

    /**
     * set content type header
     *
     * @param string $contentType
     * @return static
     */
    public function contentType(string $contentType): static;

    /**
     * set content type json header
     *
     * @return static
     */
    public function contentTypeJson(): static;

    /**
     * set content type form header
     *
     * @return static
     */
    public function contentTypeForm(): static;

    /**
     * set content type html header
     *
     * @return static
     */
    public function contentTypeHtml(): static;

    /*----------------------------------------*
     * Timeout
     *----------------------------------------*/

    /**
     * set timeout
     *
     * @param int $seconds
     * @return static
     */
    public function timeout(int $seconds): static;

    /**
     * set connect timeout
     *
     * @param int $seconds
     * @return static
     */
    public function connectTimeout(int $seconds): static;

    /*----------------------------------------*
     * Retry
     *----------------------------------------*/

    /**
     * set retry
     *
     * @param int $times
     * @param int $sleepMilliseconds
     * @param \Closure $when
     * @return static
     */
    public function retry(int $times, int $sleepMilliseconds, \Closure $when): static;

    /*----------------------------------------*
     * Max Redirects
     *----------------------------------------*/

    /**
     * set max redirects
     *
     * @param int $maxRedirects
     * @return static
     */
    public function maxRedirects(int $maxRedirects): static;

    /*----------------------------------------*
     * Without Redirecting
     *----------------------------------------*/

    /**
     * set without redirecting
     *
     * @return static
     */
    public function withoutRedirecting(): static;

    /*----------------------------------------*
     * Without Verifying
     *----------------------------------------*/

    /**
     * set without verifying
     *
     * @return static
     */
    public function withoutVerifying(): static;
}
