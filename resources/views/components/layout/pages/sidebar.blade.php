<aside class="app-sidebar bg-body-secondary shadow overflow-auto" data-bs-theme="dark">
    <div class="sidebar-brand bg-body-secondary sticky-top">
        <a class="brand-link" href="{{ route('home') }}">
            <span class="brand-text fw-light">{{ config('app.name') }}</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
            {{ $slot }}
        </ul>
    </div>
</aside>
