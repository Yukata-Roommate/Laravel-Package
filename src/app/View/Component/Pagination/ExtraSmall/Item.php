<?php

namespace YukataRm\Laravel\View\Component\Pagination\ExtraSmall;

use YukataRm\Laravel\View\Component\CustomComponent;

use YukataRm\Proxy\Text;

/**
 * Pagination Extra Small Item Component
 *
 * @package YukataRm\Laravel\View\Component\Pagination\ExtraSmall
 */
class Item extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string|null $url
     * @param string $label
     * @param bool $disabled
     */
    public function __construct(string|null $url, string $label, bool $disabled)
    {
        $this->setUrl($url);
        $this->setLabel($label);
        $this->setDisabled($disabled);
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * url
     *
     * @var string
     */
    public string $url;

    /**
     * label
     *
     * @var string
     */
    public string $label;

    /**
     * item class
     *
     * @var string
     */
    public string $itemClass;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set url
     *
     * @param string|null $url
     * @return void
     */
    protected function setUrl(string|null $url): void
    {
        $this->url = $url ?? "#";
    }

    /**
     * set label
     *
     * @param string $label
     * @return void
     */
    protected function setLabel(string $label): void
    {
        $this->label = Text::toPascal($label);
    }

    /**
     * set disabled
     *
     * @param bool $disabled
     * @return void
     */
    protected function setDisabled(bool $disabled): void
    {
        $this->itemClass = $disabled ? "page-item w-100 disabled" : "page-item w-100";
    }
}
