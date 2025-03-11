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
     * Request
     *========================================*/

    "request" => [
        "unauthorized_message"     => env("YR_REQUEST_UNAUTHORIZED_MESSAGE", ""),
        "unauthorized_message_key" => env("YR_REQUEST_UNAUTHORIZED_MESSAGE_KEY", ""),
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
