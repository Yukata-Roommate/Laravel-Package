<?php

namespace YukataRm\Laravel\View\Component\Markdown\Editor;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Markdown Editor Toolbar Component
 *
 * @package YukataRm\Laravel\View\Component\Markdown\Editor
 */
class Toolbar extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $id
     * @param string $label
     */
    public function __construct(
        string $id,
        string $label,
    ) {
        $this->setId($id);
        $this->setLabel($label);
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

    /*----------------------------------------*
     * Method
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
}
