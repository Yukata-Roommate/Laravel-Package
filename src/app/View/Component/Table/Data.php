<?php

namespace YukataRm\Laravel\View\Component\Table;

use YukataRm\Laravel\View\Component\CustomComponent;

use YukataRm\Laravel\Trait\View\Component\TableActive;

/**
 * Table Data Component
 *
 * @package YukataRm\Laravel\View\Component\Table
 */
class Data extends CustomComponent
{
    use TableActive;

    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param bool|null $active
     */
    public function __construct(bool|null $active = null)
    {
        $this->setActive($active);
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
        $attributes = $this->getDefaultMergeAttributes();

        return $attributes;
    }
}
