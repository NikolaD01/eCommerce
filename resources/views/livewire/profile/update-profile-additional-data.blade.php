<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Additional Data') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account shoping data") }}
        </p>
    </header>

    <form wire:submit="updateUserData" class="mt-6 space-y-6">
        <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input wire:model="city" id="city" name="city" type="text" class="mt-1 block w-full" required autocomplete="address-level2" />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>
        <div>
            <x-input-label for="region" :value="__('Region')" />
            <x-text-input wire:model="region" id="region" name="region" type="text" class="mt-1 block w-full" required autocomplete="address-level1" />
            <x-input-error class="mt-2" :messages="$errors->get('region')" />
        </div>
        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input wire:model="address" id="address" name="address" type="text" class="mt-1 block w-full" required autocomplete="street-address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>
        <div>
            <x-input-label for="post_code" :value="__('Post Code')" />
            <x-text-input wire:model="post_code" id="post_code" name="post_code" type="text" class="mt-1 block w-full" required autocomplete="postal-code" />
            <x-input-error class="mt-2" :messages="$errors->get('post_code')" />
        </div>
        <div>
            <x-input-label for="phone_number" :value="__('Phone number')" />
            <x-text-input wire:model="phone_number" id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" required autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-data-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
