@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Post') }}</div>

                <div class="card-body">
                <h3>{{ __('Post') }}</h3>
                <div>
                  <a href="{{ url('/new') }}" class="btn btn-success">{{ __('Create new post') }}</a>
                </div>
                <br>
                <table class="table">
                  <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">{{ __('Title') }}</th>
                    <th scope="col"># {{ __('of') }} {{ __('Comments') }}</th>
                    <th scope="col">{{ __('Options') }}</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($posts as $post) 
                  <tr>
                      <th scope="row">{{ $post->id }}</th>
                      <td>
                      <div class=" text-wrap" style="width: 10rem;">
                      {{ $post->title }}
                      </div>
                      </td>
                      <td>@isset($post->comments)
                          {{ count($post->comments) }}
                          @else
                              0
                            @endisset
                      </td>
                      <td><a class="btn btn-info" href="{{ url('/show') }}/{{ $post->id }}">{{ __('View') }}</a>
                          @if (Auth::check() && $post->user_id == Auth::id())
                          <a class="btn btn-success" href="{{ url('/post') }}/{{ $post->id}}/edit">{{ __('Edit') }}</a>
                          <a class="btn btn-danger" href="{{ url('/post') }}/{{ $post->id }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('delete-post-form').submit();">
                                        {{ __('Delete') }}
                          </a>
                          <form id="delete-post-form" action="{{ url('/post') }}/{{ $post->id }}" method="POST" style="display: none;">
                              @csrf
                              {{ method_field('DELETE') }}
                          </form>
                          @endif
                      </td>
                  </tr>
                  @empty
                  <tr>
                    No data
                  </tr>
                  @endforelse
                  @if (count($posts))
                    {{ $posts->links() }}
                  @endif
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>



   
@endsection