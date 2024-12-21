<li {{ $attributes->merge($merge) }}>
    <a class="{{ $navLinkClass }}" href="{{ $href }}">
        <i class="nav-icon bi {{ $icon }}"></i>

        <p>{{ $title }}</p>
    </a>
</li>
