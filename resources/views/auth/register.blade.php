@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('Material Dashboard')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-5 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-info card-header-blue text-center">
            <h4 class="card-title"><strong>{{ __('Registro Nuevo Usuario') }}</strong></h4>
          </div>

          <div class="card-body ">
            <div class="bmd-form-group{{ $errors->has('nombres') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="material-icons">face</i></span>
                </div>
                <input type="text" name="nombres" class="form-control" placeholder="{{ __('Nombres...') }}" value="{{ old('nombres') }}" required>
              </div>
              @if ($errors->has('nombres'))
                <div id="name-error" class="error text-danger pl-3" for="nombres" style="display: block;">
                  <strong>{{ $errors->first('nombres') }}</strong>
                </div>
              @endif
            </div>
            

            <div class="bmd-form-group{{ $errors->has('paterno') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="material-icons">face</i></span>
                </div>
                <input type="text" name="paterno" class="form-control" placeholder="{{ __('Paterno...') }}" value="{{ old('paterno') }}">
                <input type="text" name="materno" class="form-control" placeholder="{{ __('Materno...') }}" value="{{ old('materno') }}">
              </div>
              @if ($errors->has('paterno'))
                <div id="name-error" class="error text-danger pl-3" for="nombres" style="display: block;">
                  <strong>{{ $errors->first('paterno') }}</strong>
                </div>
              @endif
              @if ($errors->has('paterno'))
                <div id="name-error" class="error text-danger pl-3" for="nombres" style="display: block;">
                  <strong>{{ $errors->first('paterno') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('username') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="material-icons">face</i></span>
                </div>
                <input type="text" name="username" class="form-control" placeholder="{{ __('Nombre de Usuario...') }}" value="{{ old('username') }}" required>
              </div>
              @if ($errors->has('username'))
                <div id="name-error" class="error text-danger pl-3" for="username" style="display: block;">
                  <strong>{{ $errors->first('username') }}</strong>
                </div>
              @endif
            </div>

            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Correo Electronico...') }}" value="{{ old('email') }}" required>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>

            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="material-icons">lock_outline</i></span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Contraseña...') }}" required>
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>

            <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="material-icons">lock_outline</i></span>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirmar contraseña...') }}" required>
              </div>
              @if ($errors->has('password_confirmation'))
                <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
              @endif
            </div>

          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-info btn-md">{{ __('Crear Cuenta') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
