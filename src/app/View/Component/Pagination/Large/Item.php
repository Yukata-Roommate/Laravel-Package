<?php

namespace YukataRm\Laravel\View\Component\Pagination\Large;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Pagination Large Item Component
 *
 * @package YukataRm\Laravel\View\Component\Pagination\Large
 */
class Item extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param array<string, mixed> $link
     * @param int $count
     */
    public function __construct(array $link)
    {
        $this->setLink($link);
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
     * set link
     *
     * @param array<string, mixed> $link
     * @return void
     */
    protected function setLink(array $link): void
    {
        $this->url   = isset($link["url"]) && !empty($link["url"]) ? $link["url"] : "#";
        $this->label = isset($link["label"]) ? $link["label"] : "";

        $this->itemClass = isset($link["active"]) && $link["active"] ? "page-item w-100 active" : "page-item w-100";
    }
}
