<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top bg-info " style="background-blend-mode: multiply;
background-image: url(https://www.umss.edu.bo/wp-content/uploads/2021/11/5650360.png),linear-gradient(154deg,#003770 90%,#e30613 90%)!important;">
  <div class="container-fluid">
      <img width="60" height="40" src="{{ asset('img') }}/logo_eupg.png">
      {{-- <a class="navbar-brand" href="#">{{ $titlePage }}</a> --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: white" data-toggle="dropdown" href="#0" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">dashboard</i>
            GASTOS CON IMPUTACION</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('gastosConImp.index') }}">GASTOS CON IMPUTACION</a>
            <a class="dropdown-item" href="#0">MIGRAR DATOS</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: white" data-toggle="dropdown" href="#0" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">dashboard</i>
            GASTOS SIN IMPUT(CIERRE)</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#0">GASTOS SIN IMPUTACION</a>
            <a class="dropdown-item" href="#0">MIGRAR DATOS</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: white" data-toggle="dropdown" href="#0" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">shortcut</i>
           PRESTAMOS/DEVOLUCIONES</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#0">GASTOS CONN IMPUTACION</a>
            <a class="dropdown-item" href="#0">GASTOS SIN IMPUTACION</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color: white" role="tab" data-toggle="tab">GESTIONES
            <i class="material-icons">article</i></a>
        </li>
      </ul>

      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons" style="color: white; padding-right: 61px;">person</i>
            <p class="d-lg-none d-md-block">
              {{ __('Account') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-a" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item " style="background-color: #003770 !important; color: white;" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Cerrar sesion') }}</a>
          </div>
        </li>
      </ul>
  </div>
</nav>
