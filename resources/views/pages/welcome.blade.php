@extends('main')

@section('title', 'Home')

@section('content')
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="jumbotron">
        <h1 style="font-family:Raleway:100,600">The Laravas Blog</h1>
        <p class="lead">Welcome to Laravas blog! My test blog powered by the Laravel &reg; Framework.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
      @foreach($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body))>300?'...':'' }}</p>
            <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read more</a>
        </div>
        <hr>
    @endforeach
    </div>
    <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1">
      <h2>Sidebar</h2><hr>
      <div class="sidePost">
        <h3></h3>
        <p>
        </p>
      </div>

    </div>
  </div>
@endsection
