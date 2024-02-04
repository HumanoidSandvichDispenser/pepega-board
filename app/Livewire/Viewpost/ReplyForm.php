<?php

namespace App\Livewire\Viewpost;

use App\Livewire\Forms\ReplyForm as FormsReplyForm;
use App\Models\Post;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReplyForm extends Component
{
    public FormsReplyForm $form;
    public Post $target_post;
    public bool $force_unanonymize;

    // TODO: use this
    public ?Thread $target_thread = null;

    public function render()
    {
        return view('livewire.viewpost.reply-form');
    }

    public function submitReply()
    {
        $user = User::find(Auth::id());
        $recipient = $this->target_post->user;

        $thread = null;
        if ($this->target_thread == null) {
            $thread = $this->target_post->threads()->create();

            // add our user and the original poster if necessary
            $sender_opts = [
                'has_read' => true,
                'is_anonymous' => $this->form->is_anonymous,
            ];
            $recipient_opts = [
                'has_read' => false,
                'is_anonymous' => $this->target_post->is_anonymous,
            ];

            $thread->users()->attach($user, $sender_opts);
            $thread->users()->attach($recipient, $recipient_opts);
        } else {
            $thread = $this->target_thread;

            if (!$this->form->is_anonymous) {
                $thread->users()->updateExistingPivot(
                    $user->id, ['is_anonymous' => false]);
            }
        }

        // successfully created thread, now add the comment
        $comment = $thread->comments()->make($this->form->all());
        $user->comments()->save($comment);

        return $this->redirect('/thread/' . $thread->id);
    }
}
