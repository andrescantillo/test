<?php

namespace App\Http\Middleware;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Closure;

class Owner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $post = Post::find($request->id);
 
        if ($post->user_id != Auth::id())
        {
            return redirect("/posts");
        }
        return $next($request);
    }
}
