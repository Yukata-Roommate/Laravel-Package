<?php

namespace YukataRm\Laravel\View\Component\Layout\Pages\Sidebar;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Layout Pages Sidebar Border Component
 *
 * @package YukataRm\Laravel\View\Component\Layout\Pages\Sidebar
 */
class Border extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $color
     */
    public function __construct(string $color = "secondary")
    {
        $this->setColor($color);
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
        return [
            "class" => "border-top border-{$this->color} mb-1",
        ];
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * color
     *
     * @var string
     */
    public string $color;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set color
     *
     * @param string $color
     * @return void
     */
    protected function setColor(string $color): void
    {
        $this->color = $color;
    }
}
