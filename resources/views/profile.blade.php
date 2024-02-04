<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div>
            <div>
                <div>
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div>
                <div>
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div>
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
