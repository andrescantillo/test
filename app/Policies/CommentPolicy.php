<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Comment $comment)
    {
        return $user->id == $comment->user_id;
    }
 
    public function delete(User $user, Comment $comment)
    {
        return $user->id == $comment->user_id;
    }
}
