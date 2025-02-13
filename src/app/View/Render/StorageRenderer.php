<?php

namespace YukataRm\Laravel\View\Render;

use YukataRm\Laravel\View\Render\BaseRenderer;

/**
 * Storage Renderer
 *
 * @package YukataRm\Laravel\View\Render
 */
class StorageRenderer extends BaseRenderer
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
        return storage_path($directory);
    }
}
