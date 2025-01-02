<?php

namespace YukataRm\Laravel\Auth\Controller;

use YukataRm\Laravel\Auth\Controller\Base\SingleFailedController;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Hash;

/**
 * Reset Password Controller
 *
 * @package YukataRm\Laravel\Auth\Controller
 */
class ResetPasswordController extends SingleFailedController
{
    /*========================================*
     * Form
     *========================================*/

    /**
     * form view
     *
     * @var string
     */
    protected string $view = "auth.reset-password";

    /**
     * form data
     *
     * @var array<string, mixed>
     */
    protected array $data = [];

    /*========================================*
     * Handle
     *========================================*/

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
            $this->passwordKey() => ["required", "confirmed", "min:8", "max:32"],
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
        if (!$this->updatePassword()) return $this->failed();

        $this->guardLogout();

        return null;
    }

    /*----------------------------------------*
     * Update Password
     *----------------------------------------*/

    /**
     * update password
     *
     * @return bool
     */
    protected function updatePassword(): bool
    {
        $user = $this->guardUser();

        $user->{$this->passwordKey()} = Hash::make($this->password());

        return $this->runTransaction(function () use ($user) {
            $user->save();
        });
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
    protected string $withErrorsMessageKey = "reset-password.failure";

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
    protected string $route = "auth.login.form";

    /**
     * with key
     *
     * @var string
     */
    protected string $withKey = "auth.reset-password";

    /**
     * with message key
     *
     * @var string
     */
    protected string $withMessageKey = "reset-password.success";
}
