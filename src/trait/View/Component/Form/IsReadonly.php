<?php

namespace YukataRm\Laravel\Trait\View\Component\Form;

/**
 * Form Is Readonly trait
 *
 * @package YukataRm\Laravel\Trait\View\Component\Form
 */
trait IsReadonly
{
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * is readonly
     *
     * @var bool
     */
    public bool $isReadonly;

    /*----------------------------------------*
     * Methods
     *----------------------------------------*/

    /**
     * set is readonly
     *
     * @param bool|null $isReadonly
     * @return void
     */
    protected function setIsReadonly(bool|null $isReadonly): void
    {
        $this->isReadonly = $isReadonly ?? false;
    }
}
