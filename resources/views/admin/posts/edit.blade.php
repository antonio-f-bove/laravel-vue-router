@extends('layouts.app')

@section('content')

<div class="container">
  <form action="{{ route('admin.posts.update') }}" method="POST">
    @csrf
    @method("PUT")
  
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" value="">
    </div>
  
  </form>
</div>

@endsection