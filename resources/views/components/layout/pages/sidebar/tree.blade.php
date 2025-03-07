<li {{ $attributes->merge($merge) }}>
    <a class="{{ $navLinkClass }}">
        <i class="nav-icon bi {{ $icon }}"></i>

        <p>
            {{ $title }}

            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview" style="{{ $navStyle }}">
        {{ $slot }}
    </ul>
</li>
