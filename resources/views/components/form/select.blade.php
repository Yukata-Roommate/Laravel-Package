<x-yukata-rm::form.group>
    <label for="{{ $id }}">{{ $label }}</label>

    <select id="{{ $id }}" aria-label="{{ $label }}" {{ $attributes->merge($merge) }} @required($isRequired)
        @disabled($isDisabled) @readonly($isReadonly)>
        {{ $slot }}
    </select>
</x-yukata-rm::form.group>
