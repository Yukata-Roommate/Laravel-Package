<li class="{{ $itemClass }}">
    @empty($url)
        <span class="page-link text-center">{{ $slot }}</span>
    @else
        <a class="page-link text-center" href="{{ $url }}">{{ $slot }}</a>
    @endempty
</li>
