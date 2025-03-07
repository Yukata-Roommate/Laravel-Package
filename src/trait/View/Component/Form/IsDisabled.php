<?php

namespace YukataRm\Laravel\Trait\View\Component\Form;

/**
 * Form Is Disabled trait
 *
 * @package YukataRm\Laravel\Trait\View\Component\Form
 */
trait IsDisabled
{
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * is disabled
     *
     * @var bool
     */
    public bool $isDisabled;

    /*----------------------------------------*
     * Methods
     *----------------------------------------*/

    /**
     * set is disabled
     *
     * @param bool|null $isDisabled
     * @return void
     */
    protected function setIsDisabled(bool|null $isDisabled): void
    {
        $this->isDisabled = $isDisabled ?? false;
    }
}
