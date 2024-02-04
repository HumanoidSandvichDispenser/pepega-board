<div class="card">
    <div class="post">
        <h1
            @if ($isPreview)
                class="truncated"
            @endif
        >
            <a href="/post/{{ $post->id }}">
                {{ $post->title }}
            </a>
        </h1>
        <div
            class="body"
        >
            <p
                @if ($isPreview)
                class="truncated"
                @endif
            >
                {{ $post->content }}
            </p>
        </div>
        <div class="info">
            <i class="left">
                Posted
                @if ($post->user == Auth::user())
                    by you
                    @if ($post->is_anonymous)
                        anonymously
                    @endif
                @elseif ($post->is_anonymous)
                    anonymously
                @else
                    by
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
    </div>
</div>

@once
@push('css')
<style>
.post {
    display: flex;
    flex-direction: column;
    row-gap: 8px;
}

.post p.truncated {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.post p {
    margin: 0;
}

.post > h1 {
    font-weight: 600;
    font-size: 1.5em;
    margin: 0;
}

.post > h1.truncated {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.post > h1 > a, .post .info a {
    color: inherit;
}

.post .info {
    display: flex;
    color: var(--fg1);
}

.post .info > * {
    flex-grow: 1;
}

.post .info .right {
    text-align: right;
}
</style>
@endpush
@endonce
