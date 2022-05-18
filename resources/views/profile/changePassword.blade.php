@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
  <div class="container" style="width: 40rem;">
    <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
      @csrf
      @method('put')

      <div class="card">
        <div class="card-header-blue text-center">
          <h4 class="card-title">{{ __('Cambiar Contraseña') }}</h4>
        </div>
        
        <div class="card-body ">
          @if (session('status_password'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('status_password') }}</span>
                </div>
              </div>
            </div>
          @endif

          <div class="row">
            <label class="col-sm-5 col-form-label" for="input-current-password"><span class="material-icons">lock</span> {{ __('Contraseña Actual') }}</label>
              <div class="col-sm-7">
                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                  <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Contraseña Actual') }}" value="" required />
                    @if ($errors->has('old_password'))
                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                    @endif
                  </div>
                </div>
              </div>

              <div class="row">
                  <label class="col-sm-5 col-form-label" for="input-password"><span class="material-icons">lock_outline</span> {{ __('Nueva Contraseña') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('Nueva Contraseña') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-5 col-form-label" for="input-password-confirmation"><span class="material-icons">lock_outline</span> {{ __('Confirmar Nueva Contraseña') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirmar Nueva Contraseña') }}" value="" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-info">{{ __('Cambiar Contraseña') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection