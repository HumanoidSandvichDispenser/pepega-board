<x-base-card>
    <p>
        {{ $comment->content }}
    </p>

    <x-slot:footer>
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
    </x-slot:footer>
</x-base-card>
