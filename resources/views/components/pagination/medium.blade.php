<ul class="pagination justify-content-center mb-0 d-none d-md-flex d-lg-none">
    @foreach ($links as $link)
        @continue($loop->first || $loop->last)

        <x-yukata-rm::pagination.large.item :link="$link" />
    @endforeach
</ul>