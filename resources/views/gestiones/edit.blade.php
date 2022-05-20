<div wire:ignore.self class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      	<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
				<h5 class="modal-title" id="exampleModalCenterTitle">EDITAR GESTIÓN</h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">
				<form wire:submit.prevent="update">
					<div class="mb-3 row mt-3">
						<label for="gestion" class="col-sm-4 col-form-label"><span class="material-icons">dataset</span> Gestión</label>
						<div class="col-sm-8">
							<input type="text" id="gestion" class="form-control" wire:model="gestion">
							@error('gestion')
								<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
					</div>

					<div class="card-footer justify-content-center">
						<button type="submit" class="btn btn-info">{{ __('MODIFICAR GESTION') }}</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</form>
			</div>
    	</div>
	</div>
</div>