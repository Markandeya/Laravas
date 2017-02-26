@extends('main')
@section('title', 'Create')
@section('header')
  <link rel="stylesheet" href="/css/parsley.css">
  <link rel="stylesheet" href="/css/select2.min.css">
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
        Category:
        <select class="form-control" name="category" data-parsley-required>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}"> {{ $category->name }}</option>
          @endforeach
        </select>
        Tags:
        <select class="form-control select2-multi" name="tags[]" data-parsley-required multiple>
          @foreach ($tags as $tag)
            <option value="{{ $tag->id }}"> {{ $tag->name }}</option>
          @endforeach
        </select>
        Body:<textarea name="body" class="form-control" data-parsley-required></textarea>
        <br>
        <input type="submit" value="Create" class="btn btn-success btn-block">
      </form>
    </div>
  </div>
@endsection
@section('footer')
  <script src="/js/parsley.min.js"></script>
  <script src="/js/select2.min.js"></script>
  <script type="text/javascript">
    $('.select2-multi').select2();
  </script>
@endsection
