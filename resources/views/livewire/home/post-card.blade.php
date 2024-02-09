<x-base-card>
    <x-slot:header>
        <h1
            @if ($isPreview)
                class="truncated"
            @endif
        >
            <a href="/post/{{ $post->id }}">
                {{ $post->title }}
            </a>
        </h1>
    </x-slot:header>

    <div>
        {!! $this->postContent !!}
    </div>

    <x-slot:footer>
        <div class="info">
            <i class="left">
                @if ($this->belongsToUser)
                    You
                    @if ($post->is_anonymous)
                        (Anonymous)
                    @endif
                @elseif ($post->is_anonymous)
                    Anonymous
                @else
                    <a href="/&#64;{{ $post->user->username }}">
                        {{ $post->user->display_name }}
                        (&#64;{{ $post->user->username }})
                    </a>
                @endif
            </i>
            <span class="right">
                <code>ID #{{ $post->id }}</code>
            </span>
        </div>
    </x-slot:footer>
</x-base-card>

