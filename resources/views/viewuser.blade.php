<x-app-layout>
    <x-slot name="header">
        <h2>
            {{-- $user->display_name --}}
        </h2>
    </x-slot>
    <x-slot name="sidebar">
        <livewire:profile.user-info :user="$user">
        </livewire:profile.user-info>
    </x-slot>
    <div class="post-list tw-grow">
        @if ($user->id == $currentUser->id)
            <livewire:home.submission-form />
            {{--
              -- TODO: notify user about showing public posts only when they
              -- recently submitted an anonymous post
              --}}
        @endif
        <livewire:home.post-list :posts="$publicPosts" />
    </div>
</x-app-layout>

@once
@push('css')
<style>
.view-user {
    display: flex;
}

.view-user > .sidebar {
    max-width: 256px;
}

.view-user > .post-list {
    flex-grow: 1;
}
</style>
@endpush
@endonce
