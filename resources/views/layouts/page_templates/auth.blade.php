<div class="wrapper ">
    @include('layouts.navbars.navs.auth')

    <div class="container-fluid" style="padding-top: 70px">
      @yield('content')
    </div>
    @include('layouts.footers.auth')
</div>