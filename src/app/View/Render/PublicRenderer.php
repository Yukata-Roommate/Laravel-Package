<?php

namespace YukataRm\Laravel\View\Render;

use YukataRm\Laravel\View\Render\BaseRenderer;

/**
 * Public Renderer
 *
 * @package YukataRm\Laravel\View\Render
 */
class PublicRenderer extends BaseRenderer
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
        return public_path($directory);
    }
}
