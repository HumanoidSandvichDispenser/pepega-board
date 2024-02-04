<?php

namespace App\Livewire\Home;

use App\Models\Post;
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
        $this->posts = Post::latest()->get();
    }

    public function pushMessage()
    {
        $post = Post::find($id);
        $this->posts->prepend($post);
    }
}
