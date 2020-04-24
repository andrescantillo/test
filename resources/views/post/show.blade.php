@extends('layouts.app')
 @section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5><h6 for="">{{ __('Published by') }}&nbsp;<span class="badge badge-info">{{ $post->user->name}}</span></h6>
            <p class="card-text">{{ $post->body }}</p>
            <a href="{{ url('/posts') }}" class="btn btn-primary">{{ __('Go back') }}</a>
            <ul class="list-group list-group-flush">
                  <br><br>
                  <h5 class="card-title">{{ __('Comments') }}</h5>
                  <form class="form-inline" id="save_comment" method="post" action="{{ url('/store/comment')}}">
                          {{ csrf_field() }}
                          <div class="form-group mb-2">
                              <label for="body" class="sr-only">{{ __('Comment') }}</label>
                              <input type="text" class="form-control" id="body" name="body" placeholder="{{ __('Write comment') }}">
                              <input type="text" name="id_post" value="{{ $post->id }}" style="display:none">
                          </div>
                          &nbsp;&nbsp;
                          <button type="submit" class="btn btn-primary mb-2">{{ __('Comment') }}</button>
                    </form>
                  @forelse ($post->comments as $comment)
                    <li class="list-group-item"><span class="badge badge-info">{{ $comment->user->name}}</span>&nbsp;&nbsp;|&nbsp;&nbsp;{{ $comment->body}}
                          @if (Auth::check() && $comment->user_id == Auth::id())
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <a class="btn btn-danger" href="{{ url('/comment') }}/{{ $comment->id }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('delete-comment-form').submit();">
                                        Delete
                          </a>
                          <form id="delete-comment-form" action="{{ url('/comment') }}/{{ $comment->id }}" method="POST" style="display: none;">
                              @csrf
                              {{ method_field('DELETE') }}
                              <input type="text" name="id_post" value="{{ $post->id }}" style="display:none">
                          </form>
                          @endif
                    </li>
                  @empty
                    <li class="list-group-item">{{ __('No comment') }}</li>
                  @endforelse
                </ul>
          </div>  
        </div>
      </div>
    </div>
</div>
 @endsection