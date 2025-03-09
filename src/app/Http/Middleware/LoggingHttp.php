<?php

namespace YukataRm\Laravel\Http\Middleware;

use YukataRm\Laravel\Middleware\BaseMiddleware;
use Symfony\Component\HttpFoundation\Response;

use YukataRm\Time\Interfaces\TimerInterface;
use YukataRm\Time\Proxies\Time;

use YukataRm\Entity\Proxies\Entity;

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
    /*----------------------------------------*
     * Handle
     *----------------------------------------*/

    /**
     * whether run middleware handle
     *
     * @return bool
     */
    #[\Override]
    protected function isRunHandle(): bool
    {
        if (!$this->isEnable()) return false;

        $ignoreRegex = $this->ignores();

        if (empty($ignoreRegex)) return true;

        $currentUrl = $this->request->path();

        foreach ($ignoreRegex as $regex) {
            if (preg_match($regex, $currentUrl)) return false;
        }

        return true;
    }

    /**
     * run the middleware handle
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function runHandle(): Response
    {
        $this->timerStart();

        return $this->next();
    }

    /*----------------------------------------*
     * Terminate
     *----------------------------------------*/

    /**
     * whether run middleware terminate
     *
     * @return bool
     */
    #[\Override]
    protected function isRunTerminate(): bool
    {
        return $this->isEnable() && isset($this->timer);
    }

    /**
     * run the middleware terminate
     *
     * @return void
     */
    #[\Override]
    protected function runTerminate(): void
    {
        $this->timerStop();

        $this->logging(
            $this->maskingRecursive(
                $this->removeRecursive(
                    $this->contents()
                )
            )
        );
    }

    /*----------------------------------------*
     * Enable
     *----------------------------------------*/

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
     * Ignore URL
     *----------------------------------------*/

    /**
     * ignore regex
     *
     * @var array<string>
     */
    protected array $ignores = [
        "/^_debugbar/",
        "/^api/",
    ];

    /**
     * ignore regex
     *
     * @return array<string>
     */
    protected function ignores(): array
    {
        return $this->ignores;
    }

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
     * Remove Parameters
     *----------------------------------------*/

    /**
     * remove parameters
     *
     * @var array<string>
     */
    protected array $removeParameters = [
        "_token",
        "_method",
    ];

    /**
     * remove parameters
     *
     * @return array<string>
     */
    protected function removeParameters(): array
    {
        return $this->removeParameters;
    }

    /**
     * remove parameters recursive
     *
     * @param array<string, mixed> $contents
     * @return array<string>
     */
    protected function removeRecursive(array $contents): array
    {
        return Entity::removeRecursive(
            $contents,
            $this->removeParameters()
        );
    }

    /*----------------------------------------*
     * Masking Parameters
     *----------------------------------------*/

    /**
     * masking parameters
     *
     * @var array<string>
     */
    protected array $maskingParameters = [
        "password",
        "password_confirmation",
        "current_password",
        "current_password_confirmation",
        "new_password",
        "new_password_confirmation",
        "old_password",
        "old_password_confirmation",

        "token",
        "api_token",
        "access_token",
        "refresh_token",

        "client_id",
        "client_secret",
        "client_token",

        "secret",
        "secret_key",
        "secret_token",
    ];

    /**
     * masking text
     *
     * @var string
     */
    protected string $maskingText = "********";

    /**
     * masking parameters
     *
     * @return array<string>
     */
    protected function maskingParameters(): array
    {
        return $this->maskingParameters;
    }

    /**
     * masking text
     *
     * @return string
     */
    protected function maskingText(): string
    {
        return $this->maskingText;
    }

    /**
     * masking parameters recursive
     *
     * @param array<string, mixed> $contents
     * @return array<string>
     */
    protected function maskingRecursive(array $contents): array
    {
        return Entity::maskingRecursive(
            $contents,
            $this->maskingParameters(),
            $this->maskingText()
        );
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
                "url"             => $this->requestUrl(),
                "http_method"     => $this->requestHttpMethod(),
                "user_agent"      => $this->requestUserAgent(),
                "ip_address"      => $this->requestIpAddress(),
                "x_forwarded_for" => $this->requestXForwardedFor(),
                "body"            => $this->requestBody(),
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
        if (!$this->configRequestUrl()) return "";

        try {
            return $this->request->getPathInfo();
        } catch (\Throwable $e) {
            return "";
        }
    }

    /**
     * get request http method
     *
     * @return string
     */
    protected function requestHttpMethod(): string
    {
        if (!$this->configRequestHttpMethod()) return "";

        try {
            return $this->request->method();
        } catch (\Throwable $e) {
            return "";
        }
    }

    /**
     * get request user agent
     *
     * @return string
     */
    protected function requestUserAgent(): string
    {
        if (!$this->configRequestUserAgent()) return "";

        try {
            return $this->request->userAgent();
        } catch (\Throwable $e) {
            return "";
        }
    }

    /**
     * get request ip address
     *
     * @return string
     */
    protected function requestIpAddress(): string
    {
        if (!$this->configRequestIpAddress()) return "";

        try {
            return $this->request->ip();
        } catch (\Throwable $e) {
            return "";
        }
    }

    /**
     * get request x forwarded for
     *
     * @return array<string>
     */
    protected function requestXForwardedFor(): array
    {
        if (!$this->configRequestIpAddress()) return [];

        try {
            $xForwardedFor = $this->request->header("X-Forwarded-For");

            $xForwardedFors = match (true) {
                is_null($xForwardedFor)   => [],
                is_string($xForwardedFor) => explode(",", $xForwardedFor),
                is_array($xForwardedFor)  => $xForwardedFor,

                default => [],
            };

            return array_map("trim", $xForwardedFors);
        } catch (\Throwable $e) {
            return [];
        }
    }

    /**
     * get request body
     *
     * @return array<string, mixed>
     */
    protected function requestBody(): array
    {
        if (!$this->configRequestBody()) return [];

        try {
            return $this->request->all();
        } catch (\Throwable $e) {
            return [];
        }
    }

    /**
     * get response status
     *
     * @return int|string
     */
    protected function responseStatus(): int|string
    {
        if (!$this->configResponseStatus()) return "";

        try {
            return $this->response->getStatusCode();
        } catch (\Throwable $e) {
            return "";
        }
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
}
