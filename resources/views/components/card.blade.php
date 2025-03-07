<div class="row mb-3">
    <div class="col-12">
        <div {{ $attributes->merge($merge) }}>
            @if (isset($header) || isset($title))
                <div class="card-header">
                    @isset($title)
                        <p class="fs-5 float-start m-0">
                            {{ $title }}
                        </p>
                    @endisset

                    @isset($header)
                        {{ $header }}
                    @endisset
                </div>
            @endif

            @if ($slot->isNotEmpty())
                <div class="card-body">
                    {{ $slot }}
                </div>
            @endif

            @isset($footer)
                <div class="card-footer">
                    {{ $footer }}
                </div>
            @endisset
        </div>
    </div>
</div>
