<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a class="brand-link" href="{{ route('home') }}">
            <span class="brand-text fw-light">{{ config('app.name') }}</span>
        </a>
    </div>

    <div class="sidebar-wrapper" data-overlayscrollbars="host">
        <div data-overlayscrollbars-viewport="scrollbarHidden">
            <nav class="mt-2">
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                    data-accordion="false">
                    {{ $slot }}
                </ul>
            </nav>
        </div>
    </div>
</aside>
