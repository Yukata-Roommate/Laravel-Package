<?php

return [
    /*========================================*
     * Command
     *========================================*/

    "command" => [
        "logging" => [
            "enable"         => env("YR_COMMAND_LOGGING_ENABLE", false),
            "base_directory" => env("YR_COMMAND_LOGGING_BASE_DIRECTORY", storage_path("logs")),
            "directory"      => env("YR_COMMAND_LOGGING_DIRECTORY", "command"),
            "file"           => [
                "name_format" => env("YR_COMMAND_LOGGING_FILE_NAME_FORMAT", "Y-m-d"),
                "extension"   => env("YR_COMMAND_LOGGING_FILE_EXTENSION", "log"),
            ],
        ],
    ],

    /*========================================*
     * Exception
     *========================================*/

    "exception" => [
        "logging" => [
            "enable" => env("YR_EXCEPTION_LOGGING_ENABLE", false),

            "base_directory" => env("YR_EXCEPTION_LOGGING_BASE_DIRECTORY", storage_path("logs")),
            "directory"      => env("YR_EXCEPTION_LOGGING_DIRECTORY", "exception"),
            "file"           => [
                "name_format" => env("YR_EXCEPTION_LOGGING_FILE_NAME_FORMAT", "Y-m-d"),
                "extension"   => env("YR_EXCEPTION_LOGGING_FILE_EXTENSION", "log"),
            ],
        ],

        "mailing" => [
            "enable" => env("YR_EXCEPTION_MAILING_ENABLE", false),

            "subject" => env("YR_EXCEPTION_MAILING_SUBJECT", "Exception Occurred"),

            "from" => [
                "address" => env("YR_EXCEPTION_MAILING_FROM_ADDRESS", null),
                "name"    => env("YR_EXCEPTION_MAILING_FROM_NAME", null),
            ],

            "to" => [
                env("YR_EXCEPTION_MAILING_TO_NAME", "") => env("YR_EXCEPTION_MAILING_TO_ADDRESS", ""),
            ],
        ],
    ],

    /*========================================*
     * Log
     *========================================*/

    "log" => [
        "is_rotate"      => env("YR_LOG_IS_ROTATE", true),
        "retention_days" => env("YR_LOG_RETENTION_DAYS", 7),

        "format"      => env("YR_LOG_FORMAT", "[%datetime%] %level%: %message%"),
        "format_json" => env("YR_LOG_FORMAT_JSON", "%datetime%, %level%, %message%"),

        "base_directory" => env("YR_LOG_BASE_DIRECTORY", storage_path("logs")),
        "file"           => [
            "name_format" => env("YR_LOG_FILE_NAME_FORMAT", "Y-m-d"),
            "extension"   => env("YR_LOG_FILE_EXTENSION", "log"),
        ],

        "is_memory_real_usage" => env("YR_LOG_IS_MEMORY_REAL_USAGE", true),
        "is_memory_format"     => env("YR_LOG_IS_MEMORY_FORMAT", true),
        "memory_precision"     => env("YR_LOG_MEMORY_PRECISION", 2),
    ],

    /*========================================*
     * Request
     *========================================*/

    "request" => [
        "unauthorized_message"     => env("YR_REQUEST_UNAUTHORIZED_MESSAGE", ""),
        "unauthorized_message_key" => env("YR_REQUEST_UNAUTHORIZED_MESSAGE_KEY", ""),
    ],

    /*========================================*
     * Logging
     *========================================*/

    "logging" => [
        /*----------------------------------------*
         * HTTP
         *----------------------------------------*/

        "http" => [
            "enable" => env("YR_LOGGING_HTTP_ENABLE", false),

            "contents" => [
                "memory_peak_usage" => env("YR_LOGGING_HTTP_MEMORY_PEAK_USAGE", false),

                "execution_time" => env("YR_LOGGING_HTTP_EXECUTION_TIME", false),

                "request_url"         => env("YR_LOGGING_HTTP_REQUEST_URL", false),
                "request_http_method" => env("YR_LOGGING_HTTP_REQUEST_HTTP_METHOD", false),
                "request_user_agent"  => env("YR_LOGGING_HTTP_REQUEST_USER_AGENT", false),
                "request_ip_address"  => env("YR_LOGGING_HTTP_REQUEST_IP_ADDRESS", false),
                "request_body"        => env("YR_LOGGING_HTTP_REQUEST_BODY", false),

                "response_status" => env("YR_LOGGING_HTTP_RESPONSE_STATUS", false),
            ],

            "logging" => [
                "base_directory" => env("YR_LOGGING_HTTP_BASE_DIRECTORY", storage_path("logs")),
                "directory"      => env("YR_LOGGING_HTTP_DIRECTORY", "http"),
                "file"           => [
                    "name_format" => env("YR_LOGGING_HTTP_FILE_NAME_FORMAT", "Y-m-d"),
                    "extension"   => env("YR_LOGGING_HTTP_FILE_EXTENSION", "log"),
                ],
            ],
        ],

        /*----------------------------------------*
         * Query
         *----------------------------------------*/

        "query" => [
            "enable" => env("YR_LOGGING_QUERY_ENABLE", false),

            "contents" => [
                "slow_time_threshold" => env("YR_LOGGING_QUERY_SLOW_TIME_THRESHOLD", 1000),
            ],

            "logging" => [
                "base_directory" => env("YR_LOGGING_QUERY_BASE_DIRECTORY", storage_path("logs")),
                "directory"      => env("YR_LOGGING_QUERY_DIRECTORY", "query"),
                "file"           => [
                    "name_format" => env("YR_LOGGING_QUERY_FILE_NAME_FORMAT", "Y-m-d"),
                    "extension"   => env("YR_LOGGING_QUERY_FILE_EXTENSION", "log"),
                ],
            ],
        ],
    ],

    /*========================================*
     * User
     *========================================*/

    "user" => [
        "name"     => env("YR_USER_NAME", "User"),
        "email"    => env("YR_USER_EMAIL", "test@example.com"),
        "password" => env("YR_USER_PASSWORD", "password"),
    ],
];
