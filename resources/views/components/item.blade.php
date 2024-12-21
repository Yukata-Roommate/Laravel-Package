<div {{ $attributes->merge($merge) }}>
    <div class="mb-3">
        <p class="{{ $titleClass }}">
            {{ $title }}
        </p>
    </div>

    <div class="m-0">
        {{ $slot }}
    </div>
</div>
