<div class="post-list">
    <livewire:home.submission-form>
    </livewire:home.submission-form>
    <div class="posts">
        @forelse ($posts as $post)
            <livewire:home.post-card :post="$post" is-preview>
            </livewire:home.post-card>
        @empty
            No posts
        @endforelse
    </div>
</div>

@once
@push('css')
<style>
.post-list > .posts {
    margin-top: 4px;
    display: flex;
    gap: 4px;
    flex-direction: column;
}
</style>
@endpush
@endonce
