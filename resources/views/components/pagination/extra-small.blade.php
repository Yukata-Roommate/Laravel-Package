<ul class="pagination justify-content-center mb-0 d-sm-none">
    <x-yukata-rm::pagination.extra-small.item :url="$firstPageUrl" label="first" :disabled="$onFirstPage">
        <i class="bi bi-chevron-double-left"></i>
    </x-yukata-rm::pagination.extra-small.item>

    <x-yukata-rm::pagination.extra-small.item :url="$previousPageUrl" label="previous" :disabled="$onFirstPage">
        <i class="bi bi-chevron-left"></i>
    </x-yukata-rm::pagination.extra-small.item>

    <x-yukata-rm::pagination.extra-small.item :url="$nextPageUrl" label="next" :disabled="$onLastPage">
        <i class="bi bi-chevron-right"></i>
    </x-yukata-rm::pagination.extra-small.item>

    <x-yukata-rm::pagination.extra-small.item :url="$lastPageUrl" label="last" :disabled="$onLastPage">
        <i class="bi bi-chevron-double-right"></i>
    </x-yukata-rm::pagination.extra-small.item>
</ul>
