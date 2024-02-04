<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component
{
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<section id="update-password-form">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Update Password
        </h2>
    </header>

    <form wire:submit="updatePassword">
        <div class="spaced">
            <div>
                <label for="update_password_current_password">
                    Current Password
                </label>
                <input
                    wire:model="current_password"
                    id="update_password_current_password"
                    name="current_password" type="password"
                    class="mt-1 block w-full" autocomplete="current-password"
                />
                <x-input-error :messages="$errors->get('current_password')" />
            </div>

            <div>
                <label for="update_password_password">
                    New Password
                </label>
                <input
                    wire:model="password" id="update_password_password"
                    name="password" type="password" class="mt-1 block w-full"
                    autocomplete="new-password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <label for="update_password_password_confirmation">
                    Confirm Password
                </label>
                <input
                    wire:model="password_confirmation"
                    id="update_password_password_confirmation"
                    name="password_confirmation" type="password"
                    class="mt-1 block w-full" autocomplete="new-password"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>
        <div class="tw-mt-4">
            <button>Save</button>

            <x-action-message class="me-3" on="password-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>

@once
@push('css')
<style>
</style>
@endpush
@endonce
