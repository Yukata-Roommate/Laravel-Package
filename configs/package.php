<?php

return [
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
