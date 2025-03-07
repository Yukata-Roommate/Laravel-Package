<?php

namespace YukataRm\Laravel\View\Component\Layout;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Layout Master Component
 *
 * @package YukataRm\Laravel\View\Component\Layout
 */
class Master extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string|null $title
     * @param bool|null $noIndex
     */
    public function __construct(string|null $title = null, bool|null $noIndex = null)
    {
        $this->setTitle($title);
        $this->setNoIndex($noIndex);
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
     * no index
     *
     * @var bool
     */
    public bool $noIndex;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set title
     *
     * @param string|null $title
     * @return void
     */
    protected function setTitle(string|null $title): void
    {
        $appName = config("app.name");

        $this->title = is_null($title) ? $appName : "{$title} | {$appName}";
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
