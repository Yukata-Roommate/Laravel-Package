<?php

namespace YukataRm\Laravel\View\Component\Nav;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Nav Contents Component
 *
 * @package YukataRm\Laravel\View\Component\Nav
 */
class Contents extends CustomComponent
{
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
            "class" => "tab-content",
        ];
    }
}
