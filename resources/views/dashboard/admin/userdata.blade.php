<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-4 align-middle">
            <h2 class="font-semibold text-xl text-gray-800 leading-loose	">
                {{ __('Users') }}
            </h2>
            <livewire:dashboard.admin.export.users-export />
        </div>
    </x-slot>
    <livewire:dashboard.admin.users.users-data-list />
</x-app-layout>
