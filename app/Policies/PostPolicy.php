<?php

namespace App\Policies;


use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class PostPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Post $post)
    {
        return $user->id == $post->user_id;
    }
 
    public function delete(User $user, Post $post)
    {
        return $user->id == $post->user_id;
    }
}
