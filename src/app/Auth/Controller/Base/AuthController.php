<?php

namespace YukataRm\Laravel\Auth\Controller\Base;

use YukataRm\Laravel\Trait\Auth\Lang;
use YukataRm\Laravel\Trait\Auth\Guard;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use YukataRm\Laravel\Facade\Db;

/**
 * Auth Controller
 *
 * @package YukataRm\Laravel\Auth\Controller\Base
 */
abstract class AuthController
{
    use Lang, Guard;

    /*========================================*
     * Handle
     *========================================*/

    /**
     * handle
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request): RedirectResponse
    {
        $this->initialize($request);

        $this->validateRequest();

        return $this->process() ?? $this->successRedirect();
    }

    /**
     * initialize
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function initialize(Request $request): void
    {
        $this->setRequest($request);
    }

    /**
     * process
     *
     * @return \Illuminate\Http\RedirectResponse|null
     */
    abstract protected function process(): RedirectResponse|null;

    /*----------------------------------------*
     * Request
     *----------------------------------------*/

    /**
     * request
     *
     * @var \Illuminate\Http\Request
     */
    protected Request $request;

    /**
     * set request
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    /**
     * validate request
     *
     * @return void
     */
    protected function validateRequest(): void
    {
        $this->request->validate($this->validateRequestRules());
    }

    /**
     * get validate request rules
     *
     * @return array<string, string>
     */
    abstract protected function validateRequestRules(): array;

    /**
     * get request only
     *
     * @param array<string> $keys
     * @return array<string, mixed>
     */
    protected function requestOnly(array $keys): array
    {
        return $this->request->only($keys);
    }

    /**
     * get request input
     *
     * @param string $key
     * @return mixed
     */
    protected function requestInput(string $key)
    {
        return $this->request->input($key);
    }

    /**
     * get request filled
     *
     * @param string $key
     * @return bool
     */
    protected function requestFilled(string $key): bool
    {
        return $this->request->filled($key);
    }

    /*----------------------------------------*
     * Transaction
     *----------------------------------------*/

    /**
     * run transaction
     *
     * @param callable $callback
     * @return bool
     */
    protected function runTransaction(callable $callback): bool
    {
        try {
            Db::execute($callback);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /*----------------------------------------*
     * Success
     *----------------------------------------*/

    /**
     * route
     *
     * @var string
     */
    protected string $route;

    /**
     * with key
     *
     * @var string
     */
    protected string $withKey;

    /**
     * with message key
     *
     * @var string
     */
    protected string $withMessageKey;

    /**
     * get success redirect
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function successRedirect(): RedirectResponse
    {
        return redirect()
            ->route($this->route())
            ->with($this->with());
    }

    /**
     * get route
     *
     * @return string
     */
    protected function route(): string
    {
        return $this->route;
    }

    /**
     * get with
     *
     * @return array<string, mixed>
     */
    protected function with(): array
    {
        return [
            $this->withKey() => $this->withMessage()
        ];
    }

    /**
     * get with key
     *
     * @return string
     */
    protected function withKey(): string
    {
        return $this->withKey;
    }

    /**
     * get with message
     *
     * @return string
     */
    protected function withMessage(): string
    {
        $key = $this->withMessageKey();

        $lang    = __($key);
        $default = $this->lang($key);

        return $key === $lang ? $default : $lang;
    }

    /**
     * get with message key
     *
     * @return string
     */
    protected function withMessageKey(): string
    {
        return $this->withMessageKey;
    }

    /*----------------------------------------*
     * Failed
     *----------------------------------------*/

    /**
     * get failed redirect
     *
     * @param array<string, mixed> $withInput
     * @param array<string, mixed> $withErrors
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function failedRedirect(array $withInput, array $withErrors): RedirectResponse
    {
        return redirect()
            ->back()
            ->withInput($withInput)
            ->withErrors($withErrors);
    }

    /**
     * get with input
     *
     * @param array<string> $keys
     * @return array<string, mixed>
     */
    protected function withInput(array $keys): array
    {
        return $this->requestOnly($keys);
    }

    /**
     * get with errors message
     *
     * @param string $key
     * @return string
     */
    protected function withErrorsMessage(string $key): string
    {
        $lang = __($key);

        return $key !== $lang ? $lang : $this->lang($key);
    }
}
