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
        if ($this->posts == null) {
            $this->refreshPostList();
        }
    }

    public function render()
    {
        return view('livewire.home.post-list');
    }

    public function refreshPostList()
    {
        $this->posts = Post::latest()->get();
    }
}
