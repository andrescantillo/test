@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  <form id="edit_post" method="post" action="{{route('post.update',['id' => $post->id ])}}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <input  type="text" id="id"  value="{{ $post->id}}" style="display: none">
    <div>
      <p>Title</p>
      <input type="text" id="title" name="title" value="{{ $post->title}}">
    </div>
    <div>
      <p>Body</p>
      <textarea id="body" name="body">{{ $post->body}}</textarea>
    </div>
    <div>
      <input type="submit" value="Update">
    </div>
  </form>
  <div>
    <a href="{{ url('/posts') }}">Back</a>
  </div>
@endsection