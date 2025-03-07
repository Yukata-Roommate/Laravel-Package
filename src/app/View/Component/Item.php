<?php

namespace YukataRm\Laravel\View\Component;

use YukataRm\Laravel\View\Component\CustomComponent;

use YukataRm\Laravel\Trait\View\Component\ItemProperty;
use YukataRm\Laravel\Trait\View\Component\ItemTitle;

/**
 * Item Component
 *
 * @package YukataRm\Laravel\View\Component
 */
class Item extends CustomComponent
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
        $class = "border border-3 rounded-3 p-3";

        if (!$this->last) $class .= " mb-3";

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
        return $emphasis ? "h4" : "fs-4";
    }
}
