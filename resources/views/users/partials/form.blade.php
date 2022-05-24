<div class="input-group">
  	<div class="input-group-prepend">
      	<span class="input-group-text"><i class="material-icons">face</i></span>
  	</div>
  	<input type="text" id="nombres" class="form-control" placeholder="{{ __('Nombres...') }}" wire:model="nombres">
</div>
@error('nombres')
	<span class="text-danger">{{$message}}</span>
@enderror

<div class="input-group mt-3">
  	<div class="input-group-prepend">
      	<span class="input-group-text"><i class="material-icons">face</i></span>
  	</div>
	<input type="text" id="paterno" class="form-control" placeholder="{{ __('Paterno...') }}" wire:model="paterno">
	<input type="text" id="materno" class="form-control" placeholder="{{ __('Materno...') }}" wire:model="materno">
</div>
@error('paterno')
    <span class="text-danger">{{$message}}</span>
@enderror
@error('materno')
    <span class="text-danger">{{$message}}</span>
@enderror

<div class="input-group mt-3">
	<div class="input-group-prepend">
		<span class="input-group-text"><i class="material-icons">face</i></span>
	</div>
  	<input type="text" id="username" class="form-control" placeholder="{{ __('Nombre de Usuario...') }}" wire:model="username">	
</div>
@error('username')
	<span class="text-danger">{{$message}}</span>
@enderror

<div class="input-group mt-3">
  	<div class="input-group-prepend">
      	<span class="input-group-text"><i class="material-icons">people_alt</i></span>
  	</div>
	{!! Form::select('genero',['F'=>'femenino','M'=>'masculino'],null,['class'=>'form-control form-control-sm','required'=>'required','wire:model'=>'genero'])!!}
</div>
@error('genero')
    <span class="text-danger">{{$message}}</span>
@enderror

<div class="input-group mt-3">
	<div class="input-group-prepend">
		<span class="input-group-text"><i class="material-icons">email</i></span>
	</div>
	<input type="email" id="email" class="form-control" placeholder="{{ __('*Correo Electronico...') }}" wire:model="email">
</div>
@error('email')
    <span class="text-danger">{{$message}}</span>
@enderror

<div class="input-group mt-3">
  	<div class="input-group-prepend">
      	<span class="input-group-text"><i class="material-icons">domain</i></span>
  	</div>
  	{!! Form::select('id_unidad',$unidades,null,['class'=>'form-control form-control-sm','placeholder' =>'*Seleccione la Unidad...','required'=>'required', 'wire:model'=>'id_unidad'] )!!}
</div>
@error('id_unidad')
    <span class="text-danger">{{$message}}</span>
@enderror

<div class="input-group mt-3">
	<div class="input-group-prepend">
		<span class="input-group-text"><i class="material-icons">lock_outline</i></span>
	</div>
  	<input type="password" id="password" class="form-control" placeholder="{{ __('Contraseña...') }}" wire:model="password" required >
</div>
@error('password')
	<span class="text-danger">{{$message}}</span>
@enderror	

<div class="input-group  mt-3">
	<div class="input-group-prepend">
		<span class="input-group-text"><i class="material-icons">lock_outline</i></span>
	</div>
  	<input type="password" id="password_confirmation" class="form-control" placeholder="{{ __('Confirmar Contraseña...') }}" wire:model="password_confirmation" required>
</div>
@error('password_confirmation')
    <span class="text-danger">{{$message}}</span>
@enderror