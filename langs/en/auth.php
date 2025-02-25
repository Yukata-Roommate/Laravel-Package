<?php

return [
    "login" => [
        "success" => "You have successfully logged in.",
        "failure" => "Login failed.",
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

            "message" => [
                "remarks" => "You have requested to reset your email address.\nPlease enter your token in the form to complete the reset process.\nIf the expiration date has passed, please start over again.",
                "expired" => "Expired At",
                "token"   => "Token",
            ],
        ],
    ],

    "forgot-password" => [
        "success" => [
            "send-mail" => "Password reset email sent.",
            "reset"     => "You have successfully reset your password.",
        ],

        "failure" => [
            "issue-token"   => "Failed to issue password reset token.",
            "send-mail"     => "Failed to send password reset email.",
            "find-token"    => "Failed to find password reset token.",
            "expired-token" => "Password reset token has expired.",
        ],

        "email" => [
            "subject" => "Forgot Password",

            "message" => [
                "remarks" => "You have requested to reset your password.\nPlease enter your token in the form to complete the reset process.\nIf the expiration date has passed, please start over again.",
                "expired" => "Expired At",
                "token"   => "Token",
            ],
        ],
    ],

    "rate-limit" => [
        "seconds" => "You have reached the maximum number of attempts.\nPlease try again in :seconds seconds.",
        "minutes" => "You have reached the maximum number of attempts.\nPlease try again in :minutes minutes.",
        "hours"   => "You have reached the maximum number of attempts.\nPlease try again in :hours hours.",
        "days"    => "You have reached the maximum number of attempts.\nPlease try again in :days days.",
    ],

    "middleware" => [
        "firewall"    => "Access from :ip is denied.",
        "logout-user" => "You have been logged out from the application.",
    ],

    "title" => [
        "reset-email"           => "Reset Email",
        "reset-email-token"     => "Reset Email",
        "reset-password"        => "Reset Password",
        "forgot-password"       => "Forgot Password",
        "forgot-password-token" => "Forgot Password",
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
        "login"           => "Login",
        "logout"          => "Logout",
        "reset-email"     => "Reset Email",
        "reset-password"  => "Reset Password",
        "forgot-password" => "Forgot Password",
        "send"            => "Send",
    ],
];
