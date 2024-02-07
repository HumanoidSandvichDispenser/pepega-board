<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thread extends Model
{
    use HasFactory;

    public $table = 'threads';

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot(['is_anonymous', 'has_read']);
    }

    public function isUserAnonymous(User $user)
    {
        return $this->users->find($user)->pivot->is_anonymous;
    }

    public function hasUserCommented(User $user)
    {
        return !$this->comments
            ->where('user_id', $user->id)
            ->isEmpty();
    }
}
