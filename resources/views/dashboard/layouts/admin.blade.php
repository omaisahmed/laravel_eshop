<!DOCTYPE html>
<html lang="en">
    @include('dashboard.partials.head')

<body class="">
  <div class="wrapper ">
    @include('dashboard.partials.sidebar')
    
    <div class="main-panel">
        @include('dashboard.partials.navigation')
          @yield('content')
        @include('dashboard.partials.footer')
    </div>
  </div>
  @include('dashboard.partials.sidebar-filter')
  @include('dashboard.partials.scripts')
  
</body>

</html>