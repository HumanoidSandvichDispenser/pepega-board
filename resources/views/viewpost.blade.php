<?php

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

$id = request()->route('id');
$post = Post::find($id);
$user = Auth::user();

$findUser = function ($query) use ($user) {
    $query->where('user_id', $user->id);
};

$is_you = false;
$thread = null;
if ($user != null) {
    $is_you = $post->user->id == $user->id;
    $thread = $post->threads()->whereHas('users', $findUser)->first();
}

?>

<x-app-layout>
    <x-slot name="header">
        <h2>
            Post #{{ $id }} - {{ $post->title }}
        </h2>
    </x-slot>
    <div>
        @if ($post != null)
            <livewire:home.post-card :post="$post">
            </livewire:home.post-card>

            @auth
                @if ($is_you)
                    <!-- display all threads/responses -->
                    @foreach ($post->threads as $thread)
                        <div class="tw-px-4">
                            <livewire:comment-card
                                :comment="$thread->comments->first()"
                                with-reply-button
                            />
                        </div>
                    @endforeach
                @elseif ($thread != null)
                    <div class="tw-px-4">
                        <livewire:comment-card
                            :comment="$thread->comments->first()"
                            with-reply-button
                        />
                    </div>
                @else
                    <div>
                        <livewire:viewpost.reply-form
                            :target_post="$post"
                        />
                    </div>
                @endif
            @endauth
        @else
            The post you requested has been deleted or does not exist. Idiota
        @endif
        @guest
        <div class="tw-m-4">
            <a href="/login">Log in</a> or <a href="/register">register</a>
            to respond.
        </div>
        @endguest
    </div>
</x-app-layout>
