<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use DB;

class PostController extends Controller
{

    public function show($id) {
        $post = Post::findOrFail($id);
        return view('post/show', ['post' => $post]);
    }

    public function new() {
        return view('post/new');
    }

    public function index() {
        DB::statement('PRAGMA foreign_keys = ON;');
        $posts = Post::all();
        return view('post/list', ['posts' => $posts]);
    }

    public function store(PostRequest $request) {

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => 1
        ]);

        return redirect('posts');
    }

    public function edit(Request $request) {

        $post = Post::findOrFail($request->id);
        return view('post/update', ['post' => $post]);

    }
       
    public function update(PostRequest $request) {

        $post = Post::findOrFail($request->id);
        $post->update([
        'title' => $request->title,
        'body' => $request->body
        ]);
    
        return redirect('posts');
    }

    public function destroy(Request $request) {

        $post = Post::findOrFail($request->id);
        $post->delete();
        return redirect('posts');
    }

}
