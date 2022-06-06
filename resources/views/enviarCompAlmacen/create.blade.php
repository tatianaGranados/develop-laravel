<div wire:ignore.self class="modal fade" id="createAgrup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
                <i class="material-icons">list</i>
				<h5 class="modal-title" id="exampleModalLongTitle"> DATOS ENVIO AGRUPADO CHEQUES</h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="container">
                    <form wire:submit.prevent="generarReporte">

                        <div class="form_group row form-blue">
                            <div class="form-group col-md-6">
                                <span class="material-icons" style="font-size: 15px;">description</span>
                                <label for="nro_cheque">Nro Informe:</label>
                                <input type="text" class="form-control" id="nro_informe" placeholder="nro cheque" wire:model="nro_informe">
                                @error('nro_informe')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <span class="material-icons" style="font-size: 15px;">event</span>
                                <label for="fecha_entrega_informe">Fecha entrega:</label>
                                <input type="date" class="form-control" id="fecha_entrega_informe" wire:model="fecha_entrega_informe">
                                @error('fecha_entrega_informe')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-condensed table-bordered table-striped">
                                <thead class="text-center" style="font-size: 13px;">
                                    <tr class="table-info" style="font-size: 13px;">
                                        <th style="font-size: 13px;"><strong>N°		    </strong></th>
                                        <th style="font-size: 13px;"><strong>Beneficiario</strong></th>
                                        <th style="font-size: 13px;"><strong>Nro Cheque </strong></th>
                                        <th style="font-size: 13px;"><strong>Monto      </strong></th>
                                        <th style="font-size: 13px;"><strong>Fecha Pago </strong></th>
                                        <th style="font-size: 13px;"><strong>Unidad 	</strong></th>
                                        <th style="font-size: 13px;"><strong>Observación</strong></th>
                                        <th style="font-size: 13px;"><strong>Sello   	</strong></th>				
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($reporteGci as $gasto)
                                    <tr style="font-size: 13px;">
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td>{{ $gasto->beneficiario}} 	   </td>
                                        <td>{{ $gasto->nro_cheque}} 	   </td>
                                        <td>{{ $gasto->liquido_pagable}}   </td>
                                        <td>{{ $gasto->fecha_entrega_pago}}</td>
                                        <td>{{ $gasto->nombre_unidad}} 	   </td>
                                        <td>{{ $gasto->observacion_pago}}  </td>
                                        <td>{{ $gasto->sello}} 			   </td>
                                    </tr>
				@endforeach --}}
                                </tbody>
                            </table>

						<div class="card-footer justify-content-center">
							<button type="submit" class="btn btn-info">{{ __('GENERAR REPORTE') }}</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal">Cerrar</button>
						</div>
                    </form>
                </div>
			</div>
      	</div>
    </div>
</div>