<?php

return [
    "login" => [
        "success" => "ログインに成功しました。",
        "failure" => "ログインに失敗しました。",
    ],

    "logout" => [
        "success" => "ログアウトに成功しました。",
    ],

    "reset-password" => [
        "success" => "パスワードのリセットに成功しました。",
        "failure" => "パスワードのリセットに失敗しました。",
    ],

    "reset-email" => [
        "success" => [
            "send-mail" => "メールアドレスのリセットメールを送信しました。",
            "reset"     => "メールアドレスのリセットに成功しました。",
        ],

        "failure" => [
            "issue-token"   => "メールアドレスのリセットトークンの発行に失敗しました。",
            "send-mail"     => "メールアドレスのリセットメールの送信に失敗しました。",
            "find-token"    => "メールアドレスのリセットトークンの取得に失敗しました。",
            "expired-token" => "メールアドレスのリセットトークンが期限切れです。",
            "reset"         => "メールアドレスのリセットに失敗しました。",
        ],

        "email" => [
            "subject" => "Reset Email",

            "message" => [
                "remarks" => "メールアドレスのリセットを要求されました。\nトークンをフォームに入力し、リセット処理を完了してください。\n有効期限を過ぎた場合はもう一度最初からやり直してください。",
                "expired" => "有効期限",
                "token"   => "トークン",
            ],
        ],
    ],

    "forgot-password" => [
        "success" => [
            "send-mail" => "パスワードリセットメールを送信しました。",
            "reset"     => "パスワードのリセットに成功しました。",
        ],

        "failure" => [
            "issue-token"   => "パスワードリセットトークンの発行に失敗しました。",
            "send-mail"     => "パスワードリセットメールの送信に失敗しました。",
            "find-token"    => "パスワードリセットトークンの取得に失敗しました。",
            "expired-token" => "パスワードリセットトークンが期限切れです。",
        ],

        "email" => [
            "subject" => "Forgot Password",

            "message" => [
                "remarks" => "パスワードのリセットを要求されました。\nトークンをフォームに入力し、リセット処理を完了してください。\n有効期限を過ぎた場合はもう一度最初からやり直してください。",
                "expired" => "有効期限",
                "token"   => "トークン",
            ],
        ],
    ],

    "rate-limit" => [
        "seconds" => "試行回数が上限に達しました。\n:seconds秒後に再度お試しください。",
        "minutes" => "試行回数が上限に達しました。\n:minutes分後に再度お試しください。",
        "hours"   => "試行回数が上限に達しました。\n:hours時間後に再度お試しください。",
        "days"    => "試行回数が上限に達しました。\n:days日後に再度お試しください。",
    ],

    "middleware" => [
        "firewall"    => ":ipからのアクセスが拒否されました。",
        "logout-user" => "アプリケーションからログアウトされました。",
    ],

    "title" => [
        "reset-email"           => "メールアドレス変更",
        "reset-email-token"     => "メールアドレス変更",
        "reset-password"        => "パスワード変更",
        "forgot-password"       => "パスワードリセット",
        "forgot-password-token" => "パスワードリセット",
    ],

    "item" => [
        "email"                     => "メールアドレス",
        "new-email"                 => "新しいメールアドレス",
        "password"                  => "パスワード",
        "password-confirmation"     => "パスワード (確認)",
        "current-password"          => "現在のパスワード",
        "new-password"              => "新しいパスワード",
        "new-password-confirmation" => "新しいパスワード (確認)",
        "remember"                  => "ログイン状態を保持する",
        "token"                     => "トークン",
    ],

    "button" => [
        "login"           => "ログイン",
        "logout"          => "ログアウト",
        "reset-email"     => "メールアドレス変更",
        "reset-password"  => "パスワード変更",
        "forgot-password" => "パスワードを忘れた",
        "send"            => "送信",
    ],
];
