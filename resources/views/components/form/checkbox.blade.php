<div class="{{ $checkClass }}">
    <input id="{{ $id }}" {{ $attributes->merge($merge) }} @checked($isChecked) @required($isRequired)
        @disabled($isDisabled) />

    <label class="form-check-label" for="{{ $id }}">{{ $label }}</label>
</div>
