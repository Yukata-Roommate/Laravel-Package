<?php

namespace YukataRm\Laravel\Trait\View\Component;

/**
 * Button Style trait
 *
 * @package YukataRm\Laravel\Trait\View\Component
 */
trait ButtonStyle
{
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * color
     *
     * @var string
     */
    public string $color;

    /**
     * block
     *
     * @var bool|null
     */
    public bool|null $block;

    /**
     * small
     *
     * @var bool|null
     */
    public bool|null $small;

    /**
     * outline
     *
     * @var bool|null
     */
    public bool|null $outline;

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
        $attributes = [
            "class" => "btn",
        ];

        $attributes["class"] .= $this->outline ? " btn-outline-{$this->color}" : " btn-{$this->color}";

        if ($this->block) $attributes["class"] .= " d-block";

        if ($this->small) $attributes["class"] .= " btn-sm";

        return $attributes;
    }

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

    /**
     * set block
     *
     * @param bool|null $block
     * @return void
     */
    protected function setBlock(bool|null $block): void
    {
        $this->block = $block;
    }

    /**
     * set small
     *
     * @param bool|null $small
     * @return void
     */
    protected function setSmall(bool|null $small): void
    {
        $this->small = $small;
    }

    /**
     * set outline
     *
     * @param bool|null $outline
     * @return void
     */
    protected function setOutline(bool|null $outline): void
    {
        $this->outline = $outline;
    }
}
