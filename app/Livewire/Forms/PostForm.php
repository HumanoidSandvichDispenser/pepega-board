<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;

class PostForm extends ReplyForm
{
    #[Validate('required|string|max:255')]
    public $title = '';
}
