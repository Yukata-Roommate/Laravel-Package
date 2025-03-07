<?php

namespace YukataRm\Laravel\View\Component;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Table Component
 *
 * @package YukataRm\Laravel\View\Component
 */
class Table extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string|null $color
     * @param bool|null $hover
     * @param bool|null $striped
     * @param bool|null $stripedColumns
     */
    public function __construct(
        string|null $color = null,
        bool|null $hover = null,
        bool|null $striped = null,
        bool|null $stripedColumns = null,
    ) {
        $this->setColor($color);
        $this->setHover($hover);
        $this->setStriped($striped);
        $this->setStripedColumns($stripedColumns);
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
        $attributes = [
            "class" => "table",
        ];

        if ($this->color) $attributes["class"] .= " table-{$this->color}";

        if ($this->hover) $attributes["class"] .= " table-hover";

        if ($this->striped) $attributes["class"] .= " table-striped";

        if ($this->stripedColumns) $attributes["class"] .= " table-striped-columns";

        return $attributes;
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * color
     *
     * @var string|null
     */
    public string|null $color;

    /**
     * hover
     *
     * @var bool
     */
    public bool $hover;

    /**
     * striped
     *
     * @var bool
     */
    public bool $striped;

    /**
     * stripedColumns
     *
     * @var bool
     */
    public bool $stripedColumns;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set color
     *
     * @param string|null $color
     * @return void
     */
    public function setColor(string|null $color): void
    {
        $this->color = $color;
    }

    /**
     * set hover
     *
     * @param bool|null $hover
     * @return void
     */
    public function setHover(bool|null $hover): void
    {
        $this->hover = $hover ?? false;
    }

    /**
     * set striped
     *
     * @param bool|null $striped
     * @return void
     */
    public function setStriped(bool|null $striped): void
    {
        $this->striped = $striped ?? false;
    }

    /**
     * set stripedColumns
     *
     * @param bool|null $stripedColumns
     * @return void
     */
    public function setStripedColumns(bool|null $stripedColumns): void
    {
        $this->stripedColumns = $stripedColumns ?? false;
    }
}
