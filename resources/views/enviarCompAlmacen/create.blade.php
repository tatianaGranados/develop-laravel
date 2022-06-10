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
                    <form name="generarReporte" id="generarReporte" method="post" action="{{url('reporte')}}">
                        {{-- <form name="generarReporte" id="generarReporte" method="post" action="{{url('reporte')}}" target="_blank"> --}}
                        @csrf
                        <div class="form_group row form-blue">
                            <div class="form-group col-md-6">
                                <span class="material-icons" style="font-size: 15px;">description</span>
                                <label for="nro_cheque">Nro Informe:</label>
                                <input type="text" wire:model="nro_informe" class="form-control" id="nro_informe" placeholder="nro cheque" name="nro_informe" required>
                                @error('nro_informe')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <span class="material-icons" style="font-size: 15px;">event</span>
                                <label for="fecha_entrega_informe">Fecha entrega:</label>
                                <input type="date" wire:model="fecha_entrega_informe"  class="form-control" id="fecha_entrega_informe" name="fecha_entrega_informe" required>
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
                                    @foreach ($repAgrupadosGci as $gasto)
                                        <tr style="font-size: 13px;">
                                            <input name="agrupadoGi[]" value="{{ $gasto->id }}" hidden>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{ $gasto->beneficiario}} 	   </td>
                                            <td>{{ $gasto->nro_cheque}} 	   </td>
                                            <td>{{ $gasto->liquido_pagable}}   </td>
                                            <td>{{ $gasto->fecha_entrega_pago}}</td>
                                            <td>{{ $gasto->nombre_unidad}} 	   </td>
                                            <td>{{ $gasto->observacion_pago}}  </td>
                                            <td>{{ $gasto->sello}} 			   </td> 
                                        </tr>
                                        @php
                                            $iter= $loop->count;
                                        @endphp
                                        
                                    @endforeach

                                    @foreach ($repAgrupadosGsi as $gasto)
                                        <tr style="font-size: 13px;">
                                            <input name="agrupadoSi[]" value="{{ $gasto->id }}" hidden>
                                            <td class="text-center">{{$loop->iteration + $iter }}</td>
                                            <td>{{ $gasto->beneficiario}} 	   </td>
                                            <td>{{ $gasto->nro_cheque}} 	   </td>
                                            <td>{{ $gasto->liquido_pagable}}   </td>
                                            <td>{{ $gasto->fecha_entrega_pago}}</td>
                                            <td>{{ $gasto->nombre_unidad}} 	   </td>
                                            <td>{{ $gasto->observacion_pago}}  </td>
                                            <td>{{ $gasto->sello}} 			   </td>
                                        </tr>
                                    @endforeach

                                    @if($repAgrupadosGci->isEmpty() && $repAgrupadosGsi->isEmpty() )
                                        <tr>
                                            <td colspan="8" class="text-center">
                                                <p style="color: red; font-weight: 800;">No existe ningun archivo seleccionado * DEBE SELECCIONAR AL MENOS UNO *</p> 
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="shadow-lg mb-3 rounded text-center" style="background-color: #2a50a647 !important;">
                                <h4><strong>*Revise bien el listado que entregará a almacen antes de generar Reporte</strong></h4> 
                            </div>

						<div class="card-footer justify-content-center">
                            <div class="text-center container">
                                <button type="submit" class="btn btn-info" wire:click="generarReporte">{{ __('GENERAR REPORTE') }}</button>
                            </div>
							<button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal">Cerrar</button>
						</div>
                    </form>
                </div>
			</div>
      	</div>
    </div>
</div>