<?php

namespace YukataRm\Laravel\Facade\Manager;

use YukataRm\Laravel\Interface\View\Render\RendererInterface;
use YukataRm\Laravel\View\Render\Renderer;
use YukataRm\Laravel\View\Render\StorageRenderer;
use YukataRm\Laravel\View\Render\PublicRenderer;

/**
 * View Renderer Facade Manager
 *
 * @package YukataRm\Laravel\Facade\Manager
 */
class RendererManager
{
    /**
     * make Renderer instance
     *
     * @return \YukataRm\Laravel\Interface\View\Render\RendererInterface
     */
    public function make(): RendererInterface
    {
        return new Renderer();
    }

    /**
     * make StorageRenderer instance
     *
     * @return \YukataRm\Laravel\Interface\View\Render\RendererInterface
     */
    public function storage(): RendererInterface
    {
        return new StorageRenderer();
    }

    /**
     * make PublicRenderer instance
     *
     * @return \YukataRm\Laravel\Interface\View\Render\RendererInterface
     */
    public function public(): RendererInterface
    {
        return new PublicRenderer();
    }
}
