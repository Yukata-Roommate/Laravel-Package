<?php

namespace YukataRm\Laravel\Trait\View\Component;

/**
 * Item Property trait
 *
 * @package YukataRm\Laravel\Trait\View\Component
 */
trait ItemProperty
{
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * last
     *
     * @var bool
     */
    public bool $last;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set last
     *
     * @param bool|null $last
     * @return void
     */
    public function setLast(bool|null $last): void
    {
        $this->last = $last ?? false;
    }
}
