<li class="{{ $itemClass }}">
    @empty($url)
        <span class="page-link text-center">{{ $label }}</span>
    @else
        <a class="page-link text-center" href="{{ $url }}">{{ $label }}</a>
    @endempty
</li>
