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
     * @param string|null $size
     * @param bool|null $isStrict
     */
    public function __construct(string $modalId, string|null $title = null, string|null $size = null, bool|null $isStrict = null)
    {
        $this->setId($modalId);
        $this->setTitle($title);
        $this->setDialogClass($size);
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
     * dialog class
     *
     * @var string
     */
    public string $dialogClass;

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
     * set dialog class
     *
     * @param string|null $size
     * @return void
     */
    protected function setDialogClass(string|null $size): void
    {
        $sizeClass = match ($size) {
            "sm" => "modal-sm",
            "lg" => "modal-lg",
            "xl" => "modal-xl",
            default => "",
        };

        $this->dialogClass = "modal-dialog modal-dialog-centered {$sizeClass}";
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
