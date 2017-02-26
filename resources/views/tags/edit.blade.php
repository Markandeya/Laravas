@extends('main')
@section('title', "Edit tag")
@section('content')
  <div class="row">
    <h1>Edit tag</h1>
    {{ Form::open(['route' => ['tags.update', $tag->id], 'method' => 'PATCH']) }}
      {{ Form::label('name', 'Name') }}
      {{ Form::text('name', $tag->name, ['class' => 'form-control']) }}<br>
      {{ Form::submit('Save changes', ['class' => 'btn btn-success']) }}
    {{ Form::close() }}
  </div>
@endsection
