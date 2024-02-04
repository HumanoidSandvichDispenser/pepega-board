<?php

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

$id = request()->route('id');
$post = Post::find($id);
$user = Auth::user();
$is_you = $post->user->id == $user->id;
$thread = $post->threads()->whereHas('users', function ($query) use ($user) {
    $query->where('user_id', $user->id);
})->first();
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

        @if ($is_you)
        <!-- display all threads/responses -->
        @foreach ($post->threads as $thread)
        <livewire:comment-card
            :comment="$thread->comments->first()"
            with_reply_button
        />
        @endforeach
        @elseif ($thread != null)
        <livewire:comment-card
            :comment="$thread->comments->first()"
            with_reply_button
        />
        @else
        <div>
            <livewire:viewpost.reply-form
                :target_post="$post"
            />
        </div>
        @endif

        @else
            The post you requested has been deleted or does not exist. Idiota
        @endif
    </div>
</x-app-layout>
