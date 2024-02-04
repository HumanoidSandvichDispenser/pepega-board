<?php

namespace App\Livewire\Home;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UnreadThreadList extends Component
{
    public $threads = null;

    public function mount()
    {
        $user = User::find(Auth::id());
        $this->threads = $user->threads()
            ->wherePivot('has_read', false)
            ->get();
    }

    public function render()
    {
        return view('livewire.home.unread-thread-list');
    }
}
