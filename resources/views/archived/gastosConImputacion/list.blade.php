<div>
	<div class="form-group row text-center" style="padding-bottom: 1px;">
		<label for="id_gestion" class="col-sm-4 text-right" >Gestión:</label>
		<div class="col-sm-4" >
			<select wire:click="changeEvent($event.target.value)" id="id_gestion" class="form-control" >
				@foreach ($gestiones as $gestion)
					<option value="{{$gestion->id}}">{{ $gestion->gestion}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<br>

	<div class="text-center container">
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#createTomoGci">
			<span class="material-icons">note_add</span> Añadir tomo Comprobantes
		</button>	
	</div>
	<br>
	<div class="input-group">
		<input type="search" wire:model="search" class="form-control" style="width: 240px; background-color: #efefef; flex: 0 1 auto;" placeholder=" Introduzca valor buscado..."/>
		<span class="material-icons input-group-btn">search</span>
	</div>
	<div class="table-responsive">
		<table class="table table-condensed table-bordered table-striped">
			<thead class="text-center">
				<tr class="table-info">
					<th style="font-size: 13px;"><strong>N° Compr 		</strong></th>
					<th style="font-size: 13px;"><strong>N° Prev		</strong></th>
					<th style="font-size: 13px;"><strong>Fecha Comp 	</strong></th>
					<th style="font-size: 13px;"><strong>Sello   		</strong></th>
					<th style="font-size: 13px;"><strong>Nro Cheque 	</strong></th>
					<th style="font-size: 13px;"><strong>Fecha Cheque 	</strong></th>
					<th style="font-size: 13px;"><strong>Beneficiario	</strong></th>
					<th style="font-size: 13px;"><strong>Unidad 		</strong></th>
					<th style="font-size: 13px;"><strong>Detalle 		</strong></th>
					<th style="font-size: 13px;"><strong>Liquido Pagable</strong></th>
					<th style="font-size: 13px;"><strong>Agrupar</strong></th>				
				</tr>
			</thead>
			<tbody>
				@forelse ($gastos as $gasto)
					<tr style="font-size: 13px;">
						<td><label for="{{ $gasto->id }}">{{ $gasto->nro_comprobante}}</label>  </td>
						<td><label for="{{ $gasto->id }}"> {{ $gasto->nro_preventivo}} </label>  </td>
						<td>{{ $gasto->fecha_comprobante}}</td>
						<td>{{ $gasto->sello}} 			  </td>
						<td>{{ $gasto->nro_cheque}} 	  </td>
						<td>{{ $gasto->fecha_cheque}} 	  </td>
						<td>{{ $gasto->beneficiario}} 	  </td>
						<td>{{ $gasto->nombre_unidad}} 	  </td>
						<td>{{ $gasto->detalle}} 		  </td>
						<td>{{ $gasto->liquido_pagable}}  </td>
						<td class="text-center">
							<input style="width: 18px; height: 18px;" type="checkbox" value="{{ $gasto->id }}" id="{{ $gasto->id }}" wire:model="agrupadoGci">
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="15" class="text-center">No existen registros</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	{{$gastos->links()}}
	
@include('archived.gastosConImputacion.create') 
	
</div>