<?php

return [
    "login" => [
        "success" => "You have successfully logged in.",
        "failure" => "Login failed.",

        "throttle" => [
            "seconds" => "You have reached the maximum number of login attempts.\nPlease try again in :seconds seconds.",
            "minutes" => "You have reached the maximum number of login attempts.\nPlease try again in :minutes minutes.",
            "hours"   => "You have reached the maximum number of login attempts.\nPlease try again in :hours hours.",
            "days"    => "You have reached the maximum number of login attempts.\nPlease try again in :days days.",
        ],
    ],

    "logout" => [
        "success" => "You have successfully logged out.",
    ],

    "reset-password" => [
        "success" => "You have successfully reset your password.",
        "failure" => "Failed to reset password.",
    ],

    "reset-email" => [
        "success" => [
            "send-mail" => "Reset email sent.",
            "reset"     => "You have successfully reset your email address.",
        ],

        "failure" => [
            "issue-token"   => "Failed to issue reset email token.",
            "send-mail"     => "Failed to send reset email.",
            "find-token"    => "Failed to find reset email token.",
            "expired-token" => "Reset email token has expired.",
            "reset"         => "Failed to reset email address.",
        ],

        "email" => [
            "subject" => "Reset Email",
        ],
    ],

    "middleware" => [
        "firewall"    => "Access from :ip is denied.",
        "logout-user" => "You have been logged out from the application.",
    ],

    "title" => [
        "reset-email"       => "Reset Email",
        "reset-email-token" => "Reset Email Token",
        "reset-password"    => "Reset Password",
        "forgot-password"   => "Forgot Password",
    ],

    "item" => [
        "email"                     => "Email Address",
        "new-email"                 => "New Email Address",
        "password"                  => "Password",
        "password-confirmation"     => "Password (Confirmation)",
        "current-password"          => "Current Password",
        "new-password"              => "New Password",
        "new-password-confirmation" => "New Password (Confirmation)",
        "remember"                  => "Remember Me",
        "token"                     => "Token",
    ],

    "button" => [
        "login"          => "Login",
        "logout"         => "Logout",
        "reset-email"    => "Reset Email",
        "reset-password" => "Reset Password",
        "send"           => "Send",
    ],
];