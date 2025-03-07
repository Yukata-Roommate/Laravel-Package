<?php

namespace YukataRm\Laravel\Trait\View\Component;

/**
 * Table Active trait
 *
 * @package YukataRm\Laravel\Trait\View\Component
 */
trait TableActive
{
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * active
     *
     * @var bool
     */
    public bool $active;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * get default merge attributes
     *
     * @return array<string, mixed>
     */
    protected function getDefaultMergeAttributes(): array
    {
        return $this->active ? ["class" => "table-active"] : [];
    }

    /**
     * set active
     *
     * @param bool|null $active
     * @return void
     */
    protected function setActive(bool|null $active): void
    {
        $this->active = $active ?? false;
    }
}
