<?php

namespace YukataRm\Laravel\View\Component\Form;

use YukataRm\Laravel\View\Component\CustomComponent;

use YukataRm\Laravel\Trait\View\Component\Form\Check;

/**
 * Form Checkbox Component
 *
 * @package YukataRm\Laravel\View\Component\Form
 */
class Checkbox extends CustomComponent
{
    use Check;

    /*----------------------------------------*
     * Required
     *----------------------------------------*/

    /**
     * get component key
     *
     * @return string
     */
    #[\Override]
    protected function componentKey(): string
    {
        $key = parent::componentKey();

        return str_replace(".checkbox", ".check", $key);
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
        return array_merge(
            $this->defaultMergeAttributes(),
            [
                "type"  => "checkbox",
            ]
        );
    }
}
