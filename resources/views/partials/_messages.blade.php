@if (Session::has('success'))
  <div class="alert alert-success" role="alert">
    <strong>Success:&nbsp;</strong>{{ Session::get('success') }}
  </div>
@endif

@if (count($errors) > 0)
  <div class="alert alert-danger" role="alert">
    <strong>Errors:&nbsp;</strong>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </div>
@endif
