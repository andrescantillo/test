@extends('layouts.app')
 
@section('content')
<h3>Posts</h3>
<a type="button" href="{{ url('/new') }}">CREATE NEW POST</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TITLE</th>
      <th scope="col"># COMMENTS</th>
      <th scope="col">OPTIONS</th>
    </tr>
  </thead>
  <tbody>
  @forelse ($posts as $post) 
    <tr>
        <th scope="row">{{ $post->id }}</th>
        <td>{{ $post->title }}</td>
        <td>@isset($post->comments)
            {{ count($post->comments) }}
            @else
                0
             @endisset
        </td>
        <td><a href="{{ url('/show') }}/{{ $post->id }}">View</a>
            <a href="{{ url('/post') }}/{{ $post->id}}/edit">Edit</a>
            <form action="{{ url('/post') }}/{{ $post->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
      No data
    </tr>
    @endforelse
  </tbody>
</table>
   
@endsection