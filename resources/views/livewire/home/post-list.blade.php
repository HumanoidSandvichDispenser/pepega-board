<div class="post-list">
    <div class="posts">
        @forelse ($posts as $post)
            <livewire:home.post-card :post="$post" is-preview>
            </livewire:home.post-card>
        @empty
            No posts
        @endforelse
    </div>
</div>
