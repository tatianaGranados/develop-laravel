@include('layouts.navbars.navs.guest')

<div class="wrapper wrapper-full-page">
  <div class="page-header login-page header-filter background-page-guest" filter-color="black" data-color="blue">
    @yield('content')
    @include('layouts.footers.guest')
  </div>
</div>