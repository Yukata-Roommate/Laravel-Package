<x-yukata-rm::card {{ $attributes->merge($merge) }}>
    <x-slot name="header">
        <x-yukata-rm::nav.items class="card-header-tabs">
            {{ $items }}
        </x-yukata-rm::nav.items>
    </x-slot>

    <x-yukata-rm::nav.contents>
        {{ $contents }}
    </x-yukata-rm::nav.contents>
</x-yukata-rm::card>
