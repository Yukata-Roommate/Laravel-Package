<?php

namespace YukataRm\Laravel\Command;

use Illuminate\Console\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Illuminate\Support\Facades\Process;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Symfony\Component\Console\Exception\InvalidArgumentException;

use YukataRm\Time\Interfaces\TimerInterface;
use YukataRm\Time\Proxies\Time;

use YukataRm\Laravel\Facade\Log;
use YukataRm\Laravel\Log\Logger;
use YukataRm\Enum\Log\LogFormatEnum;

/**
 * Base Command
 *
 * @package YukataRm\Laravel\Command
 */
abstract class BaseCommand extends Command
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * constructor
     */
    public function __construct()
    {
        if (!isset($this->signature)) $this->signature = $this->signature();

        if (!isset($this->description)) $this->description = $this->description();

        parent::__construct();
    }

    /**
     * get signature
     *
     * @return string
     */
    protected function signature(): string
    {
        return "";
    }

    /**
     * get description
     *
     * @return string
     */
    protected function description(): string
    {
        return "";
    }

    /*----------------------------------------*
     * Override
     *----------------------------------------*/

    /**
     * Executes the current command.
     *
     * @return int
     */
    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if (!$this->validate) return parent::execute($input, $output);

        $this->setValidator();

        $this->runValidation();

        return parent::execute($input, $output);
    }

    /**
     * Get the value of a command argument.
     *
     * @param  string|null  $key
     * @return array|string|bool|null
     */
    #[\Override]
    public function argument($key = null)
    {
        return $this->validate ? $this->validated($key) : parent::argument($key);
    }

    /**
     * Get the value of a command option.
     *
     * @param  string|null  $key
     * @return string|array|bool|null
     */
    #[\Override]
    public function option($key = null)
    {
        return $this->validate ? $this->validated($key) : parent::option($key);
    }

    /*----------------------------------------*
     * Required
     *----------------------------------------*/

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $this->timerStart();

            $this->setParameter();

            [$result, $message] = $this->process();

            $this->logging($result, $message);
        } catch (\Throwable $exception) {
            $this->outputError($exception->getMessage());

            $this->logging(false, ["exception" => $exception->getMessage()]);

            throw $exception;
        }
    }

    /**
     * set parameter
     *
     * @return void
     */
    abstract protected function setParameter(): void;

    /**
     * run command process
     *
     * @return array<mixed>
     */
    abstract protected function process(): array;

    /*----------------------------------------*
     * Timer
     *----------------------------------------*/

    /**
     * Timer instance
     *
     * @var \YukataRm\Time\Interfaces\TimerInterface
     */
    protected TimerInterface $timer;

    /**
     * timer start
     *
     * @return void
     */
    protected function timerStart(): void
    {
        $this->timer = Time::start();
    }

    /**
     * timer stop
     *
     * @return void
     */
    protected function timerStop(): void
    {
        $this->timer->stop();
    }

    /*----------------------------------------*
     * Output
     *----------------------------------------*/

    /**
     * output result
     *
     * @param string $type
     * @param string $message
     * @return void
     */
    protected function outputResult(string $type, string $message): void
    {
        match ($type) {
            "info"    => $this->components->info($message),
            "success" => $this->components->success($message),
            "error"   => $this->components->error($message),
            "warn"    => $this->components->warn($message),

            default   => $this->components->line($type, $message),
        };
    }

    /**
     * output info
     *
     * @param string $message
     * @return void
     */
    protected function outputInfo(string $message): void
    {
        $this->outputResult("info", $message);
    }

    /**
     * output success
     *
     * @param string $message
     * @return void
     */
    protected function outputSuccess(string $message): void
    {
        $this->outputResult("success", $message);
    }

    /**
     * output error
     *
     * @param string $message
     * @return void
     */
    protected function outputError(string $message): void
    {
        $this->outputResult("error", $message);
    }

    /**
     * output warn
     *
     * @param string $message
     * @return void
     */
    protected function outputWarn(string $message): void
    {
        $this->outputResult("warn", $message);
    }

    /*----------------------------------------*
     * Task
     *----------------------------------------*/

    /**
     * task
     *
     * @param string $message
     * @param callable $callback
     * @return void
     */
    protected function task(string $message, callable $callback): void
    {
        $this->components->task($message, $callback);
    }

    /*----------------------------------------*
     * Shell
     *----------------------------------------*/

    /**
     * run shell command
     *
     * @param string $message
     * @param string $command
     * @return void
     */
    protected function runShellCommand(string $message, string $command): void
    {
        $this->task($message, function () use ($command) {
            return Process::run($command)->throw();
        });
    }

    /**
     * run shell command with timeout
     *
     * @param string $message
     * @param string $command
     * @param int $timeout
     * @param int|null $idleTimeout
     * @return void
     */
    protected function runShellCommandWithTimeout(string $message, string $command, int $timeout = 60, int|null $idleTimeout = null): void
    {
        $this->task($message, function () use ($command, $timeout, $idleTimeout) {
            $process = Process::timeout($timeout);

            if (!is_null($idleTimeout)) $process->idleTimeout($idleTimeout);

            return $process->run($command)->throw();
        });
    }

    /**
     * run shell command without timeout
     *
     * @param string $message
     * @param string $command
     * @return void
     */
    protected function runShellCommandWithoutTimeout(string $message, string $command): void
    {
        $this->task($message, function () use ($command) {
            return Process::forever()->run($command)->throw();
        });
    }

    /*----------------------------------------*
     * Shell - Artisan
     *----------------------------------------*/

    /**
     * run artisan command
     *
     * @param string $message
     * @param string $command
     * @return void
     */
    protected function runArtisanCommand(string $message, string $command): void
    {
        $this->runShellCommandWithoutTimeout(
            sprintf(
                "Artisan %s",
                $message
            ),
            sprintf(
                "php artisan %s",
                $command
            )
        );
    }

    /**
     * run artisan migrate
     *
     * @param bool $force
     * @return void
     */
    protected function artisanMigrate(bool $force = false): void
    {
        $this->runArtisanCommand(
            "migrate",
            sprintf(
                "migrate %s",
                $force ? "--force" : ""
            )
        );
    }

    /**
     * run artisan optimize
     *
     * @return void
     */
    protected function artisanOptimize(): void
    {
        $this->runArtisanCommand(
            "optimize",
            "optimize"
        );
    }

    /**
     * run artisan key generate
     *
     * @return void
     */
    protected function artisanKeyGenerate(): void
    {
        $this->runArtisanCommand(
            "key:generate",
            "key:generate"
        );
    }

    /**
     * run artisan storage link
     *
     * @return void
     */
    protected function artisanStorageLink(): void
    {
        $this->runArtisanCommand(
            "storage:link",
            "storage:link"
        );
    }

    /*----------------------------------------*
     * Shell - Composer
     *----------------------------------------*/

    /**
     * run composer command
     *
     * @param string $message
     * @param string $command
     * @return void
     */
    protected function runComposerCommand(string $message, string $command): void
    {
        $this->runShellCommandWithoutTimeout(
            sprintf(
                "Composer %s",
                $message
            ),
            sprintf(
                "composer %s",
                $command
            )
        );
    }

    /**
     * run composer install
     *
     * @param array<string> $options
     * @return void
     */
    protected function composerInstall(array $options = []): void
    {
        $this->runComposerCommand(
            "install",
            sprintf(
                "install %s",
                implode(" ", $options)
            )
        );
    }

    /**
     * run composer update
     *
     * @param array<string> $options
     * @return void
     */
    protected function composerUpdate(array $options = []): void
    {
        $this->runComposerCommand(
            "update",
            sprintf(
                "update %s",
                implode(" ", $options)
            )
        );
    }

    /**
     * run composer require
     *
     * @param string $package
     * @param bool $isDev
     * @return void
     */
    protected function composerRequire(string $package, bool $isDev = false): void
    {
        $this->runComposerCommand(
            "require [{$package}]",
            sprintf(
                "require %s %s",
                $isDev ? "--dev" : "",
                $package
            )
        );
    }

    /**
     * run composer remove
     *
     * @param string $package
     * @return void
     */
    protected function composerRemove(string $package): void
    {
        $this->runComposerCommand(
            "remove [{$package}]",
            sprintf(
                "remove %s",
                $package
            )
        );
    }

    /**
     * run composer dump-autoload
     *
     * @return void
     */
    protected function composerDumpAutoload(): void
    {
        $this->runComposerCommand(
            "dump-autoload",
            "dump-autoload"
        );
    }

    /*----------------------------------------*
     * Shell - Npm
     *----------------------------------------*/

    /**
     * run npm command
     *
     * @param string $message
     * @param string $command
     * @return void
     */
    protected function runNpmCommand(string $message, string $command): void
    {
        $this->runShellCommandWithoutTimeout(
            sprintf(
                "Npm %s",
                $message
            ),
            sprintf(
                "npm %s",
                $command
            )
        );
    }

    /**
     * run npm install
     *
     * @param bool $isClean
     * @return void
     */
    protected function npmInstall(bool $isClean = false): void
    {
        $this->runNpmCommand(
            $isClean ? "clean install" : "install",
            $isClean ? "clean-install" : "install"
        );
    }

    /**
     * run npm install package
     *
     * @param string $package
     * @param bool $isDev
     * @return void
     */
    protected function npmInstallPackage(string $package, bool $isDev = false): void
    {
        $this->runNpmCommand(
            "install [{$package}]",
            sprintf(
                "install %s %s",
                $isDev ? "--save-dev" : "--save",
                $package
            )
        );
    }

    /**
     * run npm uninstall
     *
     * @param string $package
     * @return void
     */
    protected function npmUninstall(string $package): void
    {
        $this->runNpmCommand(
            "uninstall [{$package}]",
            sprintf(
                "uninstall %s",
                $package
            )
        );
    }

    /**
     * run npm run
     *
     * @param string $script
     * @return void
     */
    protected function npmRun(string $script): void
    {
        $this->runNpmCommand(
            "run [{$script}]",
            sprintf(
                "run %s",
                $script
            )
        );
    }

    /**
     * run npm audit fix
     *
     * @return void
     */
    protected function npmAuditFix(): void
    {
        $this->runNpmCommand(
            "audit fix",
            "audit fix"
        );
    }

    /**
     * run npm pkg set scripts
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    protected function npmPkgSetScripts(string $key, string $value): void
    {
        $this->runNpmCommand(
            "pkg set scripts",
            sprintf(
                "pkg set scripts.%s=\"%s\"",
                $key,
                $value
            )
        );
    }

    /*----------------------------------------*
     * Shell - Git
     *----------------------------------------*/

    /**
     * run git command
     *
     * @param string $message
     * @param string $command
     * @return void
     */
    protected function runGitCommand(string $message, string $command): void
    {
        $this->runShellCommandWithoutTimeout(
            sprintf(
                "Git %s",
                $message
            ),
            sprintf(
                "git %s",
                $command
            )
        );
    }

    /**
     * run git add
     *
     * @param string $file
     * @return void
     */
    protected function gitAdd(string $file): void
    {
        $this->runGitCommand(
            "add [{$file}]",
            sprintf(
                "add %s",
                $file
            )
        );
    }

    /**
     * run git commit
     *
     * @param string $message
     * @return void
     */
    protected function gitCommit(string $message): void
    {
        $this->runGitCommand(
            "commit",
            sprintf(
                "commit -m \"%s\"",
                $message
            )
        );
    }

    /**
     * run git push
     *
     * @return void
     */
    protected function gitPush(): void
    {
        $this->runGitCommand(
            "push",
            "push"
        );
    }

    /**
     * run git pull
     *
     * @param string $remote
     * @param string $branch
     * @return void
     */
    protected function gitPull(string $remote, string $branch): void
    {
        $this->runGitCommand(
            "pull [{$remote}] [{$branch}]",
            sprintf(
                "pull %s %s",
                $remote,
                $branch
            )
        );
    }

    /*----------------------------------------*
     * Validation
     *----------------------------------------*/

    /**
     * whether to enable validation
     *
     * @var bool
     */
    protected bool $validate = false;

    /**
     * Validator instance
     *
     * @var \Illuminate\Contracts\Validation\Validator
     */
    protected Validator $validator;

    /**
     * validation rules
     *
     * @var array<string, mixed>
     */
    protected array $rules;

    /**
     * validation messages
     *
     * @var array<string, mixed>
     */
    protected array $messages;

    /**
     * validation attributes
     *
     * @var array<string, mixed>
     */
    protected array $attributes;

    /**
     * set Validator instance
     *
     * @return void
     */
    protected function setValidator(): void
    {
        $this->validator = ValidatorFacade::make(
            $this->validationData(),
            $this->rules(),
            $this->messages(),
            $this->attributes()
        );
    }

    /**
     * run validation
     *
     * @return void
     */
    protected function runValidation(): void
    {
        if ($this->validator->fails()) throw new InvalidArgumentException(
            implode(PHP_EOL, $this->validationErrors())
        );
    }

    /**
     * get validation data
     *
     * @return array<string, mixed>
     */
    protected function validationData(): array
    {
        return array_merge($this->arguments(), $this->options());
    }

    /**
     * get validation rules
     *
     * @return array<string, mixed>
     */
    protected function rules(): array
    {
        return isset($this->rules) ? $this->rules : [];
    }

    /**
     * get validation messages
     *
     * @return array<string, mixed>
     */
    protected function messages(): array
    {
        return isset($this->messages) ? $this->messages : [];
    }

    /**
     * get validation attributes
     *
     * @return array<string, mixed>
     */
    protected function attributes(): array
    {
        return isset($this->attributes) ? $this->attributes : [];
    }

    /**
     * get validated
     *
     * @param string|null $key
     * @return mixed
     */
    protected function validated(string|null $key = null)
    {
        $validated = $this->validator->validated();

        return is_null($key) ? $validated : $validated[$key];
    }

    /**
     * get validation error messages
     *
     * @return array<string, mixed>
     */
    protected function validationErrors(): array
    {
        return $this->validator->errors()->all();
    }

    /*----------------------------------------*
     * Logging
     *----------------------------------------*/

    /**
     * logging
     *
     * @param bool $result
     * @param array<mixed> $message
     * @return void
     */
    protected function logging(bool $result, array $message): void
    {
        if (!$this->isLoggingEnable()) return;

        $logger = $this->logger();

        $contents = array_merge($this->loggingContents(), $message, ["result" => $result]);

        $logger->add($contents);

        $logger->logging();
    }

    /**
     * whether to enable logging
     *
     * @return bool
     */
    protected function isLoggingEnable(): bool
    {
        return $this->configLoggingEnable();
    }

    /**
     * get logger instance
     *
     * @return \YukataRm\Laravel\Log\Logger
     */
    protected function logger(): Logger
    {
        $logger = Log::make()->info();

        $logger->setBaseDirectory($this->configLoggingBaseDirectory());

        $logger->setDirectory($this->configLoggingDirectory());

        $logger->setFileNameFormat($this->configLoggingFileNameFormat());

        $logger->setFileExtension($this->configLoggingFileExtension());

        $logger->setLogFormat(LogFormatEnum::MESSAGE);

        return $logger;
    }

    /**
     * get logging contents
     *
     * @return array<string, mixed>
     */
    protected function loggingContents(): array
    {
        $this->timerStop();

        $default = [
            "datetime"          => date("Y-m-d H:i:s"),
            "class"             => get_class($this),
            "signature"         => $this->signature,
            "memory_peak_usage" => memory_get_peak_usage(),
            "execution_time"    => $this->timer->elapsedMilliseconds(),
        ];

        if ($this->validate) $default["validated"] = $this->validated();

        return $default;
    }

    /*----------------------------------------*
     * Config
     *----------------------------------------*/

    /**
     * get config or default
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    protected function config(string $key, mixed $default): mixed
    {
        return config("package.command.{$key}", $default);
    }

    /**
     * get config logging enable
     *
     * @return bool
     */
    protected function configLoggingEnable(): bool
    {
        return $this->config("logging.enable", false);
    }

    /**
     * get config logging base directory
     *
     * @return string
     */
    protected function configLoggingBaseDirectory(): string
    {
        return $this->config("logging.base_directory", storage_path("logs"));
    }

    /**
     * get config logging directory
     *
     * @return string
     */
    protected function configLoggingDirectory(): string
    {
        return $this->config("logging.directory", "command");
    }

    /**
     * get config logging file name format
     *
     * @return string
     */
    protected function configLoggingFileNameFormat(): string
    {
        return $this->config("logging.file.name_format", "Y-m-d");
    }

    /**
     * get config logging file extension
     *
     * @return string
     */
    protected function configLoggingFileExtension(): string
    {
        return $this->config("logging.file.extension", "log");
    }
}
