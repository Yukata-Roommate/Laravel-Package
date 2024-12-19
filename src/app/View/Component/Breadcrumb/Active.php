<?php

namespace YukataRm\Laravel\View\Component\Breadcrumb;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Breadcrumb Active Component
 *
 * @package YukataRm\Laravel\View\Component\Breadcrumb
 */
class Active extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->setTitle($title);
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
            "class"        => "breadcrumb-item active",
            "aria-current" => "page",
        ];
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * title
     *
     * @var string
     */
    public string $title;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set title
     *
     * @param string $title
     * @return void
     */
    protected function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
