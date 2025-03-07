<?php

namespace YukataRm\Laravel\View\Component\Form\Input;

use YukataRm\Laravel\View\Component\CustomComponent;

use YukataRm\Laravel\Trait\View\Component\Form\IsRequired;
use YukataRm\Laravel\Trait\View\Component\Form\IsDisabled;
use YukataRm\Laravel\Trait\View\Component\Form\IsReadonly;

/**
 * Form Input Raw Component
 *
 * @package YukataRm\Laravel\View\Component\Form\Input
 */
class Raw extends CustomComponent
{
    use IsRequired;
    use IsDisabled;
    use IsReadonly;

    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string|null $type
     * @param bool|null $isRequired
     * @param bool|null $isDisabled
     * @param bool|null $isReadonly
     */
    public function __construct(
        string|null $type = null,
        bool|null $isRequired = null,
        bool|null $isDisabled = null,
        bool|null $isReadonly = null,
    ) {
        $this->setType($type);
        $this->setIsRequired($isRequired);
        $this->setIsDisabled($isDisabled);
        $this->setIsReadonly($isReadonly);
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
            "type"  => $this->type,
            "class" => "form-control",
        ];
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
     * Methods
     *----------------------------------------*/

    /**
     * set type
     *
     * @param string|null $type
     * @return void
     */
    protected function setType(string|null $type): void
    {
        $this->type = $type ?? "text";
    }
}
