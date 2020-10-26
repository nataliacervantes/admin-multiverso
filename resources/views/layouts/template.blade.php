<!DOCTYPE html>
<html lang="en">

@include('layouts.head')
<body>
  <section id="container" class="">
    @include('layouts.header')
    @include('layouts.sidebar')
        @yield('content')
  </section>
    @include('layouts.scripts')
    @yield('scripts')
</body>
</html>

