<x-yukata-rm::layout.auth :card-title="__('yukata-rm::auth.title.reset-email-token')" :action="route('auth.reset-email-token.handle')">
    <x-yukata-rm::form.input id="token" name="token" :label="__('yukata-rm::auth.item.token')" :value="old('token')" />

    <x-slot name="footer">
        <x-yukata-rm::button color="primary" :outline="true" :block="true" type="submit" class="w-100">
            {{ __('yukata-rm::auth.button.reset-email') }}
        </x-yukata-rm::button>
    </x-slot>
</x-yukata-rm::layout.auth>
