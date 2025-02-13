<div class="markdown-editor__toolbar">
    <x-yukata-rm::markdown.editor.toolbar.header :id="$id" :label="$label" />

    <div class="toolbar-accordion" id="toolbar-accordion-{{ $id }}">
        <div class="item">
            <p class="item__header">
                <button class="item__button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#toolbar-accordion-{{ $id }}-heading" aria-expanded="false"
                    aria-controls="toolbar-accordion-{{ $id }}-heading">
                    Heading
                </button>
            </p>

            <div id="toolbar-accordion-{{ $id }}-heading" class="accordion-collapse collapse"
                data-bs-parent="#toolbar-accordion-{{ $id }}">
                <div class="accordion-body d-flex justify-content-between">
                    <button type="button" class="btn btn-sm btn-outline-primary markdown-function-h1-button" data-target="{{ $id }}">
                        <i class="bi bi-type-h1"></i>
                    </button>

                    <button type="button" class="btn btn-sm btn-outline-primary markdown-function-h2-button" data-target="{{ $id }}">
                        <i class="bi bi-type-h2"></i>
                    </button>

                    <button type="button" class="btn btn-sm btn-outline-primary markdown-function-h3-button" data-target="{{ $id }}">
                        <i class="bi bi-type-h3"></i>
                    </button>

                    <button type="button" class="btn btn-sm btn-outline-primary markdown-function-h4-button" data-target="{{ $id }}">
                        <i class="bi bi-type-h4"></i>
                    </button>

                    <button type="button" class="btn btn-sm btn-outline-primary markdown-function-h5-button" data-target="{{ $id }}">
                        <i class="bi bi-type-h5"></i>
                    </button>

                    <button type="button" class="btn btn-sm btn-outline-primary markdown-function-h6-button" data-target="{{ $id }}">
                        <i class="bi bi-type-h6"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
