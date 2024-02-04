<?php

namespace App\Livewire\Home;

use App\Models\Post;
use Livewire\Component;

class PostCard extends Component
{
    public $post;
    public $isPreview = false;

    public function render()
    {
        return view('livewire.home.post-card');
    }
}
