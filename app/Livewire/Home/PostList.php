<?php

namespace App\Livewire\Home;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class PostList extends Component
{
    public $posts;

    public function mount()
    {
        $this->refreshPostList();
    }

    public function render()
    {
        return view('livewire.home.post-list');
    }

    public function refreshPostList()
    {
        if (Auth::check()) {
            /*
            $userId = Auth::id();
            $this->posts = Post::latest()
                ->where('user_id', '!=', $userId)
                ->whereDoesntHave('threads.users', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
                ->get();
            */
        } else {
        }
        $this->posts = Post::latest()->get();
    }
}
