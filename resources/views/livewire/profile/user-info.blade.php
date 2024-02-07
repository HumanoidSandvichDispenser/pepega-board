<div class="user-info">
    <div>
        <h2 class="tw-my-0 tw-leading-none">{{ $user->display_name }}</h2>
        <i>&commat;{{ $user->username }}</i>
    </div>
    <div>
        <ul class="tw-list-none tw-p-0">
            <li>
                <b>{{ $user->posts->count() }}</b>
                posts
            </li>
            <li>
                <b>{{ $user->comments->count() }}</b>
                comments
            </li>
            <li>
                <b>{{ $user->responses->count() }}</b>
                responses
            </li>
            <li>
                Registered on
                {{ date('d M Y', strtotime($user->created_at)) }}
            </li>
        </ul>
    </div>
</div>

@once
@push('css')
<style>
</style>
@endpush
@endonce
