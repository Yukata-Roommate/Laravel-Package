<?php

namespace YukataRm\Laravel\Package\Provider;

use YukataRm\Laravel\Provider\MacroServiceProvider as ServiceProvider;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ColumnDefinition;
use Illuminate\Support\Fluent;

use App\Http\Controllers\Auth;
use Illuminate\Routing\Router;

/**
 * Macro Service Provider
 *
 * @package YukataRm\Laravel\Package\Provider
 *
 * @method \Illuminate\Database\Schema\ColumnDefinition tinyInteger(string $column, bool $autoIncrement = false, bool $unsigned = false)
 * @method \Illuminate\Support\Fluent dropColumn(array|mixed $columns)
 * @see \Illuminate\Database\Schema\Blueprint
 *
 * @method \Illuminate\Routing\RouteRegistrar group(array $attributes, \Closure $routes)
 * @method \Illuminate\Routing\RouteRegistrar controller(string $controller)
 * @method \Illuminate\Routing\Route get(string $uri, array|string|callable|null $action = null)
 * @method \Illuminate\Routing\Route post(string $uri, array|string|callable|null $action = null)
 * @see \Illuminate\Routing\Router
 */
class MacroServiceProvider extends ServiceProvider
{
    /**
     * get macros
     *
     * @return array<string, array<string, \Closure>>
     */
    protected function macros(): array
    {
        return array_merge(
            $this->blueprintMacros(),

            $this->routerMacros(),
        );
    }

    /*----------------------------------------*
     * Blueprint
     *----------------------------------------*/

    /**
     * get Blueprint macros
     *
     * @return array<string, array<string, \Closure>>
     */
    protected function blueprintMacros(): array
    {
        return [
            Blueprint::class => [
                "isActive"     => $this->isActive(),
                "dropIsActive" => $this->dropIsActive(),
            ],
        ];
    }

    /**
     * get blueprint isActive macro
     *
     * @return \Closure
     */
    protected function isActive(): \Closure
    {
        return function (int $default = 1): ColumnDefinition {
            return $this->tinyInteger("is_active")->default($default);
        };
    }

    /**
     * get blueprint dropIsActive macro
     *
     * @return \Closure
     */
    protected function dropIsActive(): \Closure
    {
        return function (): Fluent {
            return $this->dropColumn("is_active");
        };
    }

    /*----------------------------------------*
     * Router
     *----------------------------------------*/

    /**
     * get Router macros
     *
     * @return array<string, array<string, \Closure>>
     */
    protected function routerMacros(): array
    {
        return [
            Router::class => [
                "phpinfo" => $this->phpinfo(),

                "login"          => $this->login(),
                "logout"         => $this->logout(),
                "resetEmail"     => $this->resetEmail(),
                "resetPassword"  => $this->resetPassword(),
                "forgotPassword" => $this->forgotPassword(),
                "auth"           => function (): void {
                    $this->login();
                    $this->logout();
                    $this->resetEmail();
                    $this->resetPassword();
                    $this->forgotPassword();
                },
            ],
        ];
    }

    /**
     * get router phpinfo macro
     *
     * @return \Closure
     */
    protected function phpinfo(): \Closure
    {
        return function (): void {
            $this->get("/phpinfo", function () {
                phpinfo();
            });
        };
    }

    /**
     * get router login macro
     *
     * @return \Closure
     */
    protected function login(): \Closure
    {
        return function (): void {
            $this->group(["prefix" => "auth", "as" => "auth."], function () {
                $this->controller(Auth\LoginController::class)
                    ->prefix("login")
                    ->as("login.")
                    ->group(function () {
                        $this->get("/", "form")->name("form");
                        $this->post("/", "handle")->name("handle");
                    });
            });
        };
    }

    /**
     * get router logout macro
     *
     * @return \Closure
     */
    protected function logout(): \Closure
    {
        return function (): void {
            $this->group(["prefix" => "auth", "as" => "auth."], function () {
                $this->controller(Auth\LogoutController::class)
                    ->prefix("logout")
                    ->as("logout.")
                    ->group(function () {
                        $this->post("/", "handle")->name("handle");
                    });
            });
        };
    }

    /**
     * get router resetEmail macro
     *
     * @return \Closure
     */
    protected function resetEmail(): \Closure
    {
        return function (): void {
            $this->group(["prefix" => "auth", "as" => "auth."], function () {
                $this->controller(Auth\ResetEmailController::class)
                    ->prefix("reset-email")
                    ->as("reset-email.")
                    ->group(function () {
                        $this->get("/", "form")->name("form");
                        $this->post("/", "handle")->name("handle");
                    });

                $this->controller(Auth\ResetEmailTokenController::class)
                    ->prefix("reset-email-token")
                    ->as("reset-email-token.")
                    ->group(function () {
                        $this->get("/", "form")->name("form");
                        $this->post("/", "handle")->name("handle");
                    });
            });
        };
    }

    /**
     * get router resetPassword macro
     *
     * @return \Closure
     */
    protected function resetPassword(): \Closure
    {
        return function (): void {
            $this->group(["prefix" => "auth", "as" => "auth."], function () {
                $this->controller(Auth\ResetPasswordController::class)
                    ->prefix("reset-password")
                    ->as("reset-password.")
                    ->group(function () {
                        $this->get("/", "form")->name("form");
                        $this->post("/", "handle")->name("handle");
                    });
            });
        };
    }

    /**
     * get router forgotPassword macro
     *
     * @return \Closure
     */
    protected function forgotPassword(): \Closure
    {
        return function (): void {
            $this->group(["prefix" => "auth", "as" => "auth."], function () {
                $this->controller(Auth\ForgotPasswordController::class)
                    ->prefix("forgot-password")
                    ->as("forgot-password.")
                    ->group(function () {
                        $this->get("/", "form")->name("form");
                        $this->post("/", "handle")->name("handle");
                    });

                $this->controller(Auth\ForgotPasswordTokenController::class)
                    ->prefix("forgot-password-token")
                    ->as("forgot-password-token.")
                    ->group(function () {
                        $this->get("/", "form")->name("form");
                        $this->post("/", "handle")->name("handle");
                    });
            });
        };
    }
}
