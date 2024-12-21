<?php

namespace YukataRm\Laravel\Trait\View\Component;

/**
 * Nav trait
 *
 * @package YukataRm\Laravel\Trait\View\Component
 */
trait Nav
{
    /**
     * get nav item id
     *
     * @param string $key
     * @return string
     */
    protected function navItemId(string $key): string
    {
        return "nav-item-{$key}";
    }

    /**
     * get nav content id
     *
     * @param string $key
     * @return string
     */
    protected function navContentId(string $key): string
    {
        return "nav-content-{$key}";
    }
}
