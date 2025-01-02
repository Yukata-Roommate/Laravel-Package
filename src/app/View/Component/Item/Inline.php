<?php

namespace YukataRm\Laravel\View\Component\Item;

use YukataRm\Laravel\View\Component\CustomComponent;

use YukataRm\Laravel\Trait\View\Component\ItemProperty;

/**
 * Item Inline Component
 *
 * @package YukataRm\Laravel\View\Component\Item
 */
class Inline extends CustomComponent
{
    use ItemProperty;

    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param bool|null $last
     */
    public function __construct(bool|null $last = null)
    {
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
        $class = "d-inline-block border border-3 rounded-3 px-2 py-1 my-1";

        if (!$this->last) $class .= " me-2";

        return [
            "class" => $class,
        ];
    }
}
