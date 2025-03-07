<?php

namespace YukataRm\Laravel\Package\Command\Base\Make;

use YukataRm\Laravel\Command\MakeFileCommand as ParentCommand;

use YukataRm\Proxy\Text;

/**
 * Make Base Command
 *
 * @package YukataRm\Laravel\Package\Command\Base\Make
 */
abstract class BaseCommand extends ParentCommand
{
    /*----------------------------------------*
     * Signature
     *----------------------------------------*/

    /**
     * command name
     *
     * @var string
     */
    protected string $commandName;

    /**
     * arguments
     *
     * @var array<string>
     */
    protected array $arguments = [];

    /**
     * options
     *
     * @var array<string>
     */
    protected array $options = [];

    /**
     * get signature
     *
     * @return string
     */
    #[\Override]
    protected function signature(): string
    {
        $signature = "make:{$this->commandName}";

        $signature = $this->addArguments($signature);

        $signature = $this->addOptions($signature);

        return $signature;
    }

    /**
     * add arguments
     *
     * @param string $signature
     * @return string
     */
    protected function addArguments(string $signature): string
    {
        $arguments = $this->getArguments();

        if (empty($arguments)) return $signature;

        foreach ($arguments as $argument) {
            $signature .= " {" . $argument . "}";
        }

        return $signature;
    }

    /**
     * get arguments
     *
     * @return array<string>
     */
    protected function getArguments(): array
    {
        return array_merge($this->getDefaultArguments(), $this->arguments);
    }

    /**
     * get default arguments
     *
     * @return array<string>
     */
    protected function getDefaultArguments(): array
    {
        return ["target"];
    }

    /**
     * add options
     *
     * @param string $signature
     * @return string
     */
    protected function addOptions(string $signature): string
    {
        $options = $this->getOptions();

        if (empty($options)) return $signature;

        foreach ($options as $option) {
            $signature .= " {--" . $option . "}";
        }

        return $signature;
    }

    /**
     * get options
     *
     * @return array<string>
     */
    protected function getOptions(): array
    {
        return array_merge($this->getDefaultOptions(), $this->options);
    }

    /**
     * get default options
     *
     * @return array<string>
     */
    protected function getDefaultOptions(): array
    {
        return ["directory=*", "force", "resource", "rootTarget="];
    }

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * target name
     *
     * @var string
     */
    protected string $target;

    /**
     * directory
     *
     * @var array<string>
     */
    protected array $directory;

    /**
     * make file force
     *
     * @var bool
     */
    protected bool $force;

    /**
     * whether to use resource
     *
     * @var bool
     */
    protected bool $resource;

    /**
     * root target
     *
     * @var string|null
     */
    protected string|null $rootTarget;

    /**
     * stub directory
     *
     * @var string
     */
    protected string $stubDirectory = __DIR__ . "/../../../../../stubs/make";

    /**
     * set parameter
     *
     * @return void
     */
    protected function setParameter(): void
    {
        $this->target = $this->argument("target");

        $this->directory  = $this->option("directory") ?? [];
        $this->force      = $this->option("force") ?? false;
        $this->resource   = $this->option("resource") ?? false;
        $this->rootTarget = $this->option("rootTarget");
    }

    /**
     * get command name upper case[
     *
     * @return string
     */
    protected function commandNameUpper(): string
    {
        return Text::toPascal($this->commandName);
    }

    /**
     * get target name upper case
     *
     * @return string
     */
    protected function targetUpper(): string
    {
        return Text::toPascal($this->target);
    }

    /**
     * get root target name upper case
     *
     * @return string|null
     */
    protected function rootTargetUpper(): string|null
    {
        return is_null($this->rootTarget) ? null : Text::toPascal($this->rootTarget);
    }

    /**
     * get directory upper case
     *
     * @return array<string>
     */
    protected function directoryUpper(): array
    {
        return array_map(fn($directory) => Text::toPascal(strtolower($directory)), $this->directory);
    }

    /**
     * get directory string
     *
     * @param string $separator
     * @param array<string> $directory
     * @return string
     */
    protected function directoryString(string $separator, array $directory): string
    {
        return implode($separator, $directory);
    }

    /**
     * whether make file force
     *
     * @return bool
     */
    #[\Override]
    protected function forceCreate(): bool
    {
        return $this->force;
    }

    /**
     * get stub path
     *
     * @param string $fileName
     * @return string
     */
    protected function stubPath(string $fileName): string
    {
        $commandDirectory = str_replace("-", "/", $this->commandName);

        return "{$this->stubDirectory}/{$commandDirectory}/{$fileName}.stub";
    }

    /**
     * get resource stub path
     *
     * @param string $fileName
     * @return string
     */
    protected function resourceStubPath(string $fileName): string
    {
        return $this->stubPath("resource/{$fileName}");
    }

    /*----------------------------------------*
     * Process
     *----------------------------------------*/

    /**
     * get file directory
     *
     * @return string
     */
    protected function fileDirectory(): string
    {
        $default = $this->defaultFileDirectory();

        if (empty($this->directory)) return $default;

        $directoryString = $this->directoryString("/", $this->directoryUpper());

        return "{$default}/{$directoryString}";
    }

    /**
     * get default file directory
     *
     * @return string
     */
    abstract protected function defaultFileDirectory(): string;

    /**
     * get file content
     *
     * @return string
     */
    protected function fileContent(): string
    {
        return str_replace(
            $this->getSearchKey(),
            $this->getReplaceValue(),
            $this->getContent($this->getStubFile())
        );
    }

    /**
     * get search key
     *
     * @return array<string>
     */
    protected function getSearchKey(): array
    {
        $search = $this->getSearch();

        foreach ($search as $key => $value) {
            $search[$key] = "{{ {$value} }}";
        }

        return $search;
    }

    /**
     * get search key
     *
     * @return array<string>
     */
    protected function getSearch(): array
    {
        return array_merge($this->getDefaultSearch(), $this->search());
    }

    /**
     * get default search key
     *
     * @return array<string>
     */
    protected function getDefaultSearch(): array
    {
        return [];
    }

    /**
     * get search key
     *
     * @return array<string>
     */
    abstract protected function search(): array;

    /**
     * get replace value
     *
     * @return array<string>
     */
    protected function getReplaceValue(): array
    {
        return $this->getReplace();
    }

    /**
     * get replace value
     *
     * @return array<string>
     */
    protected function getReplace(): array
    {
        return array_merge($this->getDefaultReplace(), $this->replace());
    }

    /**
     * get default replace value
     *
     * @return array<string>
     */
    protected function getDefaultReplace(): array
    {
        return [];
    }

    /**
     * get replace value
     *
     * @return array<string>
     */
    abstract protected function replace(): array;

    /**
     * get stub file path
     *
     * @return string
     */
    protected function getStubFile(): string
    {
        return $this->getStub();
    }

    /**
     * get stub file path
     *
     * @return string
     */
    protected function getStub(): string
    {
        return $this->stub();
    }

    /**
     * get stub file path
     *
     * @return string
     */
    abstract protected function stub(): string;

    /*----------------------------------------*
     * Output
     *----------------------------------------*/

    /**
     * get already exists error message
     *
     * @return string
     */
    #[\Override]
    protected function alreadyExistsErrorMessage(): string
    {
        return sprintf("%s [%s] already exists.", $this->commandNameUpper(), $this->filePath);
    }

    /**
     * get file created failed error message
     *
     * @return string
     */
    #[\Override]
    protected function createdFailedErrorMessage(): string
    {
        return sprintf("%s [%s] created failed.", $this->commandNameUpper(), $this->filePath);
    }

    /**
     * get file created successfully message
     *
     * @return string
     */
    #[\Override]
    protected function createdSuccessfullyMessage(): string
    {
        return sprintf("%s [%s] created successfully.", $this->commandNameUpper(), $this->filePath);
    }
}
