<!DOCTYPE html>
<html lang="pt-br">
@include('layouts.header', ['title' => $title])

<body id="page-top">
  <div id="wrapper">
    @include('layouts.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">
        @include('layouts.navbar')
        @yield('content')
      </div>

      @include('layouts.footer')
    </div>
  </div>

  @include('layouts.logoutModal')

  @include('layouts.scripts')
</body>

</html>
