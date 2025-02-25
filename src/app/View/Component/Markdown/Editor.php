<?php

namespace YukataRm\Laravel\View\Component\Markdown;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Markdown Editor Component
 *
 * @package YukataRm\Laravel\View\Component\Markdown
 */
class Editor extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $id
     * @param string $label
     * @param string|int|null $value
     * @param int|null $rows
     * @param bool|null $isRequired
     */
    public function __construct(
        string $id,
        string $label,
        string|int|null $value = null,
        int|null $rows = null,
        bool|null $isRequired = null,
    ) {
        $this->setId($id);
        $this->setLabel($label);
        $this->setValue($value);
        $this->setRows($rows);
        $this->setIsRequired($isRequired);
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
            "rows"  => $this->rows,
            "class" => "form-control markdown-editor__textarea",
        ];
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * id
     *
     * @var string
     */
    public string $id;

    /**
     * label
     *
     * @var string
     */
    public string $label;

    /**
     * is required
     *
     * @var bool
     */
    public bool $isRequired;

    /**
     * value
     *
     * @var string|int|null
     */
    public string|int|null $value;

    /**
     * rows
     *
     * @var int
     */
    public int $rows;

    /*----------------------------------------*
     * Methods
     *----------------------------------------*/

    /**
     * set id
     *
     * @param string $id
     * @return void
     */
    protected function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * set label
     *
     * @param string $label
     * @return void
     */
    protected function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * set is required
     *
     * @param bool|null $isRequired
     * @return void
     */
    protected function setIsRequired(bool|null $isRequired): void
    {
        $this->isRequired = $isRequired ?? false;
    }

    /**
     * set value
     *
     * @param string|int|null $value
     * @return void
     */
    protected function setValue(string|int|null $value): void
    {
        $this->value = $value;
    }

    /**
     * set rows
     *
     * @param int|null $rows
     * @return void
     */
    protected function setRows(int|null $rows): void
    {
        $this->rows = $rows ?? 20;
    }
}
