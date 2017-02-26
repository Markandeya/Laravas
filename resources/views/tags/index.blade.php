@extends('main')
@section('title', 'Tags')
@section('content')
  <div class="row">
    <div class="col-md-8">
      <h1>Tags</h1>
      <table class="table">
        <thead>
          <th>id</th>
          <th>Name</th>
        </thead>
        <tbody>
          @foreach($tags as $tag)
            <tr>
              <td> {{ $tag->id }}</td>
              <td> <a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-md-4">
      <div class="well">
        {!! Form::open(['route' => 'tags.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
          <h2>New Tag</h2>
          {{ Form::label('name', 'Name:')}}
          {{ Form::text('name', null, ['class' => 'form-control', 'data-parsley-required' => '', 'minlength' => '1', 'maxlength' =>'255']) }}<br>
          {{ Form::submit('Create new tag', ['class' => 'btn btn-primary']) }}
        {!! Form::close()!!}
      </div>
    </div>
  </div>
@endsection
