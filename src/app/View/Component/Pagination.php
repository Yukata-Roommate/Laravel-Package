<?php

namespace YukataRm\Laravel\View\Component;

use YukataRm\Laravel\View\Component\CustomComponent;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Pagination Component
 *
 * @package YukataRm\Laravel\View\Component
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
     */
    public function __construct(LengthAwarePaginator $paginator)
    {
        $this->setPaginator($paginator);
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
            "class" => "w-100",
        ];
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
}
