<div>
	<div class="card-body">
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

	<div class="input-group">
		<input type="search" wire:model="search" class="form-control" style="width: 240px; background-color: #efefef; flex: 0 1 auto;" placeholder=" Introdusca nombre persona..."/>
		<span class="material-icons input-group-btn">search</span>
	</div>
	<br>
	<div class="table-responsive">
		<table class="table table-condensed table-bordered table-striped">
			<thead class="text-center" style="font-size: 13px;">
				<tr class="table-info" style="font-size: 13px;">
					<th style="font-size: 13px;"><strong>N° Compr 		</strong></th>
					<th style="font-size: 13px;"><strong>N° Prev		</strong></th>
					<th style="font-size: 13px;"><strong>Fecha Comp 	</strong></th>
					<th style="font-size: 13px;"><strong>Sello   		</strong></th>
					<th style="font-size: 13px;"><strong>Beneficiario	</strong></th>
                    @if($id_unidad_auth == 12)
					<th style="font-size: 13px;"><strong>Unidad 		</strong></th>
                    @endif
					<th style="font-size: 13px;"><strong>Detalle 		</strong></th>
					<th style="font-size: 13px;"><strong>Liquido Pagable</strong></th>
					<th style="font-size: 13px; width: 130px;"><strong>Datos</strong></th>
				</tr>
			</thead>
			<tbody>
				@forelse ($gastos as $gasto)
					<tr style="font-size: 13px;">
						<td>{{ $gasto->nro_comprobante}}  </td>
						<td>{{ $gasto->nro_preventivo}}   </td>
						<td>{{ $gasto->fecha_comprobante}}</td>
						<td>{{ $gasto->sello}} 			  </td>
						<td>{{ $gasto->beneficiario}} 	  </td>
                        @if($id_unidad_auth == 12)
						<td>{{ $gasto->nombre_unidad}} 	  </td>
                        @endif
						<td>{{ $gasto->detalle}} 		  </td>
						<td>{{ $gasto->liquido_pagable}}  </td>
						<td class="td-actions text-center">
							<button wire:click="show({{$gasto->id}})" class="btn btn-info btn-simple" data-toggle="modal" data-target="#show"><span class="material-icons">visibility</span></button>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="15" class="text-center">No existen registros o no tiene asignado una unidad</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>
 {{$gastos->links()}}

@include('reportes.gastosConImputacion.show')
</div>