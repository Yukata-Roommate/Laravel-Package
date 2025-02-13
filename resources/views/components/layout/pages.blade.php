<x-yukata-rm::layout.master :title="$pageTitle" class="layout-fixed sidebar-expand-lg bg-body-tertiary app-loaded"
    :no-index="$noIndex">
    @isset($head)
        <x-slot name="head">
            {{ $head }}
        </x-slot>
    @endisset

    <div {{ $attributes->merge($merge) }}>
        <x-yukata-rm::layout.pages.header>
            {{ $header }}
        </x-yukata-rm::layout.pages.header>

        <x-yukata-rm::layout.pages.sidebar>
            {{ $sidebar }}
        </x-yukata-rm::layout.pages.sidebar>

        <x-yukata-rm::layout.pages.app :page-title="$pageTitle">
            @isset($breadcrumb)
                <x-slot name="breadcrumb">
                    {{ $breadcrumb }}
                </x-slot>
            @endisset

            {{ $slot }}
        </x-yukata-rm::layout.pages.app>

        @isset($footer)
            <x-yukata-rm::layout.pages.footer>
                {{ $footer }}
            </x-yukata-rm::layout.pages.footer>
        @endisset
    </div>

    <x-yukata-rm::layout.pages.spinner />

    <x-yukata-rm::layout.pages.modal-area>
        @isset($modal)
            {{ $modal }}
        @endisset
    </x-yukata-rm::layout.pages.modal-area>

    @isset($foot)
        <x-slot name="foot">
            {{ $foot }}
        </x-slot>
    @endisset
</x-yukata-rm::layout.master>
