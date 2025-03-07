<?php

namespace YukataRm\Laravel\View\Component\Modal\Button;

use YukataRm\Laravel\View\Component\Button;

/**
 * Modal Button Close Component
 *
 * @package YukataRm\Laravel\View\Component\Modal\Button
 */
class Close extends Button
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string|null $color
     * @param bool|null $block
     * @param bool|null $small
     * @param bool|null $outline
     */
    public function __construct(
        string|null $color = null,
        bool|null $block = null,
        bool|null $small = null,
        bool|null $outline = null,
    ) {
        parent::__construct(
            $color ?? "secondary",
            "button",
            $block,
            $small,
            $outline,
        );
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
        $attributes = parent::mergeAttributes();

        $attributes["data-bs-dismiss"] = "modal";

        return $attributes;
    }
}
