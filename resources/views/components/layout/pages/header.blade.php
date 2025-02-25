<nav class="app-header navbar navbar-expand bg-body sticky-top">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" data-lte-toggle="sidebar" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown user-menu">
                <a class="nav-link dropdown-toggle cursor-pointer" data-bs-toggle="dropdown">
                    <span class="d-inline">
                        {{ $userName }}
                    </span>
                </a>

                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end" style="width: 350px;">

                    @if ($slot->isNotEmpty())
                        <li class="user-body d-flex flex-column">
                            {{ $slot }}
                        </li>
                    @endif

                    <li class="user-footer d-flex flex-column">
                        <div class="row mb-3">
                            <div class="col-6 text-center pe-1">
                                <x-yukata-rm::button.link color="info" :outline="true" :href="route('auth.reset-email.form')"
                                    :small="true" :block="true">
                                    <i class="bi bi-envelope"></i>

                                    <span class="d-sm-inline-block d-none">
                                        {{ __('yukata-rm::auth.button.reset-email') }}
                                    </span>
                                </x-yukata-rm::button.link>
                            </div>

                            <div class="col-6 text-center ps-1">
                                <x-yukata-rm::button.link color="info" :outline="true" :href="route('auth.reset-password.form')"
                                    :small="true" :block="true">
                                    <i class="bi bi-lock-fill"></i>

                                    <span class="d-sm-inline-block d-none">
                                        {{ __('yukata-rm::auth.button.reset-password') }}
                                    </span>
                                </x-yukata-rm::button.link>
                            </div>
                        </div>

                        <div class="row">
                            <x-yukata-rm::form method="post" :action="route('auth.logout.handle')">
                                <x-yukata-rm::button color="secondary" :outline="true" type="submit" class="w-100">
                                    <i class="bi bi-power"></i>

                                    {{ __('yukata-rm::auth.button.logout') }}
                                </x-yukata-rm::button>
                            </x-yukata-rm::form>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
