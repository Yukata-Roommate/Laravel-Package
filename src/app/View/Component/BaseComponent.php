<?php

namespace YukataRm\Laravel\View\Component;

use Illuminate\View\Component;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Contracts\Support\Htmlable;
use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Base Component
 *
 * @package YukataRm\Laravel\View\Component
 */
abstract class BaseComponent extends Component
{
    /*----------------------------------------*
     * Required
     *----------------------------------------*/

    /**
     * render component
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\Support\Htmlable|\Closure|string
     */
    public function render(): ViewContract|Htmlable|Closure|string
    {
        $this->setMergeAttributes();

        return $this->componentView();
    }

    /*----------------------------------------*
     * View
     *----------------------------------------*/

    /**
     * get component view
     *
     * @return \Illuminate\Contracts\View\View
     */
    protected function componentView(): ViewContract
    {
        return view($this->component());
    }

    /**
     * get component
     *
     * @return string
     */
    abstract protected function component(): string;

    /*----------------------------------------*
     * Attributes
     *----------------------------------------*/

    /**
     * merge attributes
     *
     * @var array<string, mixed>
     */
    public array $merge = [];

    /**
     * set merged attributes
     *
     * @return void
     */
    protected function setMergeAttributes(): void
    {
        $this->merge = $this->mergeAttributes();
    }

    /**
     * merge attributes
     *
     * @return array<string, mixed>
     */
    protected function mergeAttributes(): array
    {
        return [];
    }

    /*----------------------------------------*
     * HTML
     *----------------------------------------*/

    /**
     * escape html special characters and convert newline code to br tag
     *
     * @param string $text
     * @return string
     */
    public function enl2br(string $text): string
    {
        return nl2br(htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8", true));
    }

    /*----------------------------------------*
     * Auth
     *----------------------------------------*/

    /**
     * whether user is logged in
     *
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return Auth::check();
    }

    /**
     * get user
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user(): Authenticatable|null
    {
        return Auth::user();
    }

    /*----------------------------------------*
     * Request
     *----------------------------------------*/

    /**
     * get Request instance
     *
     * @return \Illuminate\Http\Request
     */
    public function request(): Request
    {
        return request();
    }

    /**
     * get route name
     *
     * @return string
     */
    public function routeName(): string
    {
        return $this->request()->route()->getName();
    }

    /**
     * whether route name is matched
     *
     * @param string $routeName
     * @return bool
     */
    public function isRouteName(string $routeName): bool
    {
        return $this->routeName() === $routeName;
    }

    /**
     * whether route name is contained
     *
     * @param string $routeName
     * @return bool
     */
    public function isRouteNameContains(string $routeName): bool
    {
        return str_contains($this->routeName(), $routeName);
    }

    /**
     * whether route name starts with
     *
     * @param string $routeName
     * @return bool
     */
    public function isRouteNameStartsWith(string $routeName): bool
    {
        return str_starts_with($this->routeName(), $routeName);
    }

    /**
     * get route prefix
     *
     * @return string
     */
    public function routePrefix(): string
    {
        return $this->request()->route()->getPrefix();
    }

    /**
     * whether route prefix is matched
     *
     * @param string $routePrefix
     * @return bool
     */
    public function isRoutePrefix(string $routePrefix): bool
    {
        return $this->routePrefix() === $routePrefix;
    }

    /**
     * whether route prefix is contained
     *
     * @param string $routePrefix
     * @return bool
     */
    public function isRoutePrefixContains(string $routePrefix): bool
    {
        return str_contains($this->routePrefix(), $routePrefix);
    }

    /*----------------------------------------*
     * View
     *----------------------------------------*/

    /**
     * whether user has section
     *
     * @param string $section
     * @return bool
     */
    public function hasSection(string $section): bool
    {
        return View::hasSection($section);
    }
}
