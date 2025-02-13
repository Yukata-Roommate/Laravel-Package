<?php

namespace YukataRm\Laravel\View\Component;

use YukataRm\Laravel\View\Component\CustomComponent;

/**
 * Markdown Component
 *
 * @package YukataRm\Laravel\View\Component
 */
class Markdown extends CustomComponent
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     *
     * @param string $markdown
     */
    public function __construct(string $markdown)
    {
        $this->setMarkdown($markdown);
    }

    /*----------------------------------------*
     * Attributes
     *----------------------------------------*/

    /**
     * merge attributes
     *
     * @return array<string, mixed>
     */
    #[\Override]
    protected function mergeAttributes(): array
    {
        return [
            "class" => "markdown-landmark",
        ];
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * markdown text
     *
     * @var string
     */
    public string $markdown;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set markdown text
     *
     * @param string $markdown
     * @return void
     */
    protected function setMarkdown(string $markdown): void
    {
        $this->markdown = $markdown;
    }
}
