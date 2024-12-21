<?php

namespace YukataRm\Laravel\Http\Middleware;

use YukataRm\Laravel\Middleware\BaseMiddleware;
use Symfony\Component\HttpFoundation\Response;

use YukataRm\Interface\Time\TimerInterface;
use YukataRm\Proxy\Time;

use YukataRm\Proxy\Entity;

use YukataRm\Laravel\Interface\Log\LoggerInterface;
use YukataRm\Laravel\Facade\Log;
use YukataRm\Enum\Log\LogFormatEnum;

/**
 * Logging HTTP Middleware
 *
 * @package YukataRm\Laravel\Http\Middleware
 */
abstract class LoggingHttp extends BaseMiddleware
{
    /**
     * Timer instance
     *
     * @var \YukataRm\Interface\Time\TimerInterface
     */
    protected TimerInterface $timer;

    /**
     * run the middleware handle
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function runHandle(): Response
    {
        $this->timer = Time::start();

        return $this->next();
    }

    /**
     * whether run middleware handle
     *
     * @return bool
     */
    #[\Override]
    protected function isRunHandle(): bool
    {
        if(!$this->isEnable()) return false;

        // 除外するURLの正規表現の配列
        $ignoreRegex = $this->ignores();

        // 除外するURLの正規表現がない場合は実行
        if (empty($ignoreRegex)) return true;

        // 現在のURL
        $currentUrl = $this->request->getRequestUri();

        // 除外するURLの正規表現がある場合は実行
        foreach ($ignoreRegex as $regex) {
            if (preg_match($regex, $currentUrl)) return false;
        }

        return true;
    }

    /**
     * ignore regex
     *
     * @return array<string>
     */
    abstract protected function ignores(): array;

    /**
     * run the middleware terminate
     *
     * @return void
     */
    #[\Override]
    protected function runTerminate(): void
    {
        if (!$this->isEnable()) return;

        $this->timer->stop();

        $contents = $this->contents();

        $removed = Entity::removeRecursive(
            $contents,
            $this->removeParameters()
        );

        $masked = Entity::maskingRecursive(
            $removed,
            $this->maskingParameters(),
            $this->maskingText()
        );

        $this->logging($masked);
    }

    /**
     * remove parameters
     *
     * @return array<string>
     */
    abstract protected function removeParameters(): array;

    /**
     * masking parameters
     *
     * @return array<string>
     */
    abstract protected function maskingParameters(): array;

    /**
     * masking text
     *
     * @return string
     */
    abstract protected function maskingText(): string;

    /**
     * whether run middleware terminate
     *
     * @return bool
     */
    #[\Override]
    protected function isRunTerminate(): bool
    {
        return $this->isEnable();
    }

    /**
     * whether enable
     *
     * @return bool
     */
    protected function isEnable(): bool
    {
        return $this->configEnable();
    }

    /*----------------------------------------*
     * Contents
     *----------------------------------------*/

    /**
     * get contents
     *
     * @return array<string, mixed>
     */
    protected function contents(): array
    {
        return [
            "timestamp"         => $this->timestamp(),
            "memory_peak_usage" => $this->memoryPeakUsage(),
            "execution_time"    => $this->executionTime(),

            "request" => [
                "url"         => $this->requestUrl(),
                "http_method" => $this->requestHttpMethod(),
                "user_agent"  => $this->requestUserAgent(),
                "ip_address"  => $this->requestIpAddress(),
                "body"        => $this->requestBody(),
            ],

            "response" => [
                "status" => $this->responseStatus(),
            ],
        ];
    }

    /**
     * get timestamp
     *
     * @return string
     */
    protected function timestamp(): string
    {
        return date("Y-m-d H:i:s");
    }

    /**
     * get memory peak usage
     *
     * @return int|string
     */
    protected function memoryPeakUsage(): int|string
    {
        return $this->configMemoryPeakUsage() ? memory_get_peak_usage() : "";
    }

    /**
     * get execution time
     *
     * @return float|string
     */
    protected function executionTime(): float|string
    {
        return $this->configExecutionTime() ? $this->timer->elapsedMilliseconds() : "";
    }

    /**
     * get request url
     *
     * @return string
     */
    protected function requestUrl(): string
    {
        return $this->configRequestUrl() ? $this->request->getRequestUri() : "";
    }

    /**
     * get request http method
     *
     * @return string
     */
    protected function requestHttpMethod(): string
    {
        return $this->configRequestHttpMethod() ? $this->request->method() : "";
    }

    /**
     * get request user agent
     *
     * @return string
     */
    protected function requestUserAgent(): string
    {
        return $this->configRequestUserAgent() ? $this->request->userAgent() : "";
    }

    /**
     * get request ip address
     *
     * @return string
     */
    protected function requestIpAddress(): string
    {
        return $this->configRequestIpAddress() ? $this->request->ip() : "";
    }

    /**
     * get request body
     *
     * @return array<string, mixed>
     */
    protected function requestBody(): array
    {
        return $this->configRequestBody() ? $this->request->all() : [];
    }

    /**
     * get response status
     *
     * @return int|string
     */
    protected function responseStatus(): int
    {
        return $this->configResponseStatus() ? $this->response->getStatusCode() : "";
    }

    /*----------------------------------------*
     * Logging
     *----------------------------------------*/

    /**
     * logging
     *
     * @param array<string, mixed> $contents
     * @return void
     */
    protected function logging(array $contents): void
    {
        $logger = $this->logger();

        $logger->add($contents);

        $logger->logging();
    }

    /**
     * get Logger instance
     *
     * @return \YukataRm\Laravel\Interface\Log\LoggerInterface
     */
    protected function logger(): LoggerInterface
    {
        $logger = Log::make()->info();

        $logger->setBaseDirectory($this->configBaseDirectory());

        $logger->setDirectory($this->configDirectory());

        $logger->setFileNameFormat($this->configFileNameFormat());

        $logger->setFileExtension($this->configFileExtension());

        $logger->setFileMode($this->configFileMode());

        if (!is_null($this->configFileOwner())) $logger->setFileOwner($this->configFileOwner());

        if (!is_null($this->configFileGroup())) $logger->setFileGroup($this->configFileGroup());

        $logger->setLogFormat(LogFormatEnum::MESSAGE);

        return $logger;
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
        return config("package.logging.http.{$key}", $default);
    }

    /**
     * get config enable
     *
     * @return bool
     */
    protected function configEnable(): bool
    {
        return $this->config("enable", false);
    }

    /*----------------------------------------*
     * Config - Contents
     *----------------------------------------*/

    /**
     * get contents config
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    protected function contentsConfig(string $key, mixed $default): mixed
    {
        return $this->config("contents.{$key}", $default);
    }

    /**
     * get config memory peak usage
     *
     * @return bool
     */
    protected function configMemoryPeakUsage(): bool
    {
        return $this->contentsConfig("memory_peak_usage", false);
    }

    /**
     * get config execution time
     *
     * @return bool
     */
    protected function configExecutionTime(): bool
    {
        return $this->contentsConfig("execution_time", false);
    }

    /**
     * get config request url
     *
     * @return bool
     */
    protected function configRequestUrl(): bool
    {
        return $this->contentsConfig("request_url", false);
    }

    /**
     * get config request http method
     *
     * @return bool
     */
    protected function configRequestHttpMethod(): bool
    {
        return $this->contentsConfig("request_http_method", false);
    }

    /**
     * get config request user agent
     *
     * @return bool
     */
    protected function configRequestUserAgent(): bool
    {
        return $this->contentsConfig("request_user_agent", false);
    }

    /**
     * get config request ip address
     *
     * @return bool
     */
    protected function configRequestIpAddress(): bool
    {
        return $this->contentsConfig("request_ip_address", false);
    }

    /**
     * get config request body
     *
     * @return bool
     */
    protected function configRequestBody(): bool
    {
        return $this->contentsConfig("request_body", false);
    }

    /**
     * get config response status
     *
     * @return bool
     */
    protected function configResponseStatus(): bool
    {
        return $this->contentsConfig("response_status", false);
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
        return $this->loggingConfig("directory", "http");
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

    /**
     * get config file mode
     *
     * @return int
     */
    protected function configFileMode(): int
    {
        return $this->loggingConfig("file.mode", 0666);
    }

    /**
     * get config file owner
     *
     * @return string|null
     */
    protected function configFileOwner(): string|null
    {
        return $this->loggingConfig("file.owner", null);
    }

    /**
     * get config file group
     *
     * @return string|null
     */
    protected function configFileGroup(): string|null
    {
        return $this->loggingConfig("file.group", null);
    }
}
