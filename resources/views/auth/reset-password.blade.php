<x-yukata-rm::layout.auth :card-title="__('yukata-rm::auth.title.reset-password')" :action="route('auth.reset-password.handle')">
    <x-yukata-rm::form.input id="currentPassword" name="current_password" type="password" :label="__('yukata-rm::auth.item.current-password')"
        :value="old('current_password')" />

    <x-yukata-rm::form.input id="newPassword" name="password" type="password" :label="__('yukata-rm::auth.item.new-password')" :value="old('password')" />

    <x-yukata-rm::form.input id="newPasswordConfirmation" name="password_confirmation" type="password" :label="__('yukata-rm::auth.item.new-password-confirmation')"
        :value="old('password_confirmation')" />

    <x-slot name="footer">
        <x-yukata-rm::button color="primary" :outline="true" :block="true" type="submit" class="w-100">
            {{ __('yukata-rm::auth.button.reset-password') }}
        </x-yukata-rm::button>
    </x-slot>
</x-yukata-rm::layout.auth>
