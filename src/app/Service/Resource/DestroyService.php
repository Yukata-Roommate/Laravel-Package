<?php

namespace YukataRm\Laravel\Service\Resource;

use YukataRm\Laravel\Service\ResourceService;

use Illuminate\Http\RedirectResponse;

/**
 * Destroy Service
 *
 * @package YukataRm\Laravel\Service\Resource
 */
abstract class DestroyService extends ResourceService
{
    /**
     * execute service
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function execute(): RedirectResponse
    {
        return $this->destroy()
            ? $this->success()
            : $this->failure();
    }

    /**
     * destroy
     *
     * @return bool
     */
    abstract protected function destroy(): bool;

    /**
     * destroy success response
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function success(): RedirectResponse
    {
        return $this->deleteSuccessRedirect(
            $this->successPath(),
            $this->successParams()
        );
    }

    /**
     * destroy success response path
     *
     * @return string
     */
    protected function successPath(): string
    {
        return $this->resourceRoute("index");
    }

    /**
     * destroy success response params
     *
     * @return array<string, mixed>
     */
    protected function successParams(): array
    {
        return [];
    }

    /**
     * destroy failure response
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function failure(): RedirectResponse
    {
        return $this->deleteFailureRedirect(
            $this->failurePath(),
            $this->failureParams(),
            $this->failureInput()
        );
    }

    /**
     * destroy failure response path
     *
     * @return string
     */
    protected function failurePath(): string
    {
        return $this->resourceRoute("show");
    }

    /**
     * destroy failure response params
     *
     * @return array<string, mixed>
     */
    abstract protected function failureParams(): array;

    /**
     * destroy failure response input
     *
     * @return array<string, mixed>
     */
    protected function failureInput(): array
    {
        return [];
    }
}
