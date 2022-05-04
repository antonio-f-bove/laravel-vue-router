@extends('layouts.app')

@section('content')

<div class="container">
  <div class="d-flex mb-3">
    <a href="{{ route('admin.posts.create') }}"
    class="ml-auto mr-3"
    >
      <button class="btn btn-info">Add Post</button>
    </a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Category</th>
        <th scope="col">Published</th>
        <th scope="col" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
        <tr>
          <th scope="row">{{ $post->id }}</th>
          <td>{{ $post->title }}</td>
          <td>{{ $post->slug }}</td>
          <td class="text-center">{{ $post->category ? $post->category->name : '-' }}</td>
          <td>
            @if ($post->published_at)
              {{ $post->published_at }}               
            @else
              <form action="{{ route('admin.posts.publish', $post) }}" method="POST">
                @csrf
                <button class="btn btn-warning">Publish</button>
              </form>
            @endif
          </td>
          <td>
            <div class="d-flex">
              <form action="{{ route('admin.posts.edit', $post) }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-info mr-1">Edit</button>
              </form>
              <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection