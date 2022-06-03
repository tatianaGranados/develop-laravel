<div wire:ignore.self class="modal fade" id="editGsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      	<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
				<h5 class="modal-title" id="exampleModalCenterTitle">EDITAR COMPROBANTE NRO: {{ $this->nro_devengado }}</h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">
				<form wire:submit.prevent="updateTesoreria">
					@if(in_array(22, $permisos))
						@include('gastosSinImputacion.partials.tesoreria')
					@endif
					{{-- @if(in_array(18, $permisos)) --}}
                    	{{-- @include('gastosSinImputacion.partials.caja') --}}
					{{-- @endif --}}

					<div class="card-footer justify-content-center">
						<button type="submit" class="btn btn-info">{{ __('EDITAR COMPROBANTE') }}</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal">Cerrar</button>
					</div>
				</form>
			</div>
    	</div>
	</div>
</div>