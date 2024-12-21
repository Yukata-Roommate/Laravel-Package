<?php

namespace YukataRm\Laravel\View\Component;

use YukataRm\Laravel\View\Component\BaseComponent;

/**
 * Custom Component
 *
 * @package YukataRm\Laravel\View\Component
 */
abstract class CustomComponent extends BaseComponent
{
    /*----------------------------------------*
     * Required
     *----------------------------------------*/

    /**
     * get component
     *
     * @return string
     */
    protected function component(): string
    {
        return "yukata-rm::components." . $this->componentKey();
    }

    /**
     * get component key
     *
     * @return string
     */
    protected function componentKey(): string
    {
        $class = str_replace("YukataRm\\Laravel\\View\\Component\\", "", static::class);

        $component = str_replace("\\", ".", ltrim($class, "\\"));

        $kebab = strtolower(preg_replace("/(?<!^)[A-Z]/", "-$0", $component));

        return str_replace(".-", ".", $kebab);
    }
}
