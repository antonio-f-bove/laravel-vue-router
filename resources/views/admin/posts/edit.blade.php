@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-between">
  <h1>
    Edit post id: {{ $post->id }}
  </h1>
  <form action="{{ route('admin.posts.destroy', $post) }}" method=POST
  class="delete-form"
  >
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger">Delete Post</button>
  </form>
</div>

<div class="container">
  <form action="{{ route('admin.posts.update', $post) }}" 
  method="POST" class="input-form"
  >
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

    {{-- title --}}
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

    {{-- category --}}
    <div class="form-group">
      <label for="category_id">Category</label>
      <select name="category_id" id="category_id"
      class="form-control @error('category_id') is-invalid @enderror"
      >
        <option value=""
        {{ old('category_id') == null ? 'selected' : '' }}
        {{-- <!-- TODO non mantiene questa option quando old==null --> --}}
        >
          -- None --
        </option>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}"
          {{ (optional($post->category)->id == $category->id 
                && old('category_id') == null) 
              || (old('category_id') == $category->id)
              ? 'selected' : '' }}
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
        <input class="form-check-input @error('tags.{{ $loop->index }}') is-invalid @enderror" 
        name="tags[{{ $loop->index }}]" id="checkbox-{{ $tag->id }}"
        value="{{ $tag->id }}" type="checkbox" 
        {{-- <!-- TODO implementare assistenza preselezionati con old() ?? --}}
        {{ $post->tags->contains($tag) ? 'checked' : '' }}
        >
        <label class="form-check-label" for="checkbox-{{ $tag->id }}">
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