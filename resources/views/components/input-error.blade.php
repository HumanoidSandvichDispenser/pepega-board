@props(['messages'])

@if ($messages != null)
    <ul class="error">
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

@once
@push('css')
<style>
ul.error {
    color: var(--red);
}
</style>
@endpush
@endonce
