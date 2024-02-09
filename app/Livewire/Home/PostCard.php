<?php

namespace App\Livewire\Home;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;

class PostCard extends Component
{
    public $post;
    public $isPreview = false;
    private $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    #[Computed]
    public function postContent()
    {
        if ($this->isPreview) {
            return mb_strimwidth($this->post->content, 0, 255, "...");
        }
        return Str::markdown($this->post->content);
    }

    #[Computed]
    public function belongsToUser()
    {
        return $this->post->user->id == $this->user?->id;
    }

    public function render()
    {
        return view('livewire.home.post-card');
    }
}
