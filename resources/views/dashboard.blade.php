<?php
use App\Models\User;
use App\Models\Post;

//$users = User::all();
$posts = Post::all();
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div>
        <div class="mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-main-container class="">
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        {{ $post->title }}
                    @endforeach
                @else
                    No posts.
                @endif
            </x-main-container>
        </div>
    </div>
</x-app-layout>
