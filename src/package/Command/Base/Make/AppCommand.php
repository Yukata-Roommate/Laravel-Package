<?php

namespace YukataRm\Laravel\Package\Command\Base\Make;

use YukataRm\Laravel\Package\Command\Base\Make\BaseCommand;

/**
 * Make App Command
 *
 * @package YukataRm\Laravel\Package\Command\Base\Make
 */
abstract class AppCommand extends BaseCommand
{
    /*----------------------------------------*
     * Description
     *----------------------------------------*/

    /**
     * get description
     *
     * @return string
     */
    #[\Override]
    protected function description(): string
    {
        return "Create a new {$this->commandNameUpper()} class";
    }

    /*----------------------------------------*
     * Process
     *----------------------------------------*/

    /**
     * get default file directory
     *
     * @return string
     */
    protected function defaultFileDirectory(): string
    {
        return app_path(implode("/", $this->appDirectory()));
    }

    /**
     * get file name
     *
     * @return string
     */
    protected function fileName(): string
    {
        return "{$this->targetUpper()}{$this->commandNameUpper()}.php";
    }

    /**
     * get default search key
     *
     * @return array<string>
     */
    #[\Override]
    protected function getDefaultSearch(): array
    {
        return [
            "Target",
            "TargetUpper",
            "NameSpace",
            "Comment",
        ];
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
            $this->appNamespace(),
            $this->getComment(),
        ];
    }

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * get app directory
     *
     * @param string|null $type
     * @return array<string>
     */
    protected function appDirectory(string|null $type = null): array
    {
        $type = $type ?? $this->commandName;

        return match ($type) {
            "controller"     => ["Http", "Controllers"],
            "request"        => ["Http", "Requests"],
            "model"          => ["Models"],
            "repository"     => ["Repositories"],
            "service"        => ["Services"],
            default => [],
        };
    }

    /**
     * get namespace
     *
     * @param string $default
     * @param array<string> $directory
     * @return string
     */
    protected function getNamespace(string $default, array $directory = []): string
    {
        $directory = array_merge($this->directoryUpper(), $directory);

        if (empty($directory)) return $default;

        $directoryString = $this->directoryString("\\", $directory);

        return "{$default}\\{$directoryString}";
    }

    /**
     * get comment
     *
     * @return string
     */
    protected function getComment(): string
    {
        $default = "{$this->targetUpper()} {$this->commandNameUpper()}";

        if (empty($this->directory)) return $default;

        $directoryString = $this->directoryString(" ", $this->directoryUpper());

        return "{$directoryString} {$default}";
    }

    /*----------------------------------------*
     * Parameter - Namespace
     *----------------------------------------*/

    /**
     * get app namespace
     *
     * @param string|null $type
     * @param array<string> $directory
     * @return string
     */
    protected function appNamespace(string|null $type = null, array $directory = []): string
    {
        return $this->getNamespace(
            $this->directoryString("\\", array_merge(["App"], $this->appDirectory($type))),
            $directory
        );
    }

    /**
     * get controller namespace
     *
     * @param array<string> $directory
     * @return string
     */
    protected function controllerNamespace(array $directory = []): string
    {
        return $this->appNamespace("controller", $directory);
    }

    /**
     * get request namespace
     *
     * @param array<string> $directory
     * @return string
     */
    protected function requestNamespace(array $directory = []): string
    {
        return $this->appNamespace("request", $directory);
    }

    /**
     * get request entity namespace
     *
     * @param array<string> $directory
     * @return string
     */
    protected function requestEntityNamespace(array $directory = []): string
    {
        return $this->requestNamespace($directory) . "\\Entities";
    }

    /**
     * get model namespace
     *
     * @param array<string> $directory
     * @return string
     */
    protected function modelNamespace(array $directory = []): string
    {
        return $this->appNamespace("model", $directory);
    }

    /**
     * get repository namespace
     *
     * @param array<string> $directory
     * @return string
     */
    protected function repositoryNamespace(array $directory = []): string
    {
        return $this->appNamespace("repository", $directory);
    }

    /**
     * get repository entity namespace
     *
     * @param array<string> $directory
     * @return string
     */
    protected function repositoryEntityNamespace(array $directory = []): string
    {
        return $this->repositoryNamespace($directory) . "\\Entities";
    }

    /**
     * get service namespace
     *
     * @param array<string> $directory
     * @return string
     */
    protected function serviceNamespace(array $directory = []): string
    {
        return $this->appNamespace("service", $directory);
    }

    /*----------------------------------------*
     * Parameter - Class Name
     *----------------------------------------*/

    /**
     * get controller class name
     *
     * @param string|null $name
     * @param array<string> $directory
     * @return string
     */
    protected function controllerClassName(string|null $name = null, array $directory = []): string
    {
        $namespace = $this->controllerNamespace($directory);

        return is_null($name) ? "{$namespace}Controller" : "{$namespace}\\{$name}Controller";
    }

    /**
     * get request class name
     *
     * @param string|null $name
     * @param array<string> $directory
     * @return string
     */
    protected function requestClassName(string|null $name = null, array $directory = []): string
    {
        $namespace = $this->requestNamespace($directory);

        return is_null($name) ? "{$namespace}Request" : "{$namespace}\\{$name}Request";
    }

    /**
     * get request entity class name
     *
     * @param string|null $name
     * @param array<string> $directory
     * @return string
     */
    protected function requestEntityClassName(string|null $name = null, array $directory = []): string
    {
        $namespace = $this->requestEntityNamespace($directory);

        return is_null($name) ? "{$namespace}Entity" : "{$namespace}\\{$name}Entity";
    }

    /**
     * get model class name
     *
     * @param string|null $name
     * @param array<string> $directory
     * @return string
     */
    protected function modelClassName(string|null $name = null, array $directory = []): string
    {
        $namespace = $this->modelNamespace($directory);

        return is_null($name) ? "{$namespace}" : "{$namespace}\\{$name}";
    }

    /**
     * get repository class name
     *
     * @param string|null $name
     * @param array<string> $directory
     * @return string
     */
    protected function repositoryClassName(string|null $name = null, array $directory = []): string
    {
        $namespace = $this->repositoryNamespace($directory);

        return is_null($name) ? "{$namespace}Repository" : "{$namespace}\\{$name}Repository";
    }

    /**
     * get repository entity class name
     *
     * @param string|null $name
     * @param array<string> $directory
     * @return string
     */
    protected function repositoryEntityClassName(string|null $name = null, array $directory = []): string
    {
        $namespace = $this->repositoryEntityNamespace($directory);

        return is_null($name) ? "{$namespace}Entity" : "{$namespace}\\{$name}Entity";
    }

    /**
     * get service class name
     *
     * @param string|null $name
     * @param array<string> $directory
     * @return string
     */
    protected function serviceClassName(string|null $name = null, array $directory = []): string
    {
        $namespace = $this->serviceNamespace($directory);

        return is_null($name) ? "{$namespace}Service" : "{$namespace}\\{$name}Service";
    }
}
