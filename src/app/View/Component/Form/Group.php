<?php

namespace YukataRm\Laravel\View\Component\Form;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Form Group Component
 *
 * @package YukataRm\Laravel\View\Component\Form
 */
class Group extends CustomComponent
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
            "class" => "form-group mb-3",
        ];
    }
}
