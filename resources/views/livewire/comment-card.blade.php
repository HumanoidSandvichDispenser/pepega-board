<div class="card">
    <div class="post">
        <div
            class="body"
        >
            <p>
                {{ $comment->content }}
            </p>
        </div>
        <div class="info">
            <i class="left">
                @if ($comment->user == Auth::user())
                    You
                    @if ($comment->is_anonymous)
                        (Anonymous)
                    @endif
                @elseif ($comment->is_anonymous)
                    Anonymous
                @else
                    <a href="/&#64;{{ $comment->user->username }}">
                        {{ $comment->user->display_name }}
                        (&#64;{{ $comment->user->username }})
                    </a>
                @endif
            </i>
            <span class="right">
                @if ($with_reply_button)
                    <a href="/thread/{{ $comment->thread->id }}">
                        @if ($comment->thread->hasUserCommented($user))
                            View thread
                        @else
                            Reply
                        @endif
                    </a>
                @endif
            </span>
        </div>
    </div>
</div>

@once
@push('css')
<style>
.post {
    display: flex;
    flex-direction: column;
    row-gap: 8px;
}

.post p.truncated {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.post p {
    margin: 0;
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
