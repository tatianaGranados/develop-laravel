<div>
		<div class="text-center container">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#createAgrup">
				<span class="material-icons">note_add</span> Enviar Agrupado de Cheques
			</button>	
		</div>
	<br>
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
					<th style="font-size: 13px;"><strong>Seleccionar</strong></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($gastosCi as $gasto)
					<tr style="font-size: 13px;">
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{ $gasto->beneficiario}} 	   </td>
                        <td>{{ $gasto->nro_cheque}} 	   </td>
                        <td>{{ $gasto->liquido_pagable}}   </td>
                        <td>{{ $gasto->fecha_entrega_pago}}</td>
						<td>{{ $gasto->nombre_unidad}} 	   </td>
                        <td>{{ $gasto->observacion_pago}}  </td>
						<td>{{ $gasto->sello}} 			   </td>
						<td class="td-actions text-center">
                            <input class="form-check-input" style="width: 18px; height: 18px; position: relative;" name="agrupadoGci" type="checkbox" value="{{ $gasto->id }}" id="{{ $gasto->id }}" wire:model ="agrupadoGci">
						</td>
					</tr>
				@endforeach
                @foreach ($gastosSi as $gasto)
					<tr style="font-size: 13px;">
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{ $gasto->beneficiario}} 	   </td>
                        <td>{{ $gasto->nro_cheque}} 	   </td>
                        <td>{{ $gasto->liquido_pagable}}   </td>
                        <td>{{ $gasto->fecha_entrega_pago}}</td>
						<td>{{ $gasto->nombre_unidad}} 	   </td>
                        <td>{{ $gasto->observacion_pago}}  </td>
						<td>{{ $gasto->sello}} 			   </td>
						<td class="td-actions text-center">
                            <input class="form-check-input" style="width: 18px; height: 18px; position: relative;" name="agrupadoGsi" type="checkbox" value="{{ $gasto->id }}" id="{{ $gasto->id }}" wire:model ="agrupadoSci">
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@include('enviarCompAlmacen.create') 
	
</div>