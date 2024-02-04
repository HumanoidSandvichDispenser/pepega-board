<div class="submission">
    <form wire:submit="submitReply">
        <textarea
            wire:model="form.content"
            placeholder="Text (maximum 4095 characters)"
            name="content"
        >
        </textarea>
        <div class="footer">
            <div>
                <span>
                    <input
                        wire:model="form.is_anonymous"
                        name="is-anonymous"
                        type="checkbox"
                        value="is_anonymous"
                        @if ($force_unanonymize)
                        disabled
                        readonly
                        @else
                        checked
                        @endif
                    />
                    <label for="is-anonymous">
                        Reply anonymously
                        @if ($force_unanonymize)
                            (you are already unanonymized)
                        @endif
                    </label>
                </span>
            </div>
            <div>
                <button class="submit">Submit</button>
            </div>
        </div>
    </form>
</div>

@once
@push('css')
<style>
.submission {
    display: flex;
    flex-direction: column;
    row-gap: 8px;
}

.submission input.text,
.submission textarea {
    width: 100%;
}

.submission textarea {
    resize: vertical;
}

.submission button.submit {
    float: right;
    margin-left: 8px;
}

.submission .footer {
    display: flex;
    flex-direction: row;
}

.submission .footer > div {
    flex-grow: 1;
}
</style>
@endpush
@endonce
