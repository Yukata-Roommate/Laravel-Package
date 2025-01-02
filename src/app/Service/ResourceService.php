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
    /**
     * execute service
     *
     * @return mixed
     */
    abstract public function execute(): mixed;

    /**
     * call static
     *
     * @param string $name
     * @param array $args
     * @return mixed
     */
    public static function __callStatic(string $name, array $args): mixed
    {
        $service = new static(...$args);

        return $service->execute();
    }

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
