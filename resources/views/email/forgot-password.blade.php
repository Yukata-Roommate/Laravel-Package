<x-yukata-rm::email.template :title="$subject">
    <x-slot name="head">
        <style>
            .messages {
                margin: 0;
                margin-bottom: 1rem;
            }

            .section {
                border-top: 1px solid #ddd;
                border-bottom: 1px solid #ddd;
            }

            .section .expired_at {
                font-size: 1.2em;
                color: #999;
            }

            .section .expired_at span {
                color: #333;
            }

            .section .token {
                font-size: 1.2em;
                color: #999;
            }

            .section .token span {
                color: #333;
            }
        </style>
    </x-slot>

    <p class="messages">
        {!! Text::enl2br($remarksMessage) !!}
    </p>

    <div class="section">
        <p class="expired_at">
            {{ $expiredMessage }}: <span>{{ $passwordResetToken->expired_at->format('Y-m-d H:i:s') }}</span>
        </p>

        <p class="token">
            {{ $tokenMessage }}: <span>{{ $passwordResetToken->token }}</span>
        </p>
    </div>

</x-yukata-rm::email.template>
