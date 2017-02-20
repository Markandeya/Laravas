<!DOCTYPE html>
<html lang="en">

  <head>

    @include('partials._header')

  </head>

  <body>

    @include('partials._navbar')

    <div class="container">

      @yield('content')

    </div>

    @include('partials._footer')

  </body>
</html>
