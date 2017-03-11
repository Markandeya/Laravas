@extends('main')
@section('title', $post->title)
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1> {{ $post->title }} </h1>
      <img src='{{ asset("images/$post->image") }}' height="400px" width="800px" alt=""/>
      <p> {!! $post->body !!} </p>
      <p><i> Posted In: {{ $post->category->name }}</i></p>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h2><span class="glyphicon glyphicon-comment">&nbsp;</span>{{ $post->comments()->count() }} comments</h2>

      @foreach ($post->comments as $comment)
        <div class="comment">
          <div class="author-info">
            <img src="{{ "https://www.gravatar.com/avatar/".md5( strtolower( trim( $comment->email ) ) ) . "?s=50&d=monsterid" }}" class="author-image"  />
            <h3>{{ $comment->name}}</h3>
            <div class="author-date">
              {{ date('F nS, Y -g:iA', strtotime( $comment->created_at) ) }}
            </div>
          <div class="comment-content">
            {{ $comment->comment }}
          </div>
          </div>
        </div>

      @endforeach
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <br>
      {!! Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) !!}
      <div class="row">
        <div class="col-md-6">
          {{ Form::label('name', 'Name:') }}
          {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-md-6">
          {{ Form::label('email', 'Email:') }}
          {{ Form::text('email', null, ['class' => 'form-control']) }}
        </div>
      </div>

        {{ Form::label('comment', 'Comment:') }}
        {{ Form::textarea('comment', null, ['class' => 'form-control']) }}
        <br>
        {{ Form::submit('Post Comment', ['class' => 'btn btn-success  ']) }}
      {!! Form::close() !!}
    </div>
  </div>
@endsection
