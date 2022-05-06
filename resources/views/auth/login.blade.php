@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('Material Dashboard')])

@section('content')
<div class="container" style="height: auto;">
  	<div class="row align-items-center">
    	<div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      	<form class="form" method="POST" action="{{ route('login') }}">
        	@csrf
        		<div class="card card-login card-hidden mb-3">
          		<div class="card-header card-header-info card-header-blue text-center">
            	<h4 class="card-title"><strong>{{ __('Ingrese al Sistema') }}</strong></h4>
          	</div>

          	<div class="card-body" style="padding-top: 40px;">
					<div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
							<i class="material-icons">email</i>
							</span>
						</div>
						<input type="email" name="email" class="form-control" placeholder="{{ __('Correo Electronico...') }}"  required>
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
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" required>
              </div>

              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recordar') }}
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
          </div>

          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-info btn-link btn-lg">{{ __('INGRESAR') }}</button>
          </div>
        </div>
      </form>


      <div class="row">
        <div class="col-6 text-right">
            <a href="{{ route('register') }}" class="text-light">
                <small>{{ __('Create new account') }}</small>
            </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
