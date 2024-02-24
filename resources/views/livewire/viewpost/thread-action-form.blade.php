<div>
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
    <form wire:submit="toggleIgnore">

    </form>
</div>
