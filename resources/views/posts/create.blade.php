@extends('main')
@section('title', 'Create')
@section('header')
  <link rel="stylesheet" href="/css/parsley.css">
@endsection
@section('content')
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-2">
      <h1>Create new post</h1>
      <hr>
      <form method="post" action="{{ action('PostController@store') }}" data-parsley-validate>
        {{ csrf_field() }}
        Title:<input type="text" name="title" class="form-control" data-parsley-required>
        Slug:<input type="text" name="slug" class="form-control" data-parsley-required minlength="5" maxlength="255">
        Body:<textarea name="body" class="form-control" data-parsley-required></textarea>
        <br>
        <input type="submit" value="Create" class="btn btn-success btn-block">
      </form>
    </div>
  </div>
@endsection
@section('footer')
  <script src="/js/parsley.min.js"></script>
@endsection
