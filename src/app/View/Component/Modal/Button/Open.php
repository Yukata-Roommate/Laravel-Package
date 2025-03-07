<?php

namespace YukataRm\Laravel\View\Component\Modal\Button;

use YukataRm\Laravel\View\Component\Button;

/**
 * Modal Button Open Component
 *
 * @package YukataRm\Laravel\View\Component\Modal\Button
 */
class Open extends Button
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $modalId
     * @param string|null $color
     * @param bool|null $block
     * @param bool|null $small
     * @param bool|null $outline
     */
    public function __construct(
        string $modalId,
        string|null $color = null,
        bool|null $block = null,
        bool|null $small = null,
        bool|null $outline = null,
    ) {
        $this->setModalId($modalId);

        parent::__construct(
            $color ?? "info",
            "button",
            $block,
            $small,
            $outline,
        );
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
        $attributes = parent::mergeAttributes();

        $attributes["data-bs-toggle"] = "modal";

        $attributes["data-bs-target"] = "#{$this->modalId}";

        return $attributes;
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * modal id
     *
     * @var string
     */
    public string $modalId;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set modal id
     *
     * @param string $modalId
     * @return void
     */
    protected function setModalId(string $modalId): void
    {
        $this->modalId = $modalId;
    }
}
