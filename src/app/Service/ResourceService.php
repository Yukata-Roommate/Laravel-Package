<?php

namespace YukataRm\Laravel\Service;

use YukataRm\Laravel\Service\CustomService;

/**
 * Resource Service
 *
 * @package YukataRm\Laravel\Service
 */
abstract class ResourceService extends CustomService
{
    /*----------------------------------------*
     * Resource
     *----------------------------------------*/

    /**
     * name
     *
     * @var string
     */
    protected string $name;

    /**
     * get route path
     *
     * @param string $resource
     * @return string
     */
    protected function resourceRoute(string $resource): string
    {
        return "{$this->name}.{$resource}";
    }

    /**
     * get view path
     *
     * @param string $resource
     * @return string
     */
    protected function resourceView(string $resource): string
    {
        return "pages.{$this->name}.{$resource}";
    }
}
