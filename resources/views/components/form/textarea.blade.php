<x-yukata-rm::form.group>
    <label for="{{ $id }}">{{ $label }}</label>

    <textarea id="{{ $id }}" {{ $attributes->merge($merge) }} @required($isRequired) @disabled($isDisabled)
        @readonly($isReadonly)>{{ $value }}</textarea>
</x-yukata-rm::form.group>
