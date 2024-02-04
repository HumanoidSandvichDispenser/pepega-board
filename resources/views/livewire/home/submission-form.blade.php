<?php

use App\Livewire\Forms\PostForm;
use App\Livewire\Home\PostList;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component
{
    public PostForm $form;

    public function submitPost()
    {
        $this->validate();
        //$validated = $this->validate([
        //    'title' => ['required', 'string', 'max:255'],
        //    'content' => ['required', 'string', 'max:4095'],
        //    'is_anonymous' => ['required', 'boolean'],
        //]);

        Auth::user()->posts()->create($this->form->all());

        //$this->dispatch('post-created');
        return $this->redirect('/');
    }
}
?>

<div class="submission">
    <form wire:submit="submitPost">
        <input
            wire:model="form.title"
            placeholder="Title (optional, maximum 255 characters)"
            name="title"
            class="tw-w-full"
        />
        <!--x-input-error field="form" /-->
        <textarea
            wire:model="form.content"
            placeholder="Text (maximum 4095 characters)"
            name="content"
        >
        </textarea>
        <!--x-input-error field="content" /-->
        <div class="footer">
            <div>
                <span>
                    <input
                        wire:model="form.is_anonymous"
                        name="is-anonymous"
                        type="checkbox"
                        value="is_anonymous"
                        checked
                    />
                    <label for="is-anonymous">Post anonymously</label>
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
