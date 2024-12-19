<?php

namespace YukataRm\Laravel\View\Component\Layout;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Layout Pages Component
 *
 * @package YukataRm\Laravel\View\Component\Layout
 */
class Pages extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $pageTitle
     * @param bool|null $noIndex
     */
    public function __construct(string $pageTitle, bool|null $noIndex = null)
    {
        $this->setPageTitle($pageTitle);
        $this->setNoIndex($noIndex);
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
            "class" => "app-wrapper",
        ];
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * page title
     *
     * @var string
     */
    public string $pageTitle;

    /**
     * no index
     *
     * @var bool
     */
    public bool $noIndex;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set page title
     *
     * @param string $pageTitle
     * @return void
     */
    protected function setPageTitle(string $pageTitle): void
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * set no index
     *
     * @param bool|null $noIndex
     * @return void
     */
    protected function setNoIndex(bool|null $noIndex): void
    {
        $this->noIndex = $noIndex ?? true;
    }
}
