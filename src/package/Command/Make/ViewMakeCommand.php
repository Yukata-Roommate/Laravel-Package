<?php

namespace YukataRm\Laravel\Package\Command\Make;

use YukataRm\Laravel\Package\Command\Base\Make\BaseCommand;

use YukataRm\Text\Proxies\Text;

use Illuminate\Support\Str;

/**
 * View Make Command
 *
 * @package YukataRm\Laravel\Package\Command\Make
 */
class ViewMakeCommand extends BaseCommand
{
    /**
     * command name
     *
     * @var string
     */
    protected string $commandName = "view";

    /**
     * option names
     *
     * @var array<string>
     */
    protected array $options = ["auth", "email"];

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
     * whether to use email
     *
     * @var bool
     */
    protected bool $email;

    /**
     * set parameter
     *
     * @return void
     */
    #[\Override]
    protected function setParameter(): void
    {
        parent::setParameter();

        $this->auth  = $this->option("auth");
        $this->email = $this->option("email");
    }

    /**
     * get directory string
     *
     * @param string $separator
     * @param array<string>|null $directory
     * @return string
     */
    #[\Override]
    protected function directoryString(string $separator, array|null $directory = null): string
    {
        $parent = parent::directoryString($separator, $directory);

        $directory = array_map(fn($value) => Text::toCamel($value), explode($separator, $parent));

        return implode($separator, $directory);
    }

    /**
     * get stub path
     *
     * @param string $fileName
     * @return string
     */
    #[\Override]
    protected function stubPath(string $fileName): string
    {
        return parent::stubPath(strtolower($fileName) . ".blade");
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
        $default = resource_path("views");

        $directory = match (true) {
            $this->auth  => "auth",
            $this->email => "email",

            default => "pages",
        };

        return "{$default}/{$directory}";
    }

    /**
     * get file name
     *
     * @return string
     */
    protected function fileName(): string
    {
        return "{$this->target}.blade.php";
    }

    /**
     * get search key
     *
     * @return array<string>
     */
    protected function search(): array
    {
        return [
            "Name",
            "VariableName",
            "VariablesName",
            "ModalName",
        ];
    }

    /**
     * get replace value
     *
     * @return array<string>
     */
    protected function replace(): array
    {
        $directory = array_map(fn($directory) => Text::toCamel($directory), $this->directory);

        return [
            implode(".", $directory),
            end($directory),
            Str::plural(end($directory)),
            implode("", array_map(fn($value) => Text::toPascal($value), $directory)),
        ];
    }

    /**
     * get stub path
     *
     * @return string
     */
    protected function stub(): string
    {
        if ($this->resource) return $this->resourceStubPath($this->target);

        $fileName = match (true) {
            $this->auth  => "auth",
            $this->email => "email",

            default => "default",
        };

        return $this->stubPath($fileName);
    }
}
