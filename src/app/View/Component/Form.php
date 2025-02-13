<?php

namespace YukataRm\Laravel\View\Component;

use YukataRm\Laravel\View\Component\CustomComponent;

use YukataRm\Laravel\Trait\View\Component\Form\IsHidden;

/**
 * Form Component
 *
 * @package YukataRm\Laravel\View\Component
 */
class Form extends CustomComponent
{
    use IsHidden;

    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $method
     * @param bool|null $csrf
     * @param bool|null $hasFile
     * @param bool|null $isHidden
     * @param bool|null $blank
     */
    public function __construct(
        string $method,
        bool|null $csrf = null,
        bool|null $hasFile = null,
        bool|null $isHidden = null,
        bool|null $blank = null,
    ) {
        $this->setMethod($method);
        $this->setCsrf($csrf);
        $this->setHasFile($hasFile);
        $this->setIsHidden($isHidden);
        $this->setBlank($blank);
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
        $attributes = [];

        $attributes["method"] = match ($this->isMethodCompatible) {
            true  => $this->method,
            false => "post",
        };

        if ($this->hasFile) $attributes["enctype"] = "multipart/form-data";

        if ($this->isHidden) $attributes["class"] = "d-none";

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
     * method
     *
     * @var string
     */
    public string $method;

    /**
     * is method compatible
     *
     * @var bool
     */
    public bool $isMethodCompatible;

    /**
     * csrf
     *
     * @var bool
     */
    public bool $csrf;

    /**
     * has file
     *
     * @var bool
     */
    public bool $hasFile;

    /**
     * target blank
     *
     * @var bool
     */
    public bool $blank;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set method
     *
     * @param string $method
     * @return void
     */
    protected function setMethod(string $method): void
    {
        $this->method             = $method;
        $this->isMethodCompatible = match ($method) {
            "get"   => true,
            "post"  => true,
            default => false,
        };
    }

    /**
     * set csrf
     *
     * @param bool|null $csrf
     * @return void
     */
    protected function setCsrf(bool|null $csrf): void
    {
        $this->csrf = $csrf ?? true;
    }

    /**
     * set has file
     *
     * @param bool|null $hasFile
     * @return void
     */
    protected function setHasFile(bool|null $hasFile): void
    {
        $this->hasFile = $hasFile ?? false;
    }

    /**
     * set target blank
     *
     * @param bool|null $blank
     * @return void
     */
    protected function setBlank(bool|null $blank): void
    {
        $this->blank = $blank ?? false;
    }
}
