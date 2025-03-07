<?php

namespace YukataRm\Laravel\Package\Command\Make;

use YukataRm\Laravel\Package\Command\Base\Make\AppCommand;

/**
 * Controller Make Command
 *
 * @package YukataRm\Laravel\Package\Command\Make
 */
class ControllerMakeCommand extends AppCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "controller";

    /*----------------------------------------*
     * Process
     *----------------------------------------*/

    /**
     * get search key
     *
     * @return array<string>
     */
    protected function search(): array
    {
        return [
            "ServiceNamespace",
            "RequestNamespace",
        ];
    }

    /**
     * get replace value
     *
     * @return array<string>
     */
    protected function replace(): array
    {
        return [
            $this->serviceNamespace([$this->targetUpper()]),
            $this->requestNamespace([$this->targetUpper()]),
        ];
    }

    /**
     * get stub file path
     *
     * @return string
     */
    protected function stub(): string
    {
        $fileName = match (true) {
            $this->resource => "resource",

            default => "default",
        };

        return $this->stubPath($fileName);
    }
}
