<?php

namespace YukataRm\Laravel\Exception;

use YukataRm\Laravel\Interface\Exception\HandlerInterface;

use YukataRm\Laravel\Facade\Log;
use YukataRm\Laravel\Log\Logger;
use YukataRm\Enum\Log\LogFormatEnum;

use YukataRm\Laravel\Mail\Client;

/**
 * Exception Handler
 *
 * @package YukataRm\Laravel\Exception
 */
class Handler implements HandlerInterface
{
    /*----------------------------------------*
     * Handle
     *----------------------------------------*/

    /**
     * handle exception
     *
     * @param \Throwable $exception
     * @return void
     */
    public function handle(\Throwable $exception): void
    {
        $this->setException($exception);

        $this->logging();

        $this->mailing();
    }

    /*----------------------------------------*
     * Exception
     *----------------------------------------*/

    /**
     * exception
     *
     * @var \Throwable
     */
    protected \Throwable $exception;

    /**
     * set exception
     *
     * @param \Throwable $exception
     * @return void
     */
    protected function setException(\Throwable $exception): void
    {
        $this->exception = $exception;
    }

    /**
     * get exception
     *
     * @return \Throwable
     */
    protected function exception(): \Throwable
    {
        return $this->exception;
    }

    /**
     * get exception contents
     *
     * @return array<string, mixed>
     */
    protected function contents(): array
    {
        return [
            "subject"   => $this->configSubject(),
            "datetime"  => date("Y-m-d H:i:s"),
            "className" => get_class($this->exception()),
            "url"       => request()->fullUrl(),
            "exception" => $this->exception()->getMessage(),
            "code"      => $this->exception()->getCode(),
            "file"      => $this->exception()->getFile(),
            "line"      => $this->exception()->getLine(),
            "traces"    => explode(PHP_EOL, $this->exception()->getTraceAsString()),
        ];
    }

    /*----------------------------------------*
     * Logger
     *----------------------------------------*/

    /**
     * logging
     *
     * @return void
     */
    protected function logging(): void
    {
        if (!$this->enableLogging()) return;

        $logger = $this->logger();

        $logger->add($this->contents());

        $logger->logging();
    }

    /**
     * whether enable logging
     *
     * @return bool
     */
    protected function enableLogging(): bool
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
        $logger = Log::make()->alert();

        $logger->setBaseDirectory($this->configBaseDirectory());

        $logger->setDirectory($this->configDirectory());

        $logger->setFileNameFormat($this->configFileNameFormat());

        $logger->setFileExtension($this->configFileExtension());

        $logger->setLogFormat(LogFormatEnum::MESSAGE);

        return $logger;
    }

    /*----------------------------------------*
     * Mailer
     *----------------------------------------*/

    /**
     * mailing
     *
     * @return void
     */
    protected function mailing(): void
    {
        if (!$this->enableMailing()) return;

        if (!$this->isSendable()) return;

        $recipients = $this->configTo();

        foreach ($recipients as $recipientName => $recipientAddress) {
            if (empty($recipientAddress)) continue;

            $this->client($recipientAddress, $recipientName)->send();
        }
    }

    /**
     * whether enable mailing
     *
     * @return bool
     */
    protected function enableMailing(): bool
    {
        return $this->configMailingEnable();
    }

    /**
     * whether sendable
     *
     * @return bool
     */
    protected function isSendable(): bool
    {
        if (empty($this->view())) return $this->parameterEmptyLog("view");

        if (empty($this->configFromAddress())) return $this->parameterEmptyLog("from address");

        if (empty($this->configFromName())) return $this->parameterEmptyLog("from name");

        if (empty($this->configSubject())) return $this->parameterEmptyLog("subject");

        return true;
    }

    /**
     * get Client instance
     *
     * @param string $address
     * @param string|int $name
     * @return \YukataRm\Laravel\Mail\Client
     */
    protected function client(string $address, string|int $name): Client
    {
        $client = new Client();

        $client->setView($this->view());

        $client->setWith($this->with());

        $client->setSubject($this->configSubject());

        $client->setSenderAddress($this->configFromAddress());

        $client->setSenderName($this->configFromName());

        $client->setRecipientAddress($address);

        if (is_string($name) && !empty($name)) $client->setRecipientName($name);

        return $client;
    }

    /**
     * view string
     *
     * @return string
     */
    protected function view(): string
    {
        return "email.exception";
    }

    /**
     * with contents
     *
     * @return array<string, mixed>
     */
    protected function with(): array
    {
        return $this->contents();
    }

    /**
     * run parameter empty log
     *
     * @param string $parameter
     * @return false
     */
    protected function parameterEmptyLog(string $parameter): false
    {
        Log::alert("{$parameter} is empty.");

        return false;
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
        return config("package.exception.{$key}", $default);
    }

    /*----------------------------------------*
     * Config - Logging
     *----------------------------------------*/

    /**
     * get logging config
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    protected function loggingConfig(string $key, mixed $default): mixed
    {
        return $this->config("logging.{$key}", $default);
    }

    /**
     * get config logging enable
     *
     * @return bool
     */
    protected function configLoggingEnable(): bool
    {
        return $this->loggingConfig("enable", false);
    }

    /**
     * get config base directory
     *
     * @return string
     */
    protected function configBaseDirectory(): string
    {
        return $this->loggingConfig("base_directory", storage_path("logs"));
    }

    /**
     * get config directory
     *
     * @return string
     */
    protected function configDirectory(): string
    {
        return $this->loggingConfig("directory", "exception");
    }

    /**
     * get config file name format
     *
     * @return string
     */
    protected function configFileNameFormat(): string
    {
        return $this->loggingConfig("file.name_format", "Y-m-d");
    }

    /**
     * get config file extension
     *
     * @return string
     */
    protected function configFileExtension(): string
    {
        return $this->loggingConfig("file.extension", "log");
    }

    /*----------------------------------------*
     * Config - Mailing
     *----------------------------------------*/

    /**
     * get mailing config
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    protected function mailingConfig(string $key, mixed $default): mixed
    {
        return $this->config("mailing.{$key}", $default);
    }

    /**
     * get config mailing enable
     *
     * @return bool
     */
    protected function configMailingEnable(): bool
    {
        return $this->mailingConfig("enable", false);
    }

    /**
     * get config subject
     *
     * @return string
     */
    protected function configSubject(): string
    {
        return $this->mailingConfig("subject", "Exception Occurred");
    }

    /**
     * get config from address
     *
     * @return string|null
     */
    protected function configFromAddress(): string|null
    {
        return $this->mailingConfig("from.address", null);
    }

    /**
     * get config from name
     *
     * @return string|null
     */
    protected function configFromName(): string|null
    {
        return $this->mailingConfig("from.name", null);
    }

    /**
     * get config to
     *
     * @return array
     */
    protected function configTo(): array
    {
        return $this->mailingConfig("to", []);
    }
}
