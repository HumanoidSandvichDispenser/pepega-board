<div class="card">
    <div class="card-inner">
        @isset ($header)
            <div class="header">
                {{ $header }}
            </div>
        @endisset
        @isset ($slot)
            <div class="body">
                {{ $slot }}
            </div>
        @endisset
        @isset ($footer)
            <div class="footer">
                {{ $footer }}
            </div>
        @endisset
    </div>
</div>

@once
@push('css')
<style>
.card {
    display: flex;
    flex-direction: column;
    row-gap: 8px;
    background-color: var(--bg2);
    padding: 16px;
    border-radius: 8px;
    border: 1px solid var(--bg1);
}

.card-inner {
    display: flex;
    flex-direction: column;
    row-gap: 8px;
}

.card-inner p.truncated {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.card-inner p {
    margin: 0;
}

.card-inner > .header h1 {
    font-weight: 600;
    font-size: 1em;
    line-height: 1.5;
    margin: 0;
}

.card-inner > .header {
    max-height: 11em;
    white-space: nowrap;
    word-break: break-all;
    overflow: hidden;
    text-overflow: ellipsis;
}

.card-inner > .header h1 > a, .post .info a {
    color: inherit;
}

.card-inner .info {
    display: flex;
    color: var(--fg1);
}

.card-inner .info a {
    color: inherit;
}

.card-inner .info > * {
    flex-grow: 1;
}

.card-inner .info .right {
    text-align: right;
}
</style>
@endpush
@endonce
