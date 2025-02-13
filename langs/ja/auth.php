<?php

return [
    "login" => [
        "success" => "ログインに成功しました。",
        "failure" => "ログインに失敗しました。",

        "throttle" => [
            "seconds" => "ログイン試行の規定数に達しました。\n:seconds秒後に再度お試しください。",
            "minutes" => "ログイン試行の規定数に達しました。\n:minutes分後に再度お試しください。",
            "hours"   => "ログイン試行の規定数に達しました。\n:hours時間後に再度お試しください。",
            "days"    => "ログイン試行の規定数に達しました。\n:days日後に再度お試しください。",
        ],
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

    "middleware" => [
        "firewall"    => ":ipからのアクセスが拒否されました。",
        "logout-user" => "アプリケーションからログアウトされました。",
    ],

    "title" => [
        "reset-email"       => "メールアドレス変更",
        "reset-email-token" => "メールアドレス変更トークン",
        "reset-password"    => "パスワード変更",
        "forgot-password"   => "パスワードを忘れた",
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
        "login"          => "ログイン",
        "logout"         => "ログアウト",
        "reset-email"    => "メールアドレス変更",
        "reset-password" => "パスワード変更",
        "send"           => "送信",
    ],
];
