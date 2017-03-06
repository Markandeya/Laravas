@extends('main')
@section('title', $post->title)
@section('content')
  <style media="screen">
  .triangle-isosceles {
  position:relative;
  padding:15px;
  margin:1em 0 3em;
  color:#000;
  background:#f3961c; /* default background for browsers without gradient support */
  /* css3 */
  background:-webkit-gradient(linear, 0 0, 0 100%, from(#f9d835), to(#f3961c));
  background:-moz-linear-gradient(#f9d835, #f3961c);
  background:-o-linear-gradient(#f9d835, #f3961c);
  background:linear-gradient(#f9d835, #f3961c);
  -webkit-border-radius:10px;
  -moz-border-radius:10px;
  border-radius:10px;
}
  .triangle-isosceles:after {
content:"";
position:absolute;
bottom:-15px; /* value = - border-top-width - border-bottom-width */
left:50px; /* controls horizontal position */
border-width:15px 15px 0; /* vary these values to change the angle of the vertex */
border-style:solid;
border-color:#f3961c transparent;
/* reduce the damage in FF3.0 */
display:block;
width:0;
}
  </style>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1> {{ $post->title }} </h1>
      <p> {{ $post->body }} </p>
      <p><i> Posted In: {{ $post->category->name }}</i></p>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h2>All comments</h2>

      @foreach ($post->comments->orderBy('desc') as $comment)
        <div class="triangle-isosceles">
          {{ $comment->comment }}
          <br>
          {{ '- by '.$comment->name}}
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
