<?php

namespace App\Livewire\Home;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;

class PostCard extends Component
{
    public $post;
    public $isPreview = false;

    #[Computed]
    public function postContent()
    {
        if ($this->isPreview) {
            return mb_strimwidth($this->post->content, 0, 255, "...");
        }
        return Str::markdown($this->post->content);
    }

    public function render()
    {
        return view('livewire.home.post-card');
    }
}
