@extends('main')
@section('title', 'View Post')
@section('content')
  <div class="row">
    <div class="col-md-8">
      <h1>{{ $post->title }}</h1>
      <p class="lead">{{ $post->body }}</p>
      <div class="showtags">
        @foreach ($post->tags as $tag)
          <span class="label label-default">{{ $tag->name }}</span>
        @endforeach
      </div>
      <div class="showcomments">
        <h3>{{ $post->comments()->count() }}&nbsp;Comments</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Comment</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($post->comments as $comment)
              <tr>
              <td>{{ $comment->name }}</td>
              <td>{{ $comment->email }}</td>
              <td>{{ $comment->comment }}</td>
              <td>
                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"> <span class="glyphicon glyphicon-pencil"></span></a>
                <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"> <span class="glyphicon glyphicon-trash"></span></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <label>Url:</label>
          <p><a href="{{ url('blog/'.$post->slug) }}">{{ url('blog/'.$post->slug) }}</a></p>
        </dl>
        <dl class="dl-horizontal">
          <label>Category:</label>
          <p>{{ $post->category->name }}</p>
        </dl>
        <dl class="dl-horizontal">
          <label>Created at:</label>
          <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
        </dl>
        <dl class="dl-horizontal">
          <label>Updated at:</label>
          <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-primary btn-block']) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method'=>'DELETE' ]) !!}
              {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
            {!! Form::close() !!}
          </div>
          <div class="col-sm-12">
            <a href="{{ route('posts.index') }}" class="btn btn-block btn-default form-spacing-top">View all posts</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
