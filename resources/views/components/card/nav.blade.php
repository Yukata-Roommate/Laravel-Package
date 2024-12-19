<div class="row mb-3">
    <div class="col-12">
        <div {{ $attributes->merge($merge) }}>
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs text-center" role="tablist">
                    {{ $items }}
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    {{ $contents }}
                </div>
            </div>
        </div>
    </div>
</div>
