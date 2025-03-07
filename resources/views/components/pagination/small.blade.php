<ul class="pagination justify-content-center mb-0 d-none d-sm-flex d-md-none">
    @foreach ($links as $link)
        @continue($loop->first || $loop->last)

        <x-yukata-rm::pagination.small.item :link="$link" />
    @endforeach
</ul>
