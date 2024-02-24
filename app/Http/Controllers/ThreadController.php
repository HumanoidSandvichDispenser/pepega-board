<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function show($threadId)
    {
        if (!Auth::check()) {
            return abort(404);
        }

        $thread = Thread::find($threadId);

        if ($thread == null) {
            return abort(404);
        }

        $user = $thread->users->find(Auth::id());

        if ($user == null) {
            return abort(404);
        }

        // mark as read
        $thread->users()->updateExistingPivot($user->id, ['has_read' => true]);

        return view('viewthread', [
            'thread' => $thread,
            'user' => $user,
        ]);
    }
}
