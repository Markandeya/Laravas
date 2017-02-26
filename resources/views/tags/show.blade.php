@extends('main')
@section('title', "$tag->name Tag")
@section('content')
  <div class="row">
    <div class="col-md-8">
      <h1>{{ $tag->name}} tag <small>{{ $tag->posts->count() }} posts</small></h1>
    </div>
    <div class="col-md-4">
      <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-block" style="margin-top:20px">Edit</a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-offset-2">
      <table class="table">
        <thead>
          <tr>
            <th> #id</th>
            <th> Title</th>
            <th> Tags</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
            <tr>
              <td>{{ $post->id }}</td>
              <td>{{ $post->title }}</td>
              <td>
                @foreach ($post->tags as $tag)
                  <span class="label label-default btn-xs">{{ $tag->name }}</span>
                @endforeach
              </td>
              <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default">View</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
