<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($username)
    {
        $currentUser = Auth::user();
        $user = User::all()->where('username', $username)->firstOrFail();
        $publicPosts = $user->posts()->where('is_anonymous', false)->get();

        return view('viewuser', [
            'user' => $user,
            'currentUser' => $currentUser,
            'publicPosts' => $publicPosts,
        ]);
    }

    public function me()
    {
        $user = Auth::user();
        if ($user == null) {
            abort(404);
        }

        return redirect()
            ->route('user.profile', ['username' => $user->username]);
    }
}
