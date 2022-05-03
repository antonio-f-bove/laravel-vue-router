@extends('layouts.app')

@section('content')

<div class="container">
  <form action="{{ route('admin.posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
  
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" id="title"
      class="form-control @error('title') is-invalid @enderror"
      placeholder="input title"
      value="{{ old('title') ?: $post->title }}"
      >
      @error('title')
        <small class="invalid-feedback">{{ $message }}</small>    
      @enderror
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea id="content" 
      class="form-control @error('content') is-invalid @enderror"
      placeholder="input content" rows="20"
      >
        {{ old('content') ?: $post->content }}
      </textarea>
      @error('content')
        <small class="invalid-feedback">{{ $message }}</small>    
      @enderror
    </div>
    <div class="form-group">
      <label for="published_at">Published at</label>
      <input type="datetime-local" id="published_at"
      value="{{ old('published_at') ?: date('c', strtotime($post->published_at)) }}" 
      placeholder="publication date"
      class="form-control @error('published_at') is-invalid @enderror"
      >
      @error('published_at')
        <small class="invalid-feedback">{{ $message }}</small>    
      @enderror
    </div>

    <button class="btn btn-primary" type="submit">
      Update Post
    </button>
</div>

@endsection