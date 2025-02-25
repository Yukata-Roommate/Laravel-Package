<?php

namespace YukataRm\Laravel\Http;

use YukataRm\Laravel\Interface\Http\ResponseInterface;

use Illuminate\Http\Client\Response as LaravelResponse;
use Illuminate\Support\Collection;

/**
 * Response
 *
 * @package YukataRm\Laravel\Http
 */
class Response implements ResponseInterface
{
    /**
     * Laravel Response instance
     *
     * @var \Illuminate\Http\Client\Response
     */
    public readonly LaravelResponse $response;

    /**
     * constructor
     *
     * @param \Illuminate\Http\Client\Response $response
     */
    public function __construct(LaravelResponse $response)
    {
        $this->response = $response;
    }

    /**
     * whether response is successful
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->response->successful();
    }

    /**
     * get status code
     *
     * @return int
     */
    public function statusCode(): int
    {
        return $this->response->status();
    }

    /**
     * get headers
     *
     * @return array
     */
    public function headers(): array
    {
        return $this->response->headers();
    }

    /**
     * get body
     *
     * @return mixed
     */
    public function body(): mixed
    {
        return $this->response->json();
    }

    /**
     * get body as string
     *
     * @return string
     */
    public function bodyAsString(): string
    {
        return $this->response->body();
    }

    /**
     * get body as object
     *
     * @return mixed
     */
    public function bodyAsObject(): mixed
    {
        return $this->response->object();
    }

    /**
     * get body as collection
     *
     * @return \Illuminate\Support\Collection
     */
    public function bodyAsCollection(): Collection
    {
        return $this->response->collect();
    }

    /**
     * get reason
     *
     * @return string
     */
    public function reason(): string
    {
        return $this->response->reason();
    }
}
