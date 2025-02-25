<x-yukata-rm::form.group>
    <label for="{{ $id }}">{{ $label }}</label>

    <input id="{{ $id }}" {{ $attributes->merge($merge) }} @required($isRequired) @disabled($isDisabled)
        @readonly($isReadonly) />
</x-yukata-rm::form.group>
