<?php

namespace YukataRm\Laravel\View\Component\Layout;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Layout Auth Component
 *
 * @package YukataRm\Laravel\View\Component\Layout
 */
class Auth extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $cardTitle
     * @param string $action
     * @param bool|null $noIndex
     */
    public function __construct(string $cardTitle, string $action, bool|null $noIndex = null)
    {
        $this->setCardTitle($cardTitle);
        $this->setAction($action);
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
            "class" => "login-box",
            "style" => "width: 360px;",
        ];
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * card title
     *
     * @var string
     */
    public string $cardTitle;

    /**
     * action
     *
     * @var string
     */
    public string $action;

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
     * set card title
     *
     * @param string $cardTitle
     * @return void
     */
    protected function setCardTitle(string $cardTitle): void
    {
        $this->cardTitle = $cardTitle;
    }

    /**
     * set action
     *
     * @param string $action
     * @return void
     */
    protected function setAction(string $action): void
    {
        $this->action = $action;
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
