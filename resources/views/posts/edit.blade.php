@extends('main')
@section('title', 'Edit')
@section('header')
  {{ Html::style('css/parsley.css') }}
@endsection
@section('content')
{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
  <div class="row">
    <div class="col-md-8">
      {{ Form::label('title', 'Title:') }}
      {{ Form::text('title', null, ['class' => 'form-control', 'data-parsley-required' => '', 'maxlength' =>'255']) }}
      {{ Form::label('slug', 'Slug:') }}
      {{ Form::text('slug', null, ['class' => 'form-control form-spacing-top', 'data-parsley-required' => '', 'minlength' => '5', 'maxlength' =>'255']) }}
      {{ Form::label('body', 'Body:', ['class' => 'form-spacing-top']) }}
      {{ Form::textarea('body', null, ['class' => 'form-control', 'data-parsley-required' => '']) }}
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
@section('footer')
  {{ Html::script('js/parsley.min.js') }}
@endsection
