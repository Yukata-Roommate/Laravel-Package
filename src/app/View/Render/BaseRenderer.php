<?php

namespace YukataRm\Laravel\View\Render;

use YukataRm\Laravel\Interface\View\Render\RendererInterface;

use YukataRm\Proxy\File\Writer;

use Illuminate\View\View;

/**
 * Base Renderer
 *
 * @package YukataRm\Laravel\View\Render
 */
abstract class BaseRenderer implements RendererInterface
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param \Illuminate\View\View|string|null $view
     * @param array $data
     */
    public function __construct(View|string|null $view = null, array $data = [])
    {
        if (is_null($view)) return;

        $this->setView($view, $data);
    }

    /*----------------------------------------*
     * Render
     *----------------------------------------*/

    /**
     * whether to rendered
     *
     * @var bool
     */
    protected bool $isRendered = false;

    /**
     * get whether to rendered
     *
     * @return bool
     */
    public function isRendered(): bool
    {
        return $this->isRendered;
    }

    /**
     * render view
     *
     * @return bool
     */
    public function render(): bool
    {
        return $this->isRendered = Writer::write(
            $this->filePath(),
            $this->html(),
            false,
            false,
            $this->fileMode(),
            $this->fileOwner(),
            $this->fileGroup()
        );
    }

    /*----------------------------------------*
     * View
     *----------------------------------------*/

    /**
     * rendered view
     *
     * @var \Illuminate\View\View
     */
    protected View $view;

    /**
     * get view
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        return $this->view;
    }

    /**
     * set view
     *
     * @param \Illuminate\View\View|string $view
     * @param array $data
     * @return static
     */
    public function setView(View|string $view, array $data = []): static
    {
        $this->view = is_string($view) ? view($view, $data) : $view;

        return $this;
    }

    /**
     * get view html
     *
     * @return string
     */
    public function html(): string
    {
        return $this->view()->render();
    }

    /*----------------------------------------*
     * File
     *----------------------------------------*/

    /**
     * directory
     *
     * @var string
     */
    protected string $directory;

    /**
     * file name
     *
     * @var string
     */
    protected string $fileName;

    /**
     * file extension
     *
     * @var string
     */
    protected string $fileExtension = "html";

    /**
     * file mode
     *
     * @var int|null
     */
    protected int|null $fileMode = null;

    /**
     * file owner
     *
     * @var string|null
     */
    protected string|null $fileOwner = null;

    /**
     * file group
     *
     * @var string|null
     */
    protected string|null $fileGroup = null;

    /**
     * get directory
     *
     * @return string
     */
    public function directory(): string
    {
        return $this->directory;
    }

    /**
     * set directory
     *
     * @param string $directory
     * @return static
     */
    public function setDirectory(string $directory): static
    {
        $this->directory = $this->formatDirectory($directory);

        return $this;
    }

    /**
     * format directory
     *
     * @param string $directory
     * @return string
     */
    abstract protected function formatDirectory(string $directory): string;

    /**
     * get file name
     *
     * @return string
     */
    public function fileName(): string
    {
        return $this->fileName;
    }

    /**
     * set file name
     *
     * @param string $fileName
     * @return static
     */
    public function setFileName(string $fileName): static
    {
        $fileNameArray = explode(".", $fileName);

        $this->fileName = array_shift($fileNameArray);

        if (!empty($fileNameArray)) $this->setFileExtension(implode(".", $fileNameArray));

        return $this;
    }

    /**
     * get file extension
     *
     * @return string
     */
    public function fileExtension(): string
    {
        return $this->fileExtension;
    }

    /**
     * set file extension
     *
     * @param string $fileExtension
     * @return static
     */
    public function setFileExtension(string $fileExtension): static
    {
        $this->fileExtension = $fileExtension;

        return $this;
    }

    /**
     * get file mode
     *
     * @return int|null
     */
    public function fileMode(): int|null
    {
        return $this->fileMode;
    }

    /**
     * set file mode
     *
     * @param int $fileMode
     * @return static
     */
    public function setFileMode(int $fileMode): static
    {
        $this->fileMode = $fileMode;

        return $this;
    }

    /**
     * get file owner
     *
     * @return string|null
     */
    public function fileOwner(): string|null
    {
        return $this->fileOwner;
    }

    /**
     * set file owner
     *
     * @param string $fileOwner
     * @return static
     */
    public function setFileOwner(string $fileOwner): static
    {
        $this->fileOwner = $fileOwner;

        return $this;
    }

    /**
     * get file group
     *
     * @return string|null
     */
    public function fileGroup(): string|null
    {
        return $this->fileGroup;
    }

    /**
     * set file group
     *
     * @param string $fileGroup
     * @return static
     */
    public function setFileGroup(string $fileGroup): static
    {
        $this->fileGroup = $fileGroup;

        return $this;
    }

    /**
     * get file path
     *
     * @return string
     */
    public function filePath(): string
    {
        return $this->directory() . DIRECTORY_SEPARATOR . $this->fileName() . "." . $this->fileExtension();
    }
}
