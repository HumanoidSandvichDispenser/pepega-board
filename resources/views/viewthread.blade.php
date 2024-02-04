<?php

use App\Models\Thread;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

$id = request()->route('id');
$user = User::find(Auth::id());
$thread = Thread::find($id);
$is_user_involved = false;

if ($thread != null) {
    $is_user_involved = $thread->users->find(Auth::id());
}
?>

<x-app-layout>
    <x-slot name="header">
        <h2>
            Comment on Thread
        </h2>
    </x-slot>
    <div>
        @if ($is_user_involved)
            <livewire:home.post-card :post="$thread->post">
            </livewire:home.post-card>
            @foreach ($thread->comments as $comment)
                <livewire:comment-card :comment="$comment" />
            @endforeach
            <div>
                <livewire:viewpost.reply-form
                    :target_post="$thread->post"
                    :target_thread="$thread"
                    :force_unanonymize="!$thread->isUserAnonymous($user)"
                />
            </div>
        @else
            The thread you requested has been deleted or does not exist. Moron
        @endif
    </div>
</x-app-layout>
