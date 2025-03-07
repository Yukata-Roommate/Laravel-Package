<?php

namespace YukataRm\Laravel\View\Component;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Breadcrumb Component
 *
 * @package YukataRm\Laravel\View\Component
 */
class Breadcrumb extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $title
     * @param string $url
     */
    public function __construct(string $title, string $url)
    {
        $this->setTitle($title);
        $this->setUrl($url);
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
            "class" => "breadcrumb-item",
        ];
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * title
     *
     * @var string
     */
    public string $title;

    /**
     * url
     *
     * @var string
     */
    public string $url;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set title
     *
     * @param string $title
     * @return void
     */
    protected function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * set url
     *
     * @param string|null $url
     * @return void
     */
    protected function setUrl(string|null $url): void
    {
        $this->url = $url;
    }
}
