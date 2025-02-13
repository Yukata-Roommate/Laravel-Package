<?php

namespace YukataRm\Laravel\View\Component\Pagination;

use YukataRm\Laravel\View\Component\CustomComponent;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Pagination Result Component
 *
 * @package YukataRm\Laravel\View\Component\Pagination
 */
class Result extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $paginator
     */
    public function __construct(LengthAwarePaginator $paginator)
    {
        $this->setPaginator($paginator);
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * first item
     *
     * @var int
     */
    public int $firstItem;

    /**
     * last item
     *
     * @var int
     */
    public int $lastItem;

    /**
     * total
     *
     * @var int
     */
    public int $total;

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
        $this->firstItem = $paginator->firstItem() ?? 0;
        $this->lastItem  = $paginator->lastItem() ?? 0;
        $this->total     = $paginator->total();
    }
}
