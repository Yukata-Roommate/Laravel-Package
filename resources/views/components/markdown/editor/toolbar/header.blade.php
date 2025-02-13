<div class="toolbar-header">
    <label class="toolbar-header__title" for="{{ $id }}">{{ $label }}</label>

    <div class="toolbar-header__buttons">
        <button type="button" class="toolbar-header__button markdown-command-button"
            data-target="toolbar-accordion-{{ $id }}">
            <i class="bi bi-command"></i>
        </button>

        <button type="button" class="toolbar-header__button markdown-preview-button" data-target="{{ $id }}">
            <i class="bi bi-eye"></i>
        </button>
    </div>
</div>
