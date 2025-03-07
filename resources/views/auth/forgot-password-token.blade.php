<x-yukata-rm::layout.auth :card-title="__('yukata-rm::auth.title.forgot-password-token')" :action="route('auth.forgot-password-token.handle')">
    <x-yukata-rm::form.input id="token" name="token" :label="__('yukata-rm::auth.item.token')" :value="old('token')" />

    <x-yukata-rm::form.input id="password" name="password" type="password" :label="__('yukata-rm::auth.item.new-password')" />

    <x-yukata-rm::form.input id="password_confirmation" name="password_confirmation" type="password" :label="__('yukata-rm::auth.item.new-password-confirmation')" />

    <x-slot name="footer">
        <x-yukata-rm::button color="primary" :outline="true" :block="true" type="submit" class="w-100">
            {{ __('yukata-rm::auth.button.reset-password') }}
        </x-yukata-rm::button>
    </x-slot>
</x-yukata-rm::layout.auth>
