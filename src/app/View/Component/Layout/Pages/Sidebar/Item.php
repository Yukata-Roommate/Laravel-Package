<?php

namespace YukataRm\Laravel\View\Component\Layout\Pages\Sidebar;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Layout Pages Sidebar Item Component
 *
 * @package YukataRm\Laravel\View\Component\Layout\Pages\Sidebar
 */
class Item extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $prefix
     * @param string $href
     * @param string $icon
     * @param string $title
     */
    public function __construct(string $prefix, string $href, string $icon, string $title)
    {
        $this->setRoutePrefix($prefix);
        $this->setHref($href);
        $this->setIcon($icon);
        $this->setTitle($title);

        $this->setNavLinkClass();
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
            "class" => "nav-item",
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
     * href
     *
     * @var string
     */
    public string $href;

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
     * nav link class
     *
     * @var string
     */
    public string $navLinkClass;

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
     * set href
     *
     * @param string $href
     * @return void
     */
    protected function setHref(string $href): void
    {
        $this->href = $href;
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
}
