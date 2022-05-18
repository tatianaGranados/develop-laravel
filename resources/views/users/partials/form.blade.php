<form class="form" method="POST" action="{{ route('user.store') }}">
    @csrf
    <div class="card-body ">
        <div class="bmd-form-group mt-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="material-icons">face</i></span>
                </div>
                {!! Form::text('nombres',null,['class'=>'form-control','placeholder' =>'*Nombres...','required'=>'required'])!!}
            </div>
        </div>

        <div class="bmd-form-group mt-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                </div>
                {!! Form::text('paterno',null,['class'=>'form-control','placeholder' =>'Apellido Paterno...'])!!}
                {!! Form::text('materno',null,['class'=>'form-control','placeholder' =>'Apellido Materno...'])!!}
            </div>
        </div>

        <div class="bmd-form-group mt-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="material-icons">account_circle</i></span>
                </div>
                {!! Form::text('username',null,['class'=>'form-control','placeholder' =>'* Nombre de Usuario...','required'=>'required'])!!}
            </div>
        </div>

        <div class="bmd-form-group mt-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="material-icons">people_alt</i></span>
                </div>
                {!! Form::select('genero',['F'=>'femenino','M'=>'masculino'],null,['class'=>'form-control form-control-sm','placeholder' =>'*Seleccione el genero...','required'=>'required'])!!}
            </div>
        </div>

        <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="material-icons">email</i></span>
                </div>
                {!! Form::email('email',null,['class'=>'form-control','placeholder' =>'*Correo Electronico...', 'required'=>'required'])!!}
            </div>
             @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        <div class="bmd-form-group mt-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="material-icons">domain</i></span>
                </div>
                {!! Form::select('unidad',$unidades,null,['class'=>'form-control form-control-sm','placeholder' =>'*Seleccione la Unidad...','required'=>'required'])!!}
            </div>
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
                <div class="input-group-prepend"><span class="input-group-text"><i class="material-icons">lock_outline</i></span>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirmar Contraseña...') }}" required>
            </div>
            @if ($errors->has('password_confirmation'))
                <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="card-footer justify-content-center">
        <button type="submit" class="btn btn-info">{{ __('CREAR USUARIO') }}</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
</form>