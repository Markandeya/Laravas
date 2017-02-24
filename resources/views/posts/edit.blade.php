@extends('main')
@section('title', 'Edit')
@section('content')
{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
  <div class="row">
    <div class="col-md-8">
      {{ Form::label('title', 'Title:') }}
      {{ Form::text('title', null, ['class' => 'form-control']) }}

      {{ Form::label('body', 'Body:', ['class' => 'form-spacing-top']) }}
      {{ Form::textarea('body', null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <dt>Created at:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
        </dl>
        <dl class="dl-horizontal">
          <dt>Updated at:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('posts.show', 'Cancel', [$post->id], ['class' => 'btn btn-danger btn-block']) !!}
          </div>
          <div class="col-sm-6">
            {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
          </div>
        </div>
      </div>
    </div>
  </div>
{!! Form::close() !!}
@endsection
