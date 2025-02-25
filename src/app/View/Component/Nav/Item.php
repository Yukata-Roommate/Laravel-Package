<?php

namespace YukataRm\Laravel\View\Component\Nav;

use YukataRm\Laravel\View\Component\CustomComponent;

use YukataRm\Laravel\Trait\View\Component\Nav;

/**
 * Nav Item Component
 *
 * @package YukataRm\Laravel\View\Component\Nav
 */
class Item extends CustomComponent
{
    use Nav;

    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $key
     * @param bool $active
     */
    public function __construct(string $key, bool $active)
    {
        $this->setKey($key);
        $this->setActive($active);
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
            "role"  => "presentation",
        ];
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * id
     *
     * @var string
     */
    public string $id;

    /**
     * aria controls
     *
     * @var string
     */
    public string $ariaControls;

    /**
     * class
     *
     * @var string
     */
    public string $class;

    /**
     * aria selected
     *
     * @var string
     */
    public string $ariaSelected;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set key
     *
     * @param string $key
     * @return void
     */
    protected function setKey(string $key): void
    {
        $this->id           = $this->navItemId($key);
        $this->ariaControls = $this->navContentId($key);
    }

    /**
     * set active
     *
     * @param bool $active
     * @return void
     */
    protected function setActive(bool $active): void
    {
        $this->class        = $active ? "nav-link active" : "nav-link";
        $this->ariaSelected = $active ? "true" : "false";
    }
}
