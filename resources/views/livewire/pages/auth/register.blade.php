<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $display_name = '';
    public string $username = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'display_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<div class="register">
    <form wire:submit="register">
        <div class="_section">
            <x-input-label for="display_name" :value="__('Display Name')" />
            <x-text-input wire:model="display_name" id="display_name"
                    type="text" name="display_name" required autofocus
                    autocomplete="display_name" />
            <x-input-error :messages="$errors->get('display_name')" />
        </div>

        <div class="_section mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input wire:model="username" id="username" type="text"
                    name="username" required autofocus autocomplete="username"
            />
            <x-input-error :messages="$errors->get('username')" />
        </div>

        <div class="_section mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <input wire:model="email" id="email" type="email"
                name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="_section mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" type="password"
                name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Confirm Password -->
        <div class="_section mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation"
                    id="password_confirmation" type="password"
                    name="password_confirmation" required
                    autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm mr-4" href="{{ route('login') }}"
                    wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button type="submit">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>

@once
@push('css')
<style>
.register {
    margin: 4px;
}

.register > form > ._section input {
    display: block;
    width: 100%;
}
</style>
@endpush
@endonce

{{--
<div>
    <form wire:submit="register">
        <!-- Display Name -->
        <div>
            <x-input-label for="display_name" :value="__('Display Name')" />
            <input wire:model="display_name" id="display_name"
                type="text" name="display_name" required autofocus
                autocomplete="display_name" />
            <x-input-error :messages="$errors->get('display_name')" />
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <input wire:model="username" id="username" type="text"
                name="username" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <input wire:model="email" id="email" type="email"
                name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" type="password"
                name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation"
                id="password_confirmation" type="password"
                name="password_confirmation" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <button type="submit">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</div>
--}}
