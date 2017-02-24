@extends('main')
@section('title', 'Posts')
@section('content')
  <div class="row">
    <div class="col-md-10">
      <h1>All Posts</h1>
    </div>
    <div class="col-md-2">
      <a href="{{ route('posts.create') }}" class="btn btn-block btn-primary btn-h1-spacing">Create new post</a>
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th>id</th>
          <th>Title</th>
          <th>Body</th>
          <th>Created at</th>
          <th>Updated at</th>
          <th></th>
          <th></th>
        </thead>
        <tbody>
          @foreach($posts as $post)
            <tr>
              <td>{{ $post->id }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ substr($post->body, 0, 50) }} {{strlen($post->body)>50?'...':'' }}</td>
              <td>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</td>
              <td>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</td>
              <td>{{ Html::linkRoute('posts.show', 'View', [$post->id], ['class' => 'btn btn-default']) }}</td>
              <td><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default">Edit</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="text-center">
        {!! $posts->links() !!}
      </div>
      <div class="text-center">
        {!! $posts->currentPage() !!} of {!! $posts->lastPage() !!}
      </div>
    </div>
  </div>
@endsection
