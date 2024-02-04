<?php



use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component
{
    public Post $post;
}
?>

<div class="post-container">
    <div class="post">
        <h1>
            <a href="javascript:void(0)">
                {{ $post->title }}
            </a>
        </h1>
        <div>
            {{ $post->content }}
        </div>
        <div class="info">
            <i class="left">
                Posted
                @if ($post->user == Auth::user())
                    by you
                    @if ($post->is_anonymous)
                        anonymously
                    @endif
                @elseif ($post->is_anonymous)
                    anonymously
                @else
                    by
                    <a href="/&#64;{{ $post->user->username }}">
                        {{ $post->user->display_name }}
                        (&#64;{{ $post->user->username }})
                    </a>
                @endif
            </i>
            <span class="right">
                <code>ID #{{ $post->id }}</code>
            </span>
        </div>
    </div>
</div>

@once
@push('css')
<style>
.post-container {
    display: flex;
    flex-direction: column;
    row-gap: 8px;
    background-color: var(--bg0);
    padding: 16px;
    border-radius: 8px;
    border: 1px solid var(--bg2);
}

.post {
    display: flex;
    flex-direction: column;
    row-gap: 8px;
}

.post > h1 {
    font-weight: 600;
    font-size: 1.5em;
    margin: 0;
}

.post > h1 > a, .post .info a {
    color: inherit;
}

.post .info {
    display: flex;
    color: var(--fg1);
}

.post .info > * {
    flex-grow: 1;
}

.post .info .right {
    text-align: right;
}
</style>
@endpush
@endonce
