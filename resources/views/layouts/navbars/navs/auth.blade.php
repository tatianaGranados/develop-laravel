<nav>
    <div class="nav-fostrap" >
        <ul>
            <li><a href=""><img width="50" height="30" src="{{ asset('img') }}/logo_eupg.png"></a></li>
            <li><a href="{{ route('gastosConImp') }}"><i class="material-icons">grading</i> GASTOS CON IMPUTACION</a></li>
            <li><a href=""><i class="material-icons">grading</i> GASTOS SIN IMPUT(CIERRE)</a></li>
            <li><a href="{{ route('gestiones') }}"><i class="material-icons">article</i> ADM. GESTIONES</a></li>

            <li><a href=""><i class="material-icons">widgets</i> PRESTAMOS/DEVOLUCIONES<span class="arrow-down"></span></a>
              <ul class="dropdown-default">
                <li><a href="">Gastos Con Imputación</a></li>
                <li><a  href="#0">Gastos Sin Imputación</a></li>
              </ul>
            </li>

            @switch(Auth::user()->AccesosUserAuth)
              @case(1||2||3||4||5||6||7||8||9||10||11)
                <li><a href=""><i class="material-icons">group</i> ADM. USUARIOS<span class="arrow-down"></span></a>
                  <ul class="dropdown-default">
                    @if(in_array(1, Auth::user()->AccesosUserAuth) || in_array(2, Auth::user()->AccesosUserAuth) || in_array(3, Auth::user()->AccesosUserAuth) || in_array(4, Auth::user()->AccesosUserAuth) ||
                        in_array(5, Auth::user()->AccesosUserAuth) || in_array(6, Auth::user()->AccesosUserAuth) || in_array(7, Auth::user()->AccesosUserAuth) )
                        <li><a href="{{ route('users') }}">Usuarios</a></li>
                    @endif
                    @if(in_array(8, Auth::user()->AccesosUserAuth) || in_array(9, Auth::user()->AccesosUserAuth) || in_array(10, Auth::user()->AccesosUserAuth) || in_array(11, Auth::user()->AccesosUserAuth) )
                      <li><a  href="{{ route('permisos') }}">Permisos</a></li>
                    @endif
                  </ul>
                </li>
              @break
            @endswitch

            <li><a href=""><i class="material-icons">archive</i> ARCHIVAR</a></li>
            <li><a href="javascript:void(0)" ><i class="material-icons">discount</i>MIGRACIONES <span class="arrow-down"></span></a>
              <ul class="dropdown-default">
                <li><a href="">Gastos Con Imputación</a></li>
                <li><a href="">Gastos Sin Imputación</a></li>
              </ul>
            </li>
            <div style="float: right;">
              <li>
                <a href="#" id="navbarDropdownProfile" >
                  <i class="material-icons">person</i> {{ Auth::user()->nombres }}
                  <p class="d-lg-none d-md-block">{{ __('Cuenta') }}</p>
                </a>
                <ul class="dropdown-default">
                  <li><a href="{{ route('profile.edit') }}">Cambiar Contraseña</a></li>
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Cerrar sesion') }}</a></li>
                </ul>
              </li>
            </div>
        </ul>
    </div>
    <div class="nav-bg-fostrap">
        <div class="navbar-fostrap"> <span></span> <span></span> <span></span> </div>
          <a href="" class="title-mobile">{{ __('Comprobantes EUPG') }}</a>
        </div>
</nav>
<script src="{{ asset('js') }}/jquery.min.js"></script>



