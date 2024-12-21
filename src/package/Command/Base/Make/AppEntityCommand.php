<?php

namespace YukataRm\Laravel\Package\Command\Base\Make;

use YukataRm\Laravel\Package\Command\Base\Make\AppCommand;

/**
 * Make App Entity Command
 *
 * @package YukataRm\Laravel\Package\Command\Base\Make
 */
abstract class AppEntityCommand extends AppCommand
{
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * parent class name
     *
     * @var string
     */
    protected string $parent;

    /*----------------------------------------*
     * Process
     *----------------------------------------*/

    /**
     * get file directory
     *
     * @return string
     */
    #[\Override]
    protected function fileDirectory(): string
    {
        return parent::fileDirectory() . "/Entities";
    }

    /**
     * get default file directory
     *
     * @return string
     */
    #[\Override]
    protected function defaultFileDirectory(): string
    {
        return app_path(implode("/", $this->appDirectory($this->parent)));
    }

    /**
     * get file name
     *
     * @return string
     */
    #[\Override]
    protected function fileName(): string
    {
        return str_replace(ucfirst($this->parent), "", parent::fileName());
    }

    /**
     * get default replace value
     *
     * @return array<string>
     */
    #[\Override]
    protected function getDefaultReplace(): array
    {
        return [
            $this->target,
            $this->targetUpper(),
            $this->appNamespace($this->parent, ["Entities"]),
            $this->getComment(),
        ];
    }

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * get comment
     *
     * @return string
     */
    #[\Override]
    protected function getComment(): string
    {
        return str_replace(ucfirst($this->parent), ucfirst($this->parent) . " ", parent::getComment());
    }
}
