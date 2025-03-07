<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-0">
                        {{ $pageTitle }}
                    </h1>
                </div>

                @isset($breadcrumb)
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            {{ $breadcrumb }}
                        </ol>
                    </div>
                @endisset
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <x-yukata-rm::layout.alerts />

            {{ $slot }}
        </div>
    </div>
</main>
