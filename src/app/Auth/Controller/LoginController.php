<?php

namespace YukataRm\Laravel\Auth\Controller;

use YukataRm\Laravel\Auth\Controller\Base\SingleFailedController;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\RateLimiter;

use Illuminate\Support\Facades\Auth;

/**
 * Login Controller
 *
 * @package YukataRm\Laravel\Auth\Controller
 */
class LoginController extends SingleFailedController
{
    /*========================================*
     * Form
     *========================================*/

    /**
     * form view
     *
     * @var string
     */
    protected string $view = "auth.login";

    /**
     * form data
     *
     * @var array<string, mixed>
     */
    protected array $data = [];

    /*========================================*
     * Handle
     *========================================*/

    /**
     * initialize
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    #[\Override]
    protected function initialize(Request $request): void
    {
        parent::initialize($request);

        $this->setRateLimitKey($request);
    }

    /*----------------------------------------*
     * Request
     *----------------------------------------*/

    /**
     * user name key
     *
     * @var string
     */
    protected string $userNameKey = "email";

    /**
     * password key
     *
     * @var string
     */
    protected string $passwordKey = "password";

    /**
     * get user name key
     *
     * @return string
     */
    protected function userNameKey(): string
    {
        return $this->userNameKey;
    }

    /**
     * get password key
     *
     * @return string
     */
    protected function passwordKey(): string
    {
        return $this->passwordKey;
    }

    /**
     * get validate request rules
     *
     * @return array<string, string>
     */
    protected function validateRequestRules(): array
    {
        return [
            $this->userNameKey() => ["required", "email"],
            $this->passwordKey() => ["required", "string", "min:8", "max:32"],
        ];
    }

    /*----------------------------------------*
     * Process
     *----------------------------------------*/

    /**
     * process
     *
     * @return \Illuminate\Http\RedirectResponse|null
     */
    protected function process(): RedirectResponse|null
    {
        if ($this->isReachedRateLimit()) return $this->reachedRateLimit();

        if (!$this->attemptLogin()) return $this->failed();

        $this->sessionRegenerate();

        $this->clearRateLimit();

        $this->runLogoutOtherDevices();

        return null;
    }

    /*----------------------------------------*
     * Rate Limit
     *----------------------------------------*/

    /**
     * rate limit
     *
     * @var int
     */
    protected int $rateLimit = 5;

    /**
     * rate limit decay
     *
     * @var int
     */
    protected int $rateLimitDecay = 300;

    /**
     * rate limit key
     *
     * @var string
     */
    protected string $rateLimitKey;

    /**
     * set rate limit key
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function setRateLimitKey(Request $request): void
    {
        $this->rateLimitKey = $request->ip();
    }

    /**
     * whether is reached rate limit
     *
     * @return bool
     */
    protected function isReachedRateLimit(): bool
    {
        return RateLimiter::tooManyAttempts($this->rateLimitKey(), $this->rateLimit());
    }

    /**
     * reached rate limit
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function reachedRateLimit(): RedirectResponse
    {
        return redirect()
            ->back()
            ->withErrors($this->rateLimitErrors());
    }

    /**
     * hit rate limit
     *
     * @return void
     */
    protected function hitRateLimit(): void
    {
        RateLimiter::hit($this->rateLimitKey(), $this->rateLimitDecay());
    }

    /**
     * clear rate limit
     *
     * @return void
     */
    protected function clearRateLimit(): void
    {
        RateLimiter::clear($this->rateLimitKey());
    }

    /**
     * get seconds to rate limit wait
     *
     * @return int
     */
    protected function rateLimitWait(): int
    {
        return RateLimiter::availableIn($this->rateLimitKey());
    }

    /**
     * get redirect with rate limit errors
     *
     * @return array<string, mixed>
     */
    protected function rateLimitErrors(): array
    {
        $seconds = $this->rateLimitWait();

        return [
            "form" => match (true) {
                $seconds < 60    => $this->lang("login.throttle.seconds", ["seconds" => $seconds]),
                $seconds < 3600  => $this->lang("login.throttle.minutes", ["minutes" => floor($seconds / 60)]),
                $seconds < 86400 => $this->lang("login.throttle.hours", ["hours" => floor($seconds / 3600)]),

                default => $this->lang("login.throttle.days", ["days" => floor($seconds / 86400)]),
            },
        ];
    }

    /**
     * get rate limit
     *
     * @return int
     */
    protected function rateLimit(): int
    {
        return $this->rateLimit;
    }

    /**
     * get rate limit decay
     *
     * @return int
     */
    protected function rateLimitDecay(): int
    {
        return $this->rateLimitDecay;
    }

    /**
     * get rate limit key
     *
     * @return string
     */
    protected function rateLimitKey(): string
    {
        return $this->rateLimitKey;
    }

    /*----------------------------------------*
     * Attempt
     *----------------------------------------*/

    /**
     * remember key
     *
     * @var string
     */
    protected string $rememberKey = "remember";

    /**
     * attempt login
     *
     * @return bool
     */
    protected function attemptLogin(): bool
    {
        return $this->guardInstance()
            ->attempt(
                $this->credentials(),
                $this->remember()
            );
    }

    /**
     * get credentials
     *
     * @return array<string, mixed>
     */
    protected function credentials(): array
    {
        return $this->requestOnly($this->credentialsKey());
    }

    /**
     * get credentials key
     *
     * @return array<string>
     */
    protected function credentialsKey(): array
    {
        return [
            $this->userNameKey(),
            $this->passwordKey()
        ];
    }

    /**
     * get remember
     *
     * @return bool
     */
    protected function remember(): bool
    {
        return $this->requestFilled($this->rememberKey());
    }

    /**
     * get remember key
     *
     * @return string
     */
    protected function rememberKey(): string
    {
        return $this->rememberKey;
    }

    /*----------------------------------------*
     * Session
     *----------------------------------------*/

    /**
     * session regenerate
     *
     * @return void
     */
    protected function sessionRegenerate(): void
    {
        $this->request->session()->regenerate();
    }

    /*----------------------------------------*
     * Logout Other Devices
     *----------------------------------------*/

    /**
     * whether logout other devices
     *
     * @var bool
     */
    protected bool $logoutOtherDevices = false;

    /**
     * run logout other devices
     *
     * @return void
     */
    protected function runLogoutOtherDevices(): void
    {
        if (!$this->logoutOtherDevices()) return;

        Auth::logoutOtherDevices($this->password());
    }

    /**
     * whether logout other devices
     *
     * @return bool
     */
    protected function logoutOtherDevices(): bool
    {
        return $this->logoutOtherDevices;
    }

    /**
     * get password
     *
     * @return string
     */
    protected function password(): string
    {
        return $this->requestInput($this->passwordKey());
    }

    /*----------------------------------------*
     * Failed
     *----------------------------------------*/

    /**
     * with errors key
     *
     * @var string
     */
    protected string $withErrorsKey = "form";

    /**
     * with errors message key
     *
     * @var string
     */
    protected string $withErrorsMessageKey = "login.failure";

    /**
     * prepare failed redirect
     *
     * @return void
     */
    #[\Override]
    protected function prepareFailedRedirect(): void
    {
        $this->hitRateLimit();
    }

    /**
     * get with input key
     *
     * @return array<string>
     */
    protected function withInputKey(): array
    {
        return [
            $this->userNameKey(),
        ];
    }

    /*----------------------------------------*
     * Success
     *----------------------------------------*/

    /**
     * route
     *
     * @var string
     */
    protected string $route = "home";

    /**
     * with key
     *
     * @var string
     */
    protected string $withKey = "auth.login";

    /**
     * with message key
     *
     * @var string
     */
    protected string $withMessageKey = "login.success";

    /**
     * get success redirect
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    #[\Override]
    protected function successRedirect(): RedirectResponse
    {
        return redirect()
            ->intended($this->route())
            ->with($this->with());
    }
}
