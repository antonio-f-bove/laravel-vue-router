@extends('layouts.app')

@section('content')

<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Title</th>
        <th scope="col">Published</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
        <tr>
          <th scope="row">{{ $post->id }}</th>
          <td>{{ $post->title }}</td>
          <td>{{ $post->published_at ?: 'unpublished' }}</td>
          <td>
            <form action="{{ route('admin.posts.edit', $post) }}" method="GET">
              @csrf
              <button type="submit" class="btn btn-info">Edit</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection