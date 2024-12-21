<div {{ $attributes->merge($merge) }}>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                @isset($title)
                    <x-yukata-rm::modal.title :title="$title" />
                @endisset

                @isset($header)
                    {{ $header }}
                @endisset
            </div>

            <div class="modal-body">
                {{ $slot }}
            </div>

            @isset($footer)
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            @endisset
        </div>
    </div>
</div>
