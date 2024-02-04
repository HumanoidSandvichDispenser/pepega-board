<form wire:submit="login">
    <div class="spaced">
        <!-- Email Address -->
        <div>
            <label for="username">Username</label>
            <input
                class="tw-w-full"
                wire:model="form.username"
                id="username"
                name="username"
                required autofocus autocomplete="username"
            />
            <x-input-error :messages="$errors->get('username')" />
        </div>

        <!-- Password -->
        <div>
            <label for="password">Password</label>
            <input
                class="tw-w-full"
                wire:model="form.password" id="password"
                type="password"
                name="password"
                required autocomplete="current-password"
            />

            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Remember Me -->
        <div>
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" name="remember">
                <span>Remember me</span>
            </label>
        </div>

        <div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button class="tw-float-right accent">
                Log in
            </button>
        </div>
    </div>
</form>
