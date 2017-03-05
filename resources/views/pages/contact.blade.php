@extends('main')

@section('title', 'Contact')

@section('content')
  <div class="row">
    <h1>Contact Page</h1>
    <form  action = "{{ url('contact') }}" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        Email:<input type="text" name="email" value="" class="form-control">
      </div>
      <div class="form-group">
        Subject:<input type="text" name="subject" value="" class="form-control">
      </div>
      <div class="form-group">
        Contact: <textarea name="body" rows="8" cols="40" class="form-control"></textarea>
      </div>
      <input type="submit" name="submit" class="btn btn-success" value="Send">
    </form>

  </div>
@endsection
