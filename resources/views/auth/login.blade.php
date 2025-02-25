<x-yukata-rm::layout.auth :card-title="config('app.name')" :action="route('auth.login.handle')">
    <x-yukata-rm::form.input id="email" name="email" type="email" :label="__('yukata-rm::auth.item.email')" :value="old('email')" />

    <x-yukata-rm::form.input id="password" name="password" type="password" :label="__('yukata-rm::auth.item.password')" :value="old('password')" />

    <x-yukata-rm::form.checkbox id="remember" name="remember" :label="__('yukata-rm::auth.item.remember')" value="1" :checked="old('remember', 0) === 1"
        :is-inline="true" />

    <x-slot name="footer">
        <x-yukata-rm::button color="primary" :outline="true" :block="true" type="submit" class="w-100">
            {{ __('yukata-rm::auth.button.login') }}
        </x-yukata-rm::button>

        <x-yukata-rm::border />

        <x-yukata-rm::button.link color="light" :block="true" :href="route('auth.forgot-password.handle')">
            {{ __('yukata-rm::auth.button.forgot-password') }}
        </x-yukata-rm::button.link>
    </x-slot>
</x-yukata-rm::layout.auth>
