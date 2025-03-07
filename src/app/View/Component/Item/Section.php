<?php

namespace YukataRm\Laravel\View\Component\Item;

use YukataRm\Laravel\View\Component\CustomComponent;

use YukataRm\Laravel\Trait\View\Component\ItemProperty;
use YukataRm\Laravel\Trait\View\Component\ItemTitle;

/**
 * Item Section Component
 *
 * @package YukataRm\Laravel\View\Component\Item
 */
class Section extends CustomComponent
{
    use ItemProperty;
    use ItemTitle;

    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $title
     * @param string|null $titleClass
     * @param string|null $size
     * @param string|null $color
     * @param bool|null $emphasis
     * @param bool|null $last
     */
    public function __construct(
        string $title,
        string|null $titleClass = null,
        string|null $size = null,
        string|null $color = null,
        bool|null $emphasis = null,
        bool|null $last = null,
    ) {
        $this->setTitle($title);
        $this->setTitleClass($titleClass, $size, $color, $emphasis);
        $this->setLast($last);
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
        $class = "";

        if (!$this->last) $class .= "pb-3 border-bottom border-3 mb-3";

        return [
            "class" => $class,
        ];
    }

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * get size class default
     *
     * @param bool|null $emphasis
     * @return string
     */
    protected function getSizeClassDefault(bool|null $emphasis): string
    {
        return $emphasis ? "h2" : "fs-2";
    }
}
