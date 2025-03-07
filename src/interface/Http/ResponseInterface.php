<?php

namespace YukataRm\Laravel\Interface\Http;

use Illuminate\Support\Collection;

/**
 * Response Interface
 *
 * @package YukataRm\Laravel\Interface\Http
 */
interface ResponseInterface
{
    /**
     * whether response is successful
     *
     * @return bool
     */
    public function isSuccess(): bool;

    /**
     * get status code
     *
     * @return int
     */
    public function statusCode(): int;

    /**
     * get headers
     *
     * @return array
     */
    public function headers(): array;

    /**
     * get body
     *
     * @return mixed
     */
    public function body(): mixed;

    /**
     * get body as string
     *
     * @return string
     */
    public function bodyAsString(): string;

    /**
     * get body as object
     *
     * @return mixed
     */
    public function bodyAsObject(): mixed;

    /**
     * get body as collection
     *
     * @return \Illuminate\Support\Collection
     */
    public function bodyAsCollection(): Collection;

    /**
     * get reason
     *
     * @return string
     */
    public function reason(): string;
}
