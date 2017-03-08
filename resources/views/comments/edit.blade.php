@extends('main')
@section('title', 'Edit Comment')
@section('header')  
@endsection
@section('content')
  <h1>Edit Comment</h1>
  {!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PATCH']) !!}

    {{ Form::label('name', 'Name')}}
    {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}

    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}

    {{ Form::label('comment', 'Comment') }}
    {{ Form::textarea('comment', null, ['class' => 'form-control textarea']) }}

    {{ Form::submit('Update Comment', ['class' => 'btn btn-success btn-md', 'style' => 'margin-top:10px']) }}
  {!! Form::close() !!}
@endsection
