<?php

namespace YukataRm\Laravel\Service\Resource;

use YukataRm\Laravel\Service\ResourceService;

use Illuminate\View\View;

/**
 * Edit Service
 *
 * @package YukataRm\Laravel\Service\Resource
 */
abstract class EditService extends ResourceService
{
    /**
     * get view
     *
     * @param array $data
     * @return \Illuminate\View\View
     */
    protected function view(array $data = []): View
    {
        return view($this->viewPath(), $data);
    }

    /**
     * get view path
     *
     * @return string
     */
    protected function viewPath(): string
    {
        return $this->resourceView("edit");
    }
}
