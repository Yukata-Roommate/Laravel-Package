<?php

namespace YukataRm\Laravel\View\Component;

use YukataRm\Laravel\View\Component\CustomComponent;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

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
     * @param LengthAwarePaginator $data
     */
    public function __construct(LengthAwarePaginator $data)
    {
        $this->setData($data);
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
            "class" => "d-flex justify-items-center justify-content-between align-items-center",
        ];
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * links
     *
     * @var \Illuminate\Support\Collection
     */
    public Collection $links;

    /**
     * on first page
     *
     * @var bool
     */
    public bool $onFirstPage;

    /**
     * previous page url
     *
     * @var string|null
     */
    public string|null $previousPageUrl;

    /**
     * has more pages
     *
     * @var bool
     */
    public bool $hasMorePages;

    /**
     * next page url
     *
     * @var string|null
     */
    public string|null $nextPageUrl;

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
     * set data
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $data
     * @return void
     */
    protected function setData(LengthAwarePaginator $data): void
    {
        $this->links           = $data->linkCollection();
        $this->onFirstPage     = $data->onFirstPage();
        $this->previousPageUrl = $data->previousPageUrl();
        $this->hasMorePages    = $data->hasMorePages();
        $this->nextPageUrl     = $data->nextPageUrl();
        $this->firstItem       = $data->firstItem() ?? 0;
        $this->lastItem        = $data->lastItem() ?? 0;
        $this->total           = $data->total();
    }
}
