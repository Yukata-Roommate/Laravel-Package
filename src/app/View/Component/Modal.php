<?php

namespace YukataRm\Laravel\View\Component;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Modal Component
 *
 * @package YukataRm\Laravel\View\Component
 */
class Modal extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $modalId
     * @param string|null $title
     * @param bool|null $isStrict
     */
    public function __construct(string $modalId, string|null $title = null, bool|null $isStrict = null)
    {
        $this->setId($modalId);
        $this->setTitle($title);
        $this->setIsStrict($isStrict);
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
            "id"              => $this->id,
            "aria-labelledby" => $this->ariaLabelledBy,
            "class"           => "modal fade",
            "tabindex"        => "-1",
            "aria-hidden"     => "true",
        ];

        if ($this->isStrict) {
            $attributes["data-bs-backdrop"] = "static";
            $attributes["data-bs-keyboard"] = "false";
        }

        return $attributes;
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
     * aria labelled by
     *
     * @var string
     */
    public string $ariaLabelledBy;

    /**
     * title
     *
     * @var string|null
     */
    public string|null $title;

    /**
     * is strict
     *
     * @var bool
     */
    public bool $isStrict;

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
        $this->id             = $id;
        $this->ariaLabelledBy = "{$id}Label";
    }

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

    /**
     * set is strict
     *
     * @param bool|null $isStrict
     * @return void
     */
    protected function setIsStrict(bool|null $isStrict): void
    {
        $this->isStrict = $isStrict ?? false;
    }
}
