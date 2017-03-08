@extends('main')
@section('title', 'Delete Comment')
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Delete Comment</h1>

      <h3>{{ $comment->name }} <small>{{ $comment->email }}</small></h3>
      <p>
        {{ $comment->comment }}
      </p>
      {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method'=>'DELETE' ]) !!}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-lg']) }}
      {!! Form::close() !!}
    </div>
  </div>
@endsection
