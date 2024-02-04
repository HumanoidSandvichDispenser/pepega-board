<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ReplyForm extends Form
{
    #[Validate('required|string|max:4095')]
    public $content = '';

    #[Validate('required|boolean')]
    public $is_anonymous = true;
}
