<div wire:ignore.self class="modal fade" id="createRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
                <i class="material-icons">person</i>
				<h5 class="modal-title" id="exampleModalLongTitle">CREAR NUEVO ROL</h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="container">
                    <form wire:submit.prevent="storeRol">
						<div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="material-icons">manage_accounts</i></span>
							</div>
							{!! Form::select('id_tipo_rol',$roles,null,['class'=>'form-control form-control-sm','required'=>'required','placeholder' =>'*Seleccione Un Rol...','wire:model'=>'id_tipo_rol'] )!!}
					  	</div>
						@error('id_tipo_rol')
							<span class="text-danger">{{$message}}</span>
						@enderror

						<div class="card-footer justify-content-center">
							<button type="submit" class="btn btn-info">{{ __('CREAR ROL') }}</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal">Cerrar</button>
						</div>
                    </form>
                </div>
			</div>
      	</div>
    </div>
</div>