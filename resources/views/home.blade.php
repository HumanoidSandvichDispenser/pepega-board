<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        @auth
            <livewire:home.submission-form>
            </livewire:home.submission-form>
        @endauth
        <livewire:home.post-list></livewire:home.post-list>
        @auth
            <h3>Unread Threads</h3>
            <livewire:home.unread-thread-list />
        @endauth
    </div>
</x-app-layout>
