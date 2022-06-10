<div wire:ignore.self class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
                <i class="material-icons">person</i>
				<h5 class="modal-title" id="exampleModalLongTitle">CREAR GASTO CON IMPUTACIÓN</h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close" onclick="closeModal();" wire:click="closeModal">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="container">
                    <form wire:submit.prevent="store(Object.fromEntries(new FormData($event.target)))">

                        @include('gastosConImputacion.partials.tesoreria')

						<div class="card-footer justify-content-center">
							<button type="submit" class="btn btn-info">{{ __('CREAR COMPROBANTE') }}</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal();"  wire:click="closeModal">Cerrar</button>
						</div>
                    </form>
                </div>
			</div>
      	</div>
    </div>
</div>