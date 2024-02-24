<x-app-layout>
    <x-slot name="header">
        <h2>
            Comment on Thread
        </h2>
    </x-slot>
    @if ($thread->users->count() > 1)
        <x-slot name="rightbar">
            <h4 class="tw-my-0">Participants</h4>
            <ul class="tw-list-none tw-px-0">
                @foreach ($thread->users as $user)
                    <li>
                        @if ($user->pivot->is_anonymous)
                            Anonymous
                        @else
                        <a
                            class="color-inherit"
                            href="/&commat;{{ $user->username }}"
                        >
                                {{ $user->display_name }}
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>
            <button class="tw-w-full">
                @if ($user->pivot->is_ignored)
                    Enable Notifications
                @else
                    Disable Notifications
                @endif
            </button>
        </x-slot>
    @endif
    <div>
        <livewire:home.post-card :post="$thread->post">
        </livewire:home.post-card>
        @foreach ($thread->comments as $comment)
            <livewire:comment-card :comment="$comment" />
        @endforeach
        <div>
            <livewire:viewpost.reply-form
                :target_post="$thread->post"
                :target_thread="$thread"
                :force_unanonymize="!$thread->isUserAnonymous($user)"
            />
        </div>
    </div>
</x-app-layout>
