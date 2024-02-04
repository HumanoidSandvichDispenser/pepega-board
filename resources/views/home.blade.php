<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        <livewire:home.post-list></livewire:home.post-list>
        @auth
            <h3>Unread Threads</h3>
            <livewire:home.unread-thread-list />
        @endauth
    </div>
</x-app-layout>
