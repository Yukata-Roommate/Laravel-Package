<?php

namespace YukataRm\Laravel\Package\Command\Base\Resource;

use YukataRm\Laravel\Command\BaseCommand as ParentCommand;

use YukataRm\Proxy\Text;

/**
 * Resource Base Command
 *
 * @package YukataRm\Laravel\Package\Command\Base\Resource
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
     * get signature
     *
     * @return string
     */
    #[\Override]
    protected function signature(): string
    {
        return "resource:{$this->commandName} {target} {--directory=*} {--force}";
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
     * set parameter
     *
     * @return void
     */
    protected function setParameter(): void
    {
        $this->target = Text::toSnake($this->argument("target"));

        $this->directory = $this->option("directory") ?? [];
        $this->force     = $this->option("force") ?? false;
    }

    /*----------------------------------------*
     * Process
     *----------------------------------------*/

    /**
     * get resource arguments
     *
     * @return array<string, mixed>
     */
    protected function resourceArguments(): array
    {
        return [
            "target"      => $this->target,
            "--directory" => $this->directory,
            "--force"     => $this->force,
        ];
    }

    /**
     * get make arguments
     *
     * @param array<string, mixed> $merge
     * @return array<string, mixed>
     */
    protected function makeArguments(array $merge): array
    {
        return array_merge(
            [
                "target"      => $this->target,
                "--directory" => $this->directory,
                "--force"     => $this->force,
            ],
            $merge
        );
    }

    /**
     * get make multiple arguments
     *
     * @param string $target
     * @return array<string, mixed>
     */
    protected function makeMultipleArguments(string $target): array
    {
        return [
            "target"       => $target,
            "--rootTarget" => $this->target,
            "--directory"  => array_merge($this->directory, [$this->target]),
            "--force"      => $this->force,
            "--resource"   => true,
        ];
    }
}
