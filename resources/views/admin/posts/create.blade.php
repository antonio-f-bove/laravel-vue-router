@extends('layouts.app')

@section('content')

<div class="container">
  <form action="{{ route('admin.posts.store') }}" method="POST">
    @csrf
  
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" id="title"
      class="form-control @error('title') is-invalid @enderror"
      placeholder="input title"
      value="{{ old('title') }}"
      >
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea id="content" 
      class="form-control @error('title') is-invalid @enderror"
      placeholder="input content" rows="20"
      >
      {{ old('title') }}
      </textarea>
    </div>

    <button class="btn btn-primary" type="submit">
      Create post
    </button>
  </form>
</div>

@endsection