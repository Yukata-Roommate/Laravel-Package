<?php

namespace YukataRm\Laravel\View\Render;

use YukataRm\Laravel\View\Render\BaseRenderer;

/**
 * Renderer
 *
 * @package YukataRm\Laravel\View\Render
 */
class Renderer extends BaseRenderer
{
    /*----------------------------------------*
     * File
     *----------------------------------------*/

    /**
     * format directory
     *
     * @param string $directory
     * @return string
     */
    protected function formatDirectory(string $directory): string
    {
        return rtrim($directory, DIRECTORY_SEPARATOR);
    }
}
