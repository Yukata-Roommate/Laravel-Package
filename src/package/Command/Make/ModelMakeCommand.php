<?php

namespace YukataRm\Laravel\Package\Command\Make;

use YukataRm\Laravel\Package\Command\Base\Make\AppCommand;

use Illuminate\Support\Str;

/**
 * Model Make Command
 *
 * @package YukataRm\Laravel\Package\Command\Make
 */
class ModelMakeCommand extends AppCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "model";

    /**
     * option names
     *
     * @var array<string>
     */
    protected array $options = ["auth", "migration"];

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * whether to use auth
     *
     * @var bool
     */
    protected bool $auth;

    /**
     * whether make migration file
     *
     * @var bool
     */
    protected bool $migration;

    /**
     * set parameter
     *
     * @return void
     */
    #[\Override]
    protected function setParameter(): void
    {
        parent::setParameter();

        $this->auth      = $this->option("auth");
        $this->migration = $this->option("migration");
    }

    /**
     * get table name
     *
     * @return string|null
     */
    protected function tableName(): string|null
    {
        return implode("_", array_map(
            fn($directory) => strtolower($directory),
            array_merge($this->directory, [Str::plural($this->target)])
        ));
    }

    /*----------------------------------------*
     * Process
     *----------------------------------------*/

    /**
     * run command process
     *
     * @return array<mixed>
     */
    #[\Override]
    protected function process(): array
    {
        $result = parent::process();

        $tableName = $this->tableName();

        if ($this->migration) $this->call("make:migration", [
            "name"     => "create_{$tableName}_table",
            "--create" => $tableName,
        ]);

        return $result;
    }

    /**
     * get file name
     *
     * @return string
     */
    #[\Override]
    protected function fileName(): string
    {
        return str_replace($this->commandNameUpper(), "", parent::fileName());
    }

    /**
     * get search key
     *
     * @return array<string>
     */
    protected function search(): array
    {
        return [
            "RepositoryEntityClassName",
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
            $this->repositoryEntityClassName($this->targetUpper()),
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
        $fileName = match (true) {
            $this->auth => "auth",

            default => "default",
        };

        return $this->stubPath($fileName);
    }
}
