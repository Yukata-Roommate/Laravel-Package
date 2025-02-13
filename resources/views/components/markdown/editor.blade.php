<x-yukata-rm::form.group {{ $attributes->merge($merge) }}>
    <x-yukata-rm::markdown.editor.toolbar :id="$id" :label="$label" />

    <textarea id="{{ $id }}" class="form-control markdown-editor__textarea" rows="{{ $rows }}"
        @required($isRequired)>{{ $value }}</textarea>
</x-yukata-rm::form.group>
