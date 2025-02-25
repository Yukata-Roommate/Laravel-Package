<?php

namespace YukataRm\Laravel\View\Component\Nav;

use YukataRm\Laravel\View\Component\CustomComponent;

use YukataRm\Laravel\Trait\View\Component\Nav;

/**
 * Nav Content Component
 *
 * @package YukataRm\Laravel\View\Component\Nav
 */
class Content extends CustomComponent
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
            "id"              => $this->id,
            "class"           => $this->class,
            "aria-labelledby" => $this->ariaLabelledBy,
            "role"            => "tabpanel",
            "tabindex"        => 0,
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
     * class
     *
     * @var string
     */
    public string $class;

    /**
     * aria labelled by
     *
     * @var string
     */
    public string $ariaLabelledBy;

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
        $this->id             = $this->navContentId($key);
        $this->ariaLabelledBy = $this->navItemId($key);
    }

    /**
     * set active
     *
     * @param bool $active
     * @return void
     */
    protected function setActive(bool $active): void
    {
        $this->class = $active ? "tab-pane fade active show" : "tab-pane fade";
    }
}
