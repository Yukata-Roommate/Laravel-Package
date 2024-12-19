<div {{ $attributes->merge($merge) }}>
    <div class="d-flex justify-content-between">
        <p class="{{ $titleClass }}">
            {{ $title }}
        </p>

        @isset($right)
            {{ $right }}
        @endisset
    </div>

    {{ $slot }}
</div>
