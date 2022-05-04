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
      <input type="text" id="title" name="title"
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
      <textarea id="content" name="content"
      class="form-control @error('content') is-invalid @enderror"
      placeholder="input content" rows="20"
      >
        {{ old('content') ?: $post->content }}
      </textarea>
      @error('content')
        <small class="invalid-feedback">{{ $message }}</small>    
      @enderror
    </div>
    
    <button class="btn btn-primary" type="submit">
      Update Post
    </button>
  </form>
</div>

@endsection