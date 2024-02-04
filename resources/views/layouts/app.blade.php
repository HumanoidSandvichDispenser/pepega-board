<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div>
            <!--livewire:layout.navigation /-->

            <!-- Page Heading -->
            @if (isset($header))
                <header id="top-header">
                    <div class="tw-flex tw-w-full">
                        <span class="tw-grow tw-float-left">
                            <span>
                                <h2 class="tw-font-normal">
                                    <a href="/" class="color-inherit">
                                        Pepegaboard
                                    </a>
                                </h2>
                            </span>
                            <span>
                                {{ $header }}
                            </span>
                        </span>
                        <span class="tw-grow tw-float-right tw-text-right">
                            @guest
                                <a href="/login">
                                    <button class="link">
                                        Login
                                    </button>
                                </a>
                                <a href="/register">
                                    <button class="link accent">
                                        Register
                                    </button>
                                </a>
                            @endguest
                            @auth
                                <a class="tw-text-inherit" href="/profile">
                                    {{ Auth::user()->display_name }}
                                </a>
                            @endauth
                        </span>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
    @stack('css')
</html>
