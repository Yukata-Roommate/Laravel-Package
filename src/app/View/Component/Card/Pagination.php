<?php

namespace YukataRm\Laravel\View\Component\Card;

use YukataRm\Laravel\View\Component\CustomComponent;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Card Pagination Component
 *
 * @package YukataRm\Laravel\View\Component\Card
 */
class Pagination extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $paginator
     * @param string|null $title
     */
    public function __construct(LengthAwarePaginator $paginator, string|null $title = null)
    {
        $this->setPaginator($paginator);
        $this->setTitle($title);
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * paginator
     *
     * @var \Illuminate\Pagination\LengthAwarePaginator
     */
    public LengthAwarePaginator $paginator;

    /**
     * title
     *
     * @var string|null
     */
    public string|null $title;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set paginator
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $paginator
     * @return void
     */
    protected function setPaginator(LengthAwarePaginator $paginator): void
    {
        $this->paginator = $paginator;
    }

    /**
     * set title
     *
     * @param string|null $title
     * @return void
     */
    public function setTitle(string|null $title): void
    {
        $this->title = $title;
    }
}
