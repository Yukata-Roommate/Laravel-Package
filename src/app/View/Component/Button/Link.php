<?php

namespace YukataRm\Laravel\View\Component\Button;

use YukataRm\Laravel\View\Component\CustomComponent;

use YukataRm\Laravel\Trait\View\Component\ButtonStyle;

/**
 * Button Link Component
 *
 * @package YukataRm\Laravel\View\Component\Button
 */
class Link extends CustomComponent
{
    use ButtonStyle;

    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $href
     * @param string $color
     * @param bool|null $blank
     * @param bool|null $block
     * @param bool|null $small
     * @param bool|null $outline
     */
    public function __construct(
        string $href,
        string $color,
        bool|null $blank = null,
        bool|null $block = null,
        bool|null $small = null,
        bool|null $outline = null,
    ) {
        $this->setHref($href);
        $this->setBlank($blank);

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

        $attributes["href"] = $this->href;

        if ($this->blank) {
            $attributes["target"] = "_blank";
            $attributes["rel"]    = "noopener noreferrer";
        }

        return $attributes;
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * href
     *
     * @var string
     */
    public string $href;

    /**
     * blank
     *
     * @var bool
     */
    public bool $blank;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set href
     *
     * @param string $href
     * @return void
     */
    protected function setHref(string $href): void
    {
        $this->href = $href;
    }

    /**
     * set blank
     *
     * @param bool|null $blank
     * @return void
     */
    protected function setBlank(bool|null $blank): void
    {
        $this->blank = $blank ?? false;
    }
}
