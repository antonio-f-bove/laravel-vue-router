@extends('layouts.app')

@section('content')

<div class="container mb-3">
  <h1>
    Create new post
  </h1>
</div>

<div class="container">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('admin.posts.store') }}" method="POST"
  class="input-form"
  >
    @csrf
  
    {{-- title --}}
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" id="title" name="title"
      class="form-control @error('title') is-invalid @enderror"
      placeholder="input title"
      value="{{ old('title') }}"
      >
      @error('title')
        <small class="invalid-feedback">{{ $message }}</small>    
      @enderror
    </div>

    {{-- category --}}
    <div class="form-group">
      <label for="category_id">Category</label>
      <select name="category_id" id="category_id"
      class="form-control @error('category_id') is-invalid @enderror"
      >
        <option value="">-- none --</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}"
        {{ old('category_id') == $category->id ? 'selected' : '' }}
        >
          {{ $category->name }}
        </option>
        @endforeach
      </select>
      @error('category_id')
        <small class="invalid-feedback">{{ $message }}</small>    
      @enderror
    </div>

    {{-- tags --}}
    <label>Tags</label>
    <div class="form-group px-3">
      @foreach ($tags as $tag)
        <div class="form-check form-check-inline">
          <input type="checkbox" name="tags[{{ $loop->index }}]" id="checkbox-{{ $tag->id }}"
          value="{{ $tag->id }}"
          class="form-check-input @error('tags.{{ $loop->index }}') is-invalid @enderror"
          >
          <label for="checkbox-{{ $tag->id }}" class="form-check-label">
            {{ $tag->name }}
          </label>
        </div>
      @endforeach
    </div>

    {{-- content --}}
    <div class="form-group">
      <label for="content">Content</label>
      <textarea id="content" name="content"
      class="form-control @error('content') is-invalid @enderror"
      placeholder="input content" rows="20"
      >
        {{ old('content') }}
      </textarea>
      @error('content')
        <small class="invalid-feedback">{{ $message }}</small>    
      @enderror
    </div>

    <button class="btn btn-primary" type="submit">
      Create Post
    </button>
    <button class="btn btn-primary" type="reset">
      Reset
    </button>
  </form>
</div>

@endsection