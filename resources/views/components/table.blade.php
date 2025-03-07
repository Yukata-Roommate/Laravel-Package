<table {{ $attributes->merge($merge) }}>
    @isset($header)
        <thead>
            {{ $header }}
        </thead>
    @endisset

    <tbody>
        {{ $slot }}
    </tbody>
</table>
