<?php

namespace YukataRm\Laravel\View\Component\Form\Select;

use YukataRm\Laravel\View\Component\CustomComponent;

use YukataRm\Laravel\Trait\View\Component\Form\Label;

/**
 * Form Select Option Component
 *
 * @package YukataRm\Laravel\View\Component\Form\Select
 */
class Option extends CustomComponent
{
    use Label;

    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $label
     * @param bool|null $isSelected
     */
    public function __construct(
        string $label,
        bool|null $isSelected = null,
    ) {
        $this->setLabel($label);
        $this->setIsSelected($isSelected);
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * is selected
     *
     * @var bool
     */
    public bool $isSelected;

    /*----------------------------------------*
     * Methods
     *----------------------------------------*/

    /**
     * set is selected
     *
     * @param bool|null $isSelected
     * @return void
     */
    protected function setIsSelected(bool|null $isSelected): void
    {
        $this->isSelected = $isSelected ?? false;
    }
}
