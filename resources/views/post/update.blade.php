@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-body">
          @include('includes.errors')
            <ul class="list-group list-group-flush">
                  <h5 class="card-title">{{ __('Update post') }}</h5>
                  <form class="form" id="edit_post" method="post" action="{{route('post.update',['id' => $post->id ])}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                          <div class="form-group mb-2">
                              <label for="title" class="sr-only">{{ __('Title') }}</label>
                              <input type="text" class="form-control" id="title" name="title" value="{{ $post->title}}">
                              <input  type="text" id="id"  value="{{ $post->id}}" style="display: none">
                          </div>
                          <div class="form-group mb-2">
                              <label for="body" class="sr-only">{{ __('Body') }}</label>
                              <textarea type="text" class="form-control" id="body" name="body" placeholder="Write body">{{ $post->body}}</textarea>
                          </div>
                          <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
                    </form>
                    
                    <br>
                    <a href="{{ url('/posts') }}" class="btn btn-primary">{{ __('Go back') }}</a>
                </ul>
          </div>  
        </div>
      </div>
    </div>
</div>
 @endsection