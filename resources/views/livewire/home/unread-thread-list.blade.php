<div class="thread-list">
    @if ($threads != null)
        @forelse ($threads as $thread)
            <livewire:comment-card
                :comment="$thread->comments->last()"
                show-post
                with-reply-button
            >
            </livewire:comment-card>
        @empty
            <i>You have no unread threads at this time.</i>
        @endforelse
    @endif
</div>
