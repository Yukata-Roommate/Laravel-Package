<?php

namespace YukataRm\Laravel\Service\Resource;

use YukataRm\Laravel\Service\ResourceService;

use Illuminate\Http\RedirectResponse;

/**
 * Update Service
 *
 * @package YukataRm\Laravel\Service\Resource
 */
abstract class UpdateService extends ResourceService
{
    /**
     * execute service
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function execute(): RedirectResponse
    {
        return $this->update()
            ? $this->success()
            : $this->failure();
    }

    /**
     * update
     *
     * @return bool
     */
    abstract protected function update(): bool;

    /**
     * update success response
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function success(): RedirectResponse
    {
        return $this->updateSuccessRedirect(
            $this->successPath(),
            $this->successParams()
        );
    }

    /**
     * update success response path
     *
     * @return string
     */
    protected function successPath(): string
    {
        return $this->resourceRoute("show");
    }

    /**
     * update success response params
     *
     * @return array<string, mixed>
     */
    abstract protected function successParams(): array;

    /**
     * update failure response
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function failure(): RedirectResponse
    {
        return $this->updateFailureRedirect(
            $this->failurePath(),
            $this->failureParams(),
            $this->failureInput()
        );
    }

    /**
     * update failure response path
     *
     * @return string
     */
    protected function failurePath(): string
    {
        return $this->resourceRoute("edit");
    }

    /**
     * update failure response params
     *
     * @return array<string, mixed>
     */
    abstract protected function failureParams(): array;

    /**
     * update failure response input
     *
     * @return array<string, mixed>
     */
    abstract protected function failureInput(): array;
}
