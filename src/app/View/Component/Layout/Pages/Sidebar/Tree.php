<?php

namespace YukataRm\Laravel\View\Component\Layout\Pages\Sidebar;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Layout Pages Sidebar Tree Component
 *
 * @package YukataRm\Laravel\View\Component\Layout\Pages\Sidebar
 */
class Tree extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $prefix
     * @param string $icon
     * @param string $title
     */
    public function __construct(string $prefix, string $icon, string $title)
    {
        $this->setRoutePrefix($prefix);
        $this->setIcon($icon);
        $this->setTitle($title);

        $this->setNavItemClass();
        $this->setNavLinkClass();
        $this->setNavStyle();
    }

    /*----------------------------------------*
     * Attributes
     *----------------------------------------*/

    /**
     * merge attributes
     *
     * @return array<string, mixed>
     */
    #[\Override]
    protected function mergeAttributes(): array
    {
        return [
            "class" => $this->navItemClass,
        ];
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * route prefix
     *
     * @var string
     */
    public string $routePrefix;

    /**
     * icon
     *
     * @var string
     */
    public string $icon;

    /**
     * title
     *
     * @var string
     */
    public string $title;

    /**
     * nav item class
     *
     * @var string
     */
    public string $navItemClass;

    /**
     * nav link class
     *
     * @var string
     */
    public string $navLinkClass;

    /**
     * nav style
     *
     * @var string
     */
    public string $navStyle;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set route prefix
     *
     * @param string $routePrefix
     * @return void
     */
    protected function setRoutePrefix(string $routePrefix): void
    {
        $this->routePrefix = $routePrefix;
    }

    /**
     * set icon
     *
     * @param string $icon
     * @return void
     */
    protected function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }

    /**
     * set title
     *
     * @param string $title
     * @return void
     */
    protected function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * set nav item class
     *
     * @return void
     */
    protected function setNavItemClass(): void
    {
        $this->navItemClass = $this->isRouteNameStartsWith($this->routePrefix)
            ? "nav-item menu-open"
            : "nav-item";
    }

    /**
     * set nav link class
     *
     * @return void
     */
    protected function setNavLinkClass(): void
    {
        $this->navLinkClass = $this->isRouteNameStartsWith($this->routePrefix)
            ? "nav-link active"
            : "nav-link";
    }

    /**
     * set nav style
     *
     * @return void
     */
    protected function setNavStyle(): void
    {
        $this->navStyle = $this->isRouteNameStartsWith($this->routePrefix)
            ? "box-sizing: border-box; display: block;"
            : "box-sizing: border-box; display: none;";
    }
}
