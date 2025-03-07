<a {{ $attributes->merge($merge) }}>
    <div class="d-flex justify-content-between mb-3">
        <p class="{{ $titleClass }}">
            {{ $title }}
        </p>

        @isset($header)
            {{ $header }}
        @endisset
    </div>

    <div class="{{ $slotClass }}">
        {{ $slot }}
    </div>
</a>
