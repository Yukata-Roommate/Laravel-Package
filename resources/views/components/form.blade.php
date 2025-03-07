<form {{ $attributes->merge($merge) }}>
    @if ($csrf)
        @csrf
    @endif

    @if (!$isMethodCompatible)
        @method($method)
    @endif

    {{ $slot }}
</form>
