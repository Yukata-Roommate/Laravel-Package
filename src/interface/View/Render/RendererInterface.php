<?php

namespace YukataRm\Laravel\Interface\View\Render;

use Illuminate\View\View;

/**
 * View Renderer Interface
 *
 * @package YukataRm\Laravel\Interface\View\Render
 */
interface RendererInterface
{
    /*----------------------------------------*
     * Render
     *----------------------------------------*/

    /**
     * get whether to rendered
     *
     * @return bool
     */
    public function isRendered(): bool;

    /**
     * render view
     *
     * @return bool
     */
    public function render(): bool;

    /*----------------------------------------*
     * View
     *----------------------------------------*/

    /**
     * get view
     *
     * @return \Illuminate\View\View
     */
    public function view(): View;

    /**
     * set view
     *
     * @param \Illuminate\View\View|string $view
     * @param array $data
     * @return static
     */
    public function setView(View|string $view, array $data = []): static;

    /**
     * get view html
     *
     * @return string
     */
    public function html(): string;

    /**
     * get directory
     *
     * @return string
     */
    public function directory(): string;

    /**
     * set directory
     *
     * @param string $directory
     * @return static
     */
    public function setDirectory(string $directory): static;

    /**
     * get file name
     *
     * @return string
     */
    public function fileName(): string;

    /**
     * set file name
     *
     * @param string $fileName
     * @return static
     */
    public function setFileName(string $fileName): static;

    /**
     * get file extension
     *
     * @return string
     */
    public function fileExtension(): string;

    /**
     * set file extension
     *
     * @param string $fileExtension
     * @return static
     */
    public function setFileExtension(string $fileExtension): static;

    /**
     * get file mode
     *
     * @return int|null
     */
    public function fileMode(): int|null;

    /**
     * set file mode
     *
     * @param int $fileMode
     * @return static
     */
    public function setFileMode(int $fileMode): static;

    /**
     * get file owner
     *
     * @return string|null
     */
    public function fileOwner(): string|null;

    /**
     * set file owner
     *
     * @param string $fileOwner
     * @return static
     */
    public function setFileOwner(string $fileOwner): static;

    /**
     * get file group
     *
     * @return string|null
     */
    public function fileGroup(): string|null;

    /**
     * set file group
     *
     * @param string $fileGroup
     * @return static
     */
    public function setFileGroup(string $fileGroup): static;

    /**
     * get file path
     *
     * @return string
     */
    public function filePath(): string;
}