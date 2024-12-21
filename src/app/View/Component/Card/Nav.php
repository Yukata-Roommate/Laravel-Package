<?php

namespace YukataRm\Laravel\View\Component\Card;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Card Nav Component
 *
 * @package YukataRm\Laravel\View\Component\Card
 */
class Nav extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     */
    public function __construct() {}

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
            "class" => "card",
        ];
    }
}
