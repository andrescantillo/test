<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Post;
use DB;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth', ['only' => ['store']]);
        
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return view('post/show', ['post' => $post]);
    }

    public function new() {
        return view('post/new');
    }

    public function index() {
        DB::statement('PRAGMA foreign_keys = ON;');
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('post/list', ['posts' => $posts]);
    }

    public function store(PostRequest $request) {

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        return redirect('posts');
    }

    public function edit(Request $request) {

        $post = Post::findOrFail($request->id);
        $this->authorize('update', $post);
        return view('post/update', ['post' => $post]);

    }
       
    public function update(PostRequest $request) {

        $post = Post::findOrFail($request->id);
        $this->authorize('update', $post);
        $post->update([
        'title' => $request->title,
        'body' => $request->body
        ]);
    
        return redirect('posts');
    }

    public function destroy(Request $request) {

        $post = Post::findOrFail($request->id);
        $this->authorize('delete', $post);
        $post->delete();
        return redirect('posts');
    }

}
