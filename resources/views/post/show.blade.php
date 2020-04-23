@extends('layouts.app')
 @section('content')
   {{ csrf_field() }}
   <div>
     <h3>Title</h3>
     <h4 value="{{ $post->title }}">Title</h4>
   </div>
   <div>
    <h3>Body</h3>
     <p>{{ $post->body }}</p>
   </div>
   <div>
    <a href="{{ url('/posts') }}">Back</a>
   </div>
   <br>
   Comments
   <form id="save_comment" method="post" action="{{ url('/store/comment')}}">
    {{ csrf_field() }}
    <div>
        <input type="text" name="id_post" value="{{ $post->id }}" style="display:none">
    </div>
    <div>
        <textarea id="body" name="body" placeholder="Write comment"></textarea>
    </div>
    <div>
        <input type="submit" value="Save">
    </div>
    </form>
    @forelse ($post->comments as $comment)
    <div>
        <label for="">{{ $comment->user_id}} </label>
        <label for="">{{ $comment->body}}</label>
        <form action="{{ url('/comment') }}/{{ $comment->id }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="text" name="id_post" value="{{ $post->id }}" style="display:none">
        <button type="submit">Delete</button>
        </form>
    </div>
    @empty
    <label for="">Not comments</label>
    @endforelse
 @endsection