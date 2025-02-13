<?php

namespace YukataRm\Laravel\View\Component\Layout\Pages;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Layout Pages Header Component
 *
 * @package YukataRm\Laravel\View\Component\Layout\Pages
 */
class Header extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     */
    public function __construct()
    {
        $this->setUserName();
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * user name
     *
     * @var string
     */
    public string $userName;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set user name
     *
     * @return void
     */
    protected function setUserName(): void
    {
        $this->userName = $this->isLoggedIn() ? $this->user()->name : "Guest";
    }
}
