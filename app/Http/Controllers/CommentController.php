<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;

class CommentController extends Controller
{

    public function store(CommentRequest $request) {

        Comment::create([
            'id_post' => $request->id_post,
            'body' => $request->body,
            'user_id' => 1
        ]);

        return redirect('/show/'.$request->id_post);
    }
       
    public function update(CommentRequest $request) {

        $comment = Comment::findOrFail($request->id);
        $comment->update([
        'body' => $request->body,
        ]);
    
        return redirect('comments');
    }

    public function destroy(Request $request) {
        $comment = Comment::findOrFail($request->id);
        $comment->delete();
        return redirect('/show/'.$request->id_post);
    }
}
