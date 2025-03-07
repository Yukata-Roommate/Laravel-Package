<?php

namespace YukataRm\Laravel\Http;

use YukataRm\Laravel\Interface\Http\RequestInterface;

use YukataRm\Laravel\Interface\Http\ResponseInterface;
use YukataRm\Laravel\Http\Response;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;

/**
 * Request
 *
 * @package YukataRm\Laravel\Http
 */
class Request implements RequestInterface
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * url
     *
     * @var string
     */
    public readonly string $url;

    /**
     * request parameters
     *
     * @var array
     */
    public readonly array $params;

    /**
     * http method
     *
     * @var string
     */
    public readonly string $method;

    /**
     * PendingRequest instance
     *
     * @var \Illuminate\Http\Client\PendingRequest
     */
    public readonly PendingRequest $request;

    /**
     * constructor
     *
     * @param string $method
     * @param string $url
     * @param array $params
     */
    public function __construct(string $method, string $url, array $params)
    {
        $this->method = $method;
        $this->url    = $url;
        $this->params = $params;

        $this->request = Http::acceptJson();
    }

    /*----------------------------------------*
     * Send Request
     *----------------------------------------*/

    /**
     * send request
     *
     * @return \YukataRm\Laravel\Interface\Http\ResponseInterface
     */
    public function send(): ResponseInterface
    {
        $response = match ($this->method) {
            "get"    => $this->request->get($this->url, $this->params),
            "post"   => $this->request->post($this->url, $this->params),
            "put"    => $this->request->put($this->url, $this->params),
            "delete" => $this->request->delete($this->url, $this->params),
            "head"   => $this->request->head($this->url, $this->params),
            "patch"  => $this->request->patch($this->url, $this->params),
        };

        return new Response($response);
    }

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
    public function basicAuth(string $userName, string $password): static
    {
        $this->request->withBasicAuth($userName, $password);

        return $this;
    }

    /**
     * set digest auth
     *
     * @param string $userName
     * @param string $password
     * @return static
     */
    public function digestAuth(string $userName, string $password): static
    {
        $this->request->withDigestAuth($userName, $password);

        return $this;
    }

    /*----------------------------------------*
     * Body Format
     *----------------------------------------*/

    /**
     * set body format
     *
     * @param string $bodyFormat
     * @return static
     */
    public function bodyFormat(string $bodyFormat): static
    {
        $this->request->bodyFormat($bodyFormat);

        return $this;
    }

    /**
     * set body format as body
     *
     * @return static
     */
    public function asBody(): static
    {
        return $this->bodyFormat("body");
    }

    /**
     * set body format as json
     *
     * @return static
     */
    public function asJson(): static
    {
        return $this->bodyFormat("json");
    }

    /**
     * set body format as form params
     *
     * @return static
     */
    public function asForm(): static
    {
        return $this->bodyFormat("form_params");
    }

    /**
     * set body format as multipart
     *
     * @return static
     */
    public function asMultipart(): static
    {
        return $this->bodyFormat("multipart");
    }

    /*----------------------------------------*
     * Request Headers
     *----------------------------------------*/

    /**
     * set headers
     *
     * @param array $headers
     * @return static
     */
    public function headers(array $headers): static
    {
        $this->request->withHeaders($headers);

        return $this;
    }

    /**
     * add header
     *
     * @param string $name
     * @param string $value
     * @return static
     */
    public function addHeader(string $name, string $value): static
    {
        $this->request->withHeader($name, $value);

        return $this;
    }

    /**
     * set accept header
     *
     * @param string $accept
     * @return static
     */
    public function accept(string $accept): static
    {
        return $this->addHeader("Accept", $accept);
    }

    /**
     * set accept json header
     *
     * @return static
     */
    public function acceptJson(): static
    {
        return $this->accept("application/json");
    }

    /**
     * set accept form header
     *
     * @return static
     */
    public function acceptForm(): static
    {
        return $this->accept("application/x-www-form-urlencoded");
    }

    /**
     * set accept html header
     *
     * @return static
     */
    public function acceptHtml(): static
    {
        return $this->accept("text/html");
    }

    /**
     * set token header
     *
     * @param string $tokenType
     * @param string $token
     * @return static
     */
    public function token(string $tokenType, string $token): static
    {
        return $this->addHeader("Authorization", trim("{$tokenType} {$token}"));
    }

    /**
     * set bearer token header
     *
     * @param string $token
     * @return static
     */
    public function bearerToken(string $token): static
    {
        return $this->token("Bearer", $token);
    }

    /**
     * set content type header
     *
     * @param string $contentType
     * @return static
     */
    public function contentType(string $contentType): static
    {
        return $this->addHeader("Content-Type", $contentType);
    }

    /**
     * set content type json header
     *
     * @return static
     */
    public function contentTypeJson(): static
    {
        return $this->contentType("application/json");
    }

    /**
     * set content type form header
     *
     * @return static
     */
    public function contentTypeForm(): static
    {
        return $this->contentType("application/x-www-form-urlencoded");
    }

    /**
     * set content type html header
     *
     * @return static
     */
    public function contentTypeHtml(): static
    {
        return $this->contentType("text/html");
    }

    /*----------------------------------------*
     * Timeout
     *----------------------------------------*/

    /**
     * set timeout
     *
     * @param int $seconds
     * @return static
     */
    public function timeout(int $seconds = 30): static
    {
        $this->request->timeout($seconds);

        return $this;
    }

    /**
     * set connect timeout
     *
     * @param int $seconds
     * @return static
     */
    public function connectTimeout(int $seconds = 10): static
    {
        $this->request->connectTimeout($seconds);

        return $this;
    }

    /*----------------------------------------*
     * Retry
     *----------------------------------------*/

    /**
     * set retry
     *
     * @param int $times
     * @param int $sleepMilliseconds
     * @param \Closure|null $when
     * @return static
     */
    public function retry(int $times, int $sleepMilliseconds = 0, \Closure|null $when = null): static
    {
        $this->request->retry($times, $sleepMilliseconds, $when);

        return $this;
    }

    /*----------------------------------------*
     * Max Redirects
     *----------------------------------------*/

    /**
     * set max redirects
     *
     * @param int $maxRedirects
     * @return static
     */
    public function maxRedirects(int $maxRedirects): static
    {
        $this->request->maxRedirects($maxRedirects);

        return $this;
    }

    /*----------------------------------------*
     * Without Redirecting
     *----------------------------------------*/

    /**
     * set without redirecting
     *
     * @return static
     */
    public function withoutRedirecting(): static
    {
        $this->request->withoutRedirecting();

        return $this;
    }

    /*----------------------------------------*
     * Without Verifying
     *----------------------------------------*/

    /**
     * set without verifying
     *
     * @return static
     */
    public function withoutVerifying(): static
    {
        $this->request->withoutVerifying();

        return $this;
    }
}
