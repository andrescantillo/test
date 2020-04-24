@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-body">
          @include('includes.errors')
            <ul class="list-group list-group-flush">
                  <h5 class="card-title">{{ __('Create new post') }}</h5>
                  <form class="form" id="save_post" method="post" action="{{ url('/store')}}">
                          {{ csrf_field() }}
                          <div class="form-group mb-2">
                              <label for="title" class="sr-only">{{ __('Title') }}</label>
                              <input type="text" class="form-control" id="title" name="title" placeholder="{{ __('Write a title') }}">
                          </div>
                          <div class="form-group mb-2">
                              <label for="body" class="sr-only">{{ __('Body') }}</label>
                              <textarea type="text" class="form-control" id="body" name="body" placeholder="{{ __('Write the content') }}"></textarea>
                          </div>
                          <button type="submit" id="save" name="save" class="btn btn-success">{{ __('Save') }}</button>
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