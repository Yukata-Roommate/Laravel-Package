<?php

namespace YukataRm\Laravel\Trait\View\Component\Form;

/**
 * Form Id trait
 *
 * @package YukataRm\Laravel\Trait\View\Component\Form
 */
trait Id
{
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * id
     *
     * @var string
     */
    public string $id;

    /*----------------------------------------*
     * Methods
     *----------------------------------------*/

    /**
     * set id
     *
     * @param string $id
     * @return void
     */
    protected function setId(string $id): void
    {
        $this->id = $id;
    }
}
