<?php

namespace YukataRm\Laravel\View\Component;

use YukataRm\Laravel\View\Component\CustomComponent;

use YukataRm\Laravel\Trait\View\Component\ButtonStyle;

/**
 * Button Component
 *
 * @package YukataRm\Laravel\View\Component
 */
class Button extends CustomComponent
{
    use ButtonStyle;

    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $color
     * @param string|null $type
     * @param bool|null $block
     * @param bool|null $small
     * @param bool|null $outline
     */
    public function __construct(
        string $color,
        string|null $type = null,
        bool|null $block = null,
        bool|null $small = null,
        bool|null $outline = null,
    ) {
        $this->setType($type);

        $this->setColor($color);
        $this->setBlock($block);
        $this->setSmall($small);
        $this->setOutline($outline);
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

        $attributes["type"] = $this->type;

        return $attributes;
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * type
     *
     * @var string
     */
    public string $type;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set type
     *
     * @param string|null $type
     * @return void
     */
    protected function setType(string|null $type): void
    {
        $this->type = $type ?? "button";
    }
}
