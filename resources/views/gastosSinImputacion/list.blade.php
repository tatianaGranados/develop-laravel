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
	@if(in_array(21, $permisos))
		<div class="text-right container">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#createGsi">
				<span class="material-icons">note_add</span> Crear Nuevo Comprobante
			</button>	
		</div>
		@include('gastosSinImputacion.create')
	@endif

	<div class="input-group">
		<input type="search" wire:model="search" class="form-control" style="width: 240px; background-color: #efefef; flex: 0 1 auto;" placeholder=" Introdusca nombre persona..."/>
		<span class="material-icons input-group-btn">search</span>
	</div>
	<br>
	<div class="table-responsive">
		<table class="table table-condensed table-bordered table-striped">
			<thead class="text-center" style="font-size: 13px;">
				<tr class="table-info" style="font-size: 13px;">
					<th style="font-size: 13px;"><strong>N° Dev 		</strong></th>
                    <th style="font-size: 13px;"><strong>Fecha Devengado</strong></th>
					<th style="font-size: 13px;"><strong>Sello   		</strong></th>
					<th style="font-size: 13px;"><strong>Nro Cheque 	</strong></th>
					<th style="font-size: 13px;"><strong>Fecha Cheque 	</strong></th>
					<th style="font-size: 13px;"><strong>Beneficiario	</strong></th>
					<th style="font-size: 13px;"><strong>Unidad 		</strong></th>
					<th style="font-size: 13px;"><strong>Detalle 		</strong></th>
					<th style="font-size: 13px;"><strong>Liquido Pagable</strong></th>
					<th style="font-size: 13px; width: 120px;"><strong>Acciones		</strong></th>
				</tr>
			</thead>
			<tbody>
				@forelse ($gastos as $gasto)
					<tr style="font-size: 13px;">
						<td>{{ $gasto->nro_devengado}}    </td>
						<td>{{ $gasto->fecha_devengado}}</td>
						<td>{{ $gasto->sello}} 			  </td>
						<td>{{ $gasto->nro_cheque}} 	  </td>
						<td>{{ $gasto->fecha_cheque}} 	  </td>
						<td>{{ $gasto->beneficiario}} 	  </td>
						<td>{{ $gasto->nombre_unidad}} 	  </td>
						<td>{{ $gasto->detalle}} 		  </td>
						<td>{{ $gasto->liquido_pagable}}  </td>
						<td class="td-actions text-center">
							@if( in_array(20, $permisos))
								<button wire:click="show({{$gasto->id}})" class="btn btn-info btn-simple" data-toggle="modal" data-target="#showGsi"><span class="material-icons">insert_drive_file</span></button>
							@endif	
							@if( (in_array(22, $permisos) && $gasto->enviado_caja =='NO'  ) || (in_array(23, $permisos) && $gasto->pagado =='NO' ))
								<button wire:click="edit({{$gasto->id}})" class="btn btn-success btn-simple" data-toggle="modal" data-target="#editGsi"><span class="material-icons">create</span></button>
							@endif
							@if (in_array(24, $permisos) && $gasto->enviado_caja =='NO')
								<button wire:click="edit({{$gasto->id}})" class="btn btn-danger btn-simple" data-toggle="modal" data-target="#delete"><span class="material-icons">close</span></button>
							@endif
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
@if( in_array(20, $permisos))
    @include('gastosSinImputacion.show') 
@endif	
@if( (in_array(22, $permisos) && $gasto->enviado_caja =='NO'  ) || (in_array(23, $permisos) && $gasto->pagado =='NO' ))
    @include('gastosSinImputacion.edit') 
@endif
@if (in_array(19, $permisos) && $gasto->enviado_caja =='NO')
    @include('errors.modalDelete',['nota'=>'Comprobante: '.$this->nro_devengado]) 

@endif  
</div>