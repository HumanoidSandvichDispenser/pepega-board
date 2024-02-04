<div class="thread-list">
    @if ($threads != null)
        @forelse ($threads as $thread)
            <livewire:comment-card
                :comment="$thread->comments->last()"
                with_reply_button
            />
        @empty
            <i>You have no unread threads at this time.</i>
        @endforelse
    @endif
</div>
