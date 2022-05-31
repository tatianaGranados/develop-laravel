<div wire:ignore.self class="modal fade" id="createPer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
				<h5 class="modal-title" id="exampleModalLongTitle">CREAR GESTIÓN</h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">
				<form wire:submit.prevent="storePer">
					permiso

					<div class="card-footer justify-content-center">
						<button type="submit" class="btn btn-info">{{ __('CREAR NUEVO ROL') }}</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal">Cerrar</button>
					</div>
				</form>
			</div>
      	</div>
    </div>
</div>