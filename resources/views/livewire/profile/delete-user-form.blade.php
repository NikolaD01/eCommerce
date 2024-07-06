<?php

use App\Livewire\Actions\Logout;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;
use \Illuminate\Routing\Redirector;

new class extends Component
{
    public string $password = '';
    public int $user_id = 0;

    protected UserService $userService;
    public function mount() : void
    {
        $this->user_id = request()->query('user', 0);
    }
    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout, UserService $userService): Redirector
    {
        $this->userService = $userService;

        if(!$this->user_id ) {
            $this->validate([
                'password' => ['required', 'string', 'current_password'],
            ]);
        }

        if (!$this->user_id ) {
            $user = $this->userService->deleteUser(Auth::user()->id);
            return redirect(route('register'));

        } else {
            $user = $this->userService->deleteUser($this->user_id);
            return redirect(route('users.index'));
        }

    }
}; ?>

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="deleteUser" class="p-6">
            <x-text-input wire:model="user_id" value="{{$user_id}}"  hidden />


            <h2 class="text-lg font-medium text-gray-900">
                {{ $user_id === 0 ? __('Are you sure you want to delete your account?') : __('Are you sure you want to delete this account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ $user_id === 0 ? __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') : __('Once this account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete this account.') }}
            </p>

            @if(!$user_id)
            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    wire:model="password"
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            @endif
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
