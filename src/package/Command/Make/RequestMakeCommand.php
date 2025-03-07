<?php

namespace YukataRm\Laravel\Package\Command\Make;

use YukataRm\Laravel\Package\Command\Base\Make\AppCommand;

use Illuminate\Support\Str;

/**
 * Request Make Command
 *
 * @package YukataRm\Laravel\Package\Command\Make
 */
class RequestMakeCommand extends AppCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "request";

    /**
     * option names
     *
     * @var array<string>
     */
    protected array $options = ["pagination", "additionals", "additional=*"];

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * whether to use pagination
     *
     * @var bool
     */
    protected bool $pagination;

    /**
     * whether to use additional data
     *
     * @var bool
     */
    protected bool $additionals;

    /**
     * additional data
     *
     * @var array<string>
     */
    protected array $additional;

    /**
     * set parameter
     *
     * @return void
     */
    #[\Override]
    protected function setParameter(): void
    {
        parent::setParameter();

        $this->pagination  = $this->option("pagination");
        $this->additionals = $this->option("additionals");
        $this->additional  = $this->option("additional");
    }

    /**
     * get additional data
     *
     * @return string
     */
    protected function additionalData(): string
    {
        if (empty($this->additional)) return "";

        $additionalData = "";

        foreach ($this->additional as $additional) {
            $additionalData .= "\"{$additional}\", ";
        }

        return rtrim($additionalData, ", ");
    }

    /**
     * get table name
     *
     * @return string|null
     */
    protected function tableName(): string|null
    {
        return Str::plural(implode("_", array_map(
            fn($directory) => strtolower($directory),
            $this->directory
        )));
    }

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
            "RequestEntityClassName",
            "AdditionalData",
            "TableName",
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
            $this->requestEntityClassName($this->targetUpper()),
            $this->additionalData(),
            $this->tableName(),
        ];
    }

    /**
     * get stub file path
     *
     * @return string
     */
    protected function stub(): string
    {
        if ($this->resource) return $this->resourceStubPath($this->target);

        $fileName = match (true) {
            $this->pagination && $this->additionals => "pagination.additionals",
            $this->pagination                       => "pagination",
            $this->additionals                      => "additionals",

            default => "default",
        };

        return $this->stubPath($fileName);
    }
}
