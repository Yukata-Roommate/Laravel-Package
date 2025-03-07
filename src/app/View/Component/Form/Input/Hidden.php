<?php

namespace YukataRm\Laravel\View\Component\Form\Input;

use YukataRm\Laravel\View\Component\CustomComponent;

use YukataRm\Laravel\Trait\View\Component\Form\IsHidden;

/**
 * Form Input Hidden Component
 *
 * @package YukataRm\Laravel\View\Component\Form\Input
 */
class Hidden extends CustomComponent
{
    use IsHidden;

    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param bool|null $isHidden
     */
    public function __construct(bool|null $isHidden = null)
    {
        $this->setIsHidden($isHidden ?? true);
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
        if (!$this->isHidden) return parent::mergeAttributes();

        return [
            "type" => "hidden",
        ];
    }
}
