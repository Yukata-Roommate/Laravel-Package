<div {{ $attributes->merge($merge) }}>
    @if ($showResult)
        <x-yukata-rm::pagination.result :paginator="$paginator" />
    @endif

    @if ($paginator->hasPages())
        <nav class="w-100">
            {{-- Pagination Result --}}

            {{-- Large --}}
            <x-yukata-rm::pagination.large :paginator="$paginator" />

            {{-- Medium --}}
            <x-yukata-rm::pagination.medium :paginator="$paginator" />

            {{-- Small --}}
            <x-yukata-rm::pagination.small :paginator="$paginator" />

            {{-- Extra Small --}}
            <x-yukata-rm::pagination.extra-small :paginator="$paginator" />
        </nav>
    @endif
</div>
