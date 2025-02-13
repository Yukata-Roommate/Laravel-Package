<?php

namespace YukataRm\Laravel\Service\Resource;

use YukataRm\Laravel\Service\ResourceService;

use Illuminate\Http\RedirectResponse;

/**
 * Store Service
 *
 * @package YukataRm\Laravel\Service\Resource
 */
abstract class StoreService extends ResourceService
{
    /**
     * execute service
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function execute(): RedirectResponse
    {
        return $this->store()
            ? $this->success()
            : $this->failure();
    }

    /**
     * store
     *
     * @return bool
     */
    abstract protected function store(): bool;

    /**
     * store success response
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function success(): RedirectResponse
    {
        return $this->storeSuccessRedirect(
            $this->successPath(),
            $this->successParams()
        );
    }

    /**
     * store success response path
     *
     * @return string
     */
    protected function successPath(): string
    {
        return $this->resourceRoute("show");
    }

    /**
     * store success response params
     *
     * @return array<string, mixed>
     */
    abstract protected function successParams(): array;

    /**
     * store failure response
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function failure(): RedirectResponse
    {
        return $this->storeFailureRedirect(
            $this->failurePath(),
            $this->failureParams(),
            $this->failureInput()
        );
    }

    /**
     * store failure response path
     *
     * @return string
     */
    protected function failurePath(): string
    {
        return $this->resourceRoute("create");
    }

    /**
     * store failure response params
     *
     * @return array<string, mixed>
     */
    protected function failureParams(): array
    {
        return [];
    }

    /**
     * store failure response input
     *
     * @return array<string, mixed>
     */
    abstract protected function failureInput(): array;
}
