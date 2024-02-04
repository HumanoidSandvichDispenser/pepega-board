<?php
// vim: ft=php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public string $display_name = '';
    public string $username = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->display_name = Auth::user()->display_name;
        $this->username = Auth::user()->username;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'display_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $path = session('url.intended', RouteServiceProvider::HOME);

            $this->redirect($path);

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <div class="spaced">
            <div>
                <label for="display_name">Display Name</label>
                <input wire:model="display_name" id="display_name"
                    name="display_name" type="text" required
                    autofocus
                />
                <x-input-error class="mt-2" :messages="$errors->get('display_name')" />
            </div>

            <div>
                <label for="email">Email</label>
                <input
                    wire:model="email" id="email" name="email" type="email"
                    required autocomplete="username"
                />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if (auth()->user() instanceof
                        \Illuminate\Contracts\Auth\MustVerifyEmail &&
                        !auth()->user()->hasVerifiedEmail())
                    <div>
                        <p>
                            Your email address is unverified.

                            <button wire:click.prevent="sendVerification">
                                Click here to resend verification email.
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p>
                                A new verification has been sent to your email.
                            </p>
                        @endif
                    </div>
                @endif
            </div>

        </div>
        <div class="tw-mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
