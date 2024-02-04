<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentCard extends Component
{
    public $comment;
    public $user;

    public $with_reply_button = false;

    public function mount()
    {
        $this->user = User::find(Auth::id());
    }

    public function render()
    {
        return view('livewire.comment-card');
    }
}
