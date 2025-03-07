<?php

namespace YukataRm\Laravel\Trait\View\Component\Form;

/**
 * Form Is Hidden trait
 *
 * @package YukataRm\Laravel\Trait\View\Component\Form
 */
trait IsHidden
{
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * is hidden
     *
     * @var bool
     */
    public bool $isHidden;

    /*----------------------------------------*
     * Methods
     *----------------------------------------*/

    /**
     * set is hidden
     *
     * @param bool|null $isHidden
     * @return void
     */
    public function setIsHidden(bool|null $isHidden): void
    {
        $this->isHidden = $isHidden ?? false;
    }
}
