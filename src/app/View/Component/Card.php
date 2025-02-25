<?php

namespace YukataRm\Laravel\View\Component;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Card Component
 *
 * @package YukataRm\Laravel\View\Component
 */
class Card extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string|null $title
     */
    public function __construct(string|null $title = null)
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
            "class" => "card",
        ];
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * title
     *
     * @var string|null
     */
    public string|null $title;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set title
     *
     * @param string|null $title
     * @return void
     */
    public function setTitle(string|null $title): void
    {
        $this->title = $title;
    }
}
