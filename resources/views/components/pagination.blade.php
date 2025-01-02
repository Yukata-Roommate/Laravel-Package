@if ($paginator->hasPages())
    <nav {{ $attributes->merge($merge) }}>
        {{-- Pagination Result --}}
        <x-yukata-rm::pagination.result :paginator="$paginator" />

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
