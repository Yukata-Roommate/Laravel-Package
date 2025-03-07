<div {{ $attributes->merge($merge) }}>
    <x-yukata-rm::nav.items :class="$itemsClass">
        {{ $items }}
    </x-yukata-rm::nav.items>

    <x-yukata-rm::nav.contents :class="$contentsClass">
        {{ $contents }}
    </x-yukata-rm::nav.contents>
</div>
