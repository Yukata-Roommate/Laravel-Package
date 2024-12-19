<div {{ $attributes->merge($merge) }}>
    <p class="{{ $titleClass }}">
        {{ $title }}
    </p>

    <div class="m-0">
        {{ $slot }}
    </div>
</div>
