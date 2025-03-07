<x-yukata-rm::layout.auth :card-title="__('yukata-rm::auth.title.reset-email')" :action="route('auth.reset-email.handle')">
    <x-yukata-rm::form.input id="newEmail" name="email" type="email" :label="__('yukata-rm::auth.item.new-email')" :value="old('email')" />

    <x-slot name="footer">
        <x-yukata-rm::button color="primary" :outline="true" :block="true" type="submit" class="w-100">
            {{ __('yukata-rm::auth.button.send') }}
        </x-yukata-rm::button>
    </x-slot>
</x-yukata-rm::layout.auth>
