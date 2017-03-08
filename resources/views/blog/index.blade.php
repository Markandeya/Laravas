@extends('main')
@section('title', 'Archive')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Archive</h1>
    </div>
  </div>
  <div class="row">
    @foreach ($posts as $post)
      <div class="col-md-8">
        <h2> {{ $post->title }} </h2>
        <h5>Created at: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
        <p> {{ strip_tags(substr($post->body, 0, 300)) }} {{ strlen(strip_tags($post->body))>300?'...':'' }} </p>
        <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read more</a>
        <hr>
      </div>
    @endforeach
  </div>
  <div class="row">
    <div class="text-center">
      {!! $posts->links() !!}
    </div>
    <div class="text-center">
      {!! $posts->currentPage() !!} of {!! $posts->lastPage() !!}
    </div>
  </div>
@endsection
