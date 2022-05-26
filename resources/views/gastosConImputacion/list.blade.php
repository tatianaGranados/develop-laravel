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
	
	<div class="text-right container">
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#create">
			<span class="material-icons">note_add</span> Crear Nuevo Comprobante
		</button>	
	</div>

	@include('gastosConImputacion.create')

	{{-- <div class="input-group">
		<input type="search" wire:model="search" class="form-control" style="width: 240px; background-color: #efefef; flex: 0 1 auto;" placeholder=" Introdusca nombre persona..."/>
		<span class="material-icons input-group-btn">search</span>
	</div> --}}
	<br>
	<div class="table-responsive">
		<table class="table table-condensed table-bordered table table-striped">
			<thead class="text-center" style="font-size: 13px;">
				<tr class="table-info" style="font-size: 13px;">
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
					<th style="font-size: 13px;"><strong>Total Retención</strong></th>
					<th style="font-size: 13px;"><strong>Total Multas 	</strong></th>
					<th style="font-size: 13px;"><strong>Total Garantia </strong></th>
					<th style="font-size: 13px;"><strong>Factura		</strong></th>
					<th style="font-size: 13px;"><strong>Acciones		</strong></th>
				</tr>
			</thead>
			<tbody>
				@forelse ($gastos as $gasto)
					<tr style="font-size: 13px;">
						<td>{{ $gasto->nro_comprobante}}  </td>
						<td>{{ $gasto->nro_preventivo}}   </td>
						<td>{{ $gasto->fecha_comprobante}}</td>
						<td>{{ $gasto->sello}} 			  </td>
						<td>{{ $gasto->nro_cheque}} 	  </td>
						<td>{{ $gasto->fecha_cheque}} 	  </td>
						<td>{{ $gasto->beneficiario}} 	  </td>
						<td>{{ $gasto->nombre_unidad}} 		  </td>
						<td>{{ $gasto->detalle}} 		  </td>
						<td>{{ $gasto->liquido_pagable}}  </td>
						<td>{{ $gasto->total_retencion}}  </td>
						<td>{{ $gasto->total_multas}} 	  </td>
						<td>{{ $gasto->total_garantia}}   </td>
						<td>{{ $gasto->emite_factura}} 	  </td>

						<td class="td-actions text-center">
							{{-- <button wire:click="show({{$gasto->id_usuario}})" class="btn btn-info btn-simple" data-toggle="modal" data-target="#showUser"><span class="material-icons">person</span></button>
							<button wire:click="edit({{$gasto->id_usuario}})" class="btn btn-success btn-simple" data-toggle="modal" data-target="#editUser"><span class="material-icons">create</span></button>
							<button wire:click="edit({{$gasto->id_usuario}})" class="btn btn-danger btn-simple" data-toggle="modal" data-target="#delete"><span class="material-icons">close</span></button> --}}
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
 {{-- {{$users->links()}}
 @include('users.show') 
 @include('users.edit')
 @include('errors.modalDelete',['nota'=>'USUARIO: '.$this->paterno.' '.$this->materno.' '.$this->nombres])  --}}
</div>