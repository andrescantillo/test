@extends('layouts.app')
@section('content')
@include('includes.errors')
<form id="save_post" method="post" action="{{ url('/store')}}">
  {{ csrf_field() }}
  <div>
    <p>Title</p>
    <input type="text" id="title" name="title" placeholder="Write title" value="">
  </div>
  <div>
    <p>Body</p>
    <textarea id="body" name="body" placeholder="Write title" placeholder="Write Body"></textarea>
  </div>
  <div>
    <input type="submit" value="Save">
  </div>
</form>
@endsection