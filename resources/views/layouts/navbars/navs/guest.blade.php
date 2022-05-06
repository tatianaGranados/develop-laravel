<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div class="navbar-wrapper">
      <img width="90" height="90" src="{{ asset('img') }}/logo_umss.png">
      <a class="title-guest-nav" style="padding-left: 10px;" href="/" ><h4> SISTEMA DE COMPROBANTE EUPG </h4></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">EUPG COMP</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
          <a href="{{ route('login') }}" class="nav-link">
            <i class="material-icons">face</i> {{ __('iniciar sesion') }}
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>