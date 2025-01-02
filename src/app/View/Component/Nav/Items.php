<?php

namespace YukataRm\Laravel\View\Component\Nav;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Nav Items Component
 *
 * @package YukataRm\Laravel\View\Component\Nav
 */
class Items extends CustomComponent
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
            "class" => "nav nav-tabs text-center",
            "role"  => "tablist",
        ];
    }
}
