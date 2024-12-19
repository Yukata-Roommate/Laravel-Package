<?php

namespace YukataRm\Laravel\Service;

use YukataRm\Laravel\Service\BaseService;

use Illuminate\Http\RedirectResponse;

/**
 * Custom Service
 *
 * @package YukataRm\Laravel\Service
 */
abstract class CustomService extends BaseService
{
    /*----------------------------------------*
     * Redirect
     *----------------------------------------*/

    /**
     * success redirect to route
     *
     * @param string $route
     * @param array<string, mixed> $params
     * @param string|null $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function successRedirect(string $route, array $params = [], string|null $message = null): RedirectResponse
    {
        return $this->redirectRoute($route, $params)->with("alert.success", $message);
    }

    /**
     * store success redirect to route
     *
     * @param string $route
     * @param array<string, mixed> $params
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function storeSuccessRedirect(string $route, array $params = []): RedirectResponse
    {
        return $this->successRedirect($route, $params, __("yukata-rm::alert.success.store"));
    }

    /**
     * update success redirect to route
     *
     * @param string $route
     * @param array<string, mixed> $params
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function updateSuccessRedirect(string $route, array $params = []): RedirectResponse
    {
        return $this->successRedirect($route, $params, __("yukata-rm::alert.success.update"));
    }

    /**
     * delete success redirect to route
     *
     * @param string $route
     * @param array<string, mixed> $params
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function deleteSuccessRedirect(string $route, array $params = []): RedirectResponse
    {
        return $this->successRedirect($route, $params, __("yukata-rm::alert.success.delete"));
    }

    /**
     * failure redirect to route
     *
     * @param string $route
     * @param array<string, mixed> $params
     * @param array<string, mixed> $input
     * @param string|null $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function failureRedirect(string $route, array $params = [], array $input = [], string|null $message = null): RedirectResponse
    {
        return $this->redirectRoute($route, $params)->with("alert.failure", $message)->withInput($input);
    }

    /**
     * store failure redirect to route
     *
     * @param string $route
     * @param array<string, mixed> $params
     * @param array<string, mixed> $input
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function storeFailureRedirect(string $route, array $params = [], array $input = []): RedirectResponse
    {
        return $this->failureRedirect($route, $params, $input, __("yukata-rm::alert.failure.store"));
    }

    /**
     * update failure redirect to route
     *
     * @param string $route
     * @param array<string, mixed> $params
     * @param array<string, mixed> $input
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function updateFailureRedirect(string $route, array $params = [], array $input = []): RedirectResponse
    {
        return $this->failureRedirect($route, $params, $input, __("yukata-rm::alert.failure.update"));
    }

    /**
     * delete failure redirect to route
     *
     * @param string $route
     * @param array<string, mixed> $params
     * @param array<string, mixed> $input
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function deleteFailureRedirect(string $route, array $params = [], array $input = []): RedirectResponse
    {
        return $this->failureRedirect($route, $params, $input, __("yukata-rm::alert.failure.delete"));
    }

    /**
     * fetch failure redirect to route
     *
     * @param string $route
     * @param array<string, mixed> $params
     * @param array<string, mixed> $input
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function fetchFailureRedirect(string $route, array $params = [], array $input = []): RedirectResponse
    {
        return $this->failureRedirect($route, $params, $input, __("yukata-rm::alert.failure.fetch"));
    }
}
