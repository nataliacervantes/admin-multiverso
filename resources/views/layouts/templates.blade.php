<!DOCTYPE html>
<html lang="en">

@include('layouts.head')
<body class="login-img3-body">
  <section id="container" class="">
    {{-- @include('layouts.header') --}}
    {{-- @include('layouts.sidebar') --}}
        @yield('content')
  </section>
    @include('layouts.scripts')
    @yield('scripts')
</body>
</html>
