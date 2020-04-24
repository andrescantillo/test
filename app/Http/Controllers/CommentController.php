<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Comment;

class CommentController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth', ['only' => [ 'store']]);
    }

    public function store(CommentRequest $request) {

        Comment::create([
            'id_post' => $request->id_post,
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        return redirect('/show/'.$request->id_post);
    }
       
    public function update(CommentRequest $request) {

        $comment = Comment::findOrFail($request->id);
        $this->authorize('update', $comment);
        $comment->update([
        'body' => $request->body,
        ]);
    
        return redirect('comments');
    }

    public function destroy(Request $request) {
        $comment = Comment::findOrFail($request->id);
        $this->authorize('update', $comment);
        $comment->delete();
        return redirect('/show/'.$request->id_post);
    }
}
