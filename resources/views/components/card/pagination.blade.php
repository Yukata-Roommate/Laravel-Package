<x-yukata-rm::card :title="$title" {{ $attributes->merge($merge) }}>
    @isset($cardHeader)
        <x-slot name="header">
            {{ $cardHeader }}
        </x-slot>
    @endisset

    {{ $slot }}

    @isset($tableBody)
        <x-yukata-rm::table :hover="true">
            @isset($tableHeader)
                <x-slot name="header">
                    {{ $tableHeader }}
                </x-slot>
            @endisset

            {{ $tableBody }}
        </x-yukata-rm::table>
    @endisset

    @if ($paginator->hasPages())
        <x-slot name="footer">
            <x-yukata-rm::pagination :paginator="$paginator" />
        </x-slot>
    @endif
</x-yukata-rm::card>
