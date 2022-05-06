	<style type="text/css">
		table{
		border-collapse: collapse;
		/*font-size: 3.1em;*/
		}
		/*.searchStyle
			{
			padding: 5px 100px;
			margin-top: 1px;
			text-align: right !important;
			}*/
		td{
			padding: 6px 5px;
			font-size: 10px;
			border: 1px solid #000;
		}
		th{
			font-size: 10px;
			padding: 6px 5px;
			background-color: #b8daff;
			border: 1px solid #000;
			text-align: center;
	</style>
<div class="container">
	<div class="shadow-lg mb-3 rounded text-center" style="background-color: #2a50a647 !important;">
		<label class="col-md-2"><i class="fas fa-th-list"></i> Gestíon: {{ $gestion->gestion }}</label>
		<label class="col-md-3"><i class="fas fa-calendar-alt"></i> Gestión activa: {{ $gestion->activo }}</label>
		@if(in_array(10,$permisos))
			<a href="{{ route('gastosConImp.create', $gestion->id) }}" role="button" class="btn btn-success"><i class="fa fa-plus"> </i> Nuevo gasto con imputación Total</a>
		@endif
		@if(in_array(11, $permisos))
			<a href="{{ route('gastosConImp.createBase', $gestion->id) }}" role="button" class="btn btn-primary"><i class="fa fa-plus"> </i> Nuevo gasto con imputación</a>
		@endif
	</div>
</div>
		<input class="form-control col-md-4" id="mySearch" type="text" placeholder=" &#9998; Buscar...">

<div class="table-responsive">
<table class="table table-condensed table-bordered table-sm" id="gastosConImp">
	<thead>
		<tr>
			<th>N° Compr 			</th>
			<th>N° preven   	 	</th>
			<th>Fecha Comp  		</th>
			<th>Sello				</th>
			<th>Hojas				</th>
			<th>N° cheque			</th>
			<th>Fecha Cheque		</th>
			<th>Beneficiario		</th>
			<th>Monto total cheque  </th>
			<th>Detalle				</th>
			<th>Total Autorizado	</th>
			<th>Factura				</th>
			<th>Total retención		</th>
			<th>Total multas		</th>
			<th>Liquido Pagable		</th>
			<th>Pagado 				</th>
			<th>Fecha pago 			</th>
			<th>Unidad				</th>
			<th>Observación			</th>
			<th>Tomo				</th>
			@if(in_array(13, $permisos))
			<th>Editar detalle		</th>
			@endif
			@if(in_array(14, $permisos))
			<th>Editar Montos		</th>
			@endif
			@if(in_array(15, $permisos))
			<th>Editar tomo			</th>
			@endif
			@if(in_array(12, $permisos))
			<th>Editar Total		</th>
			@endif
			@if(in_array(16, $permisos) or in_array(17, $permisos) )
			<th>Eliminar			</th>
			@endif
		</tr>
	</thead>
	<tbody id="myTable">

		@foreach ($compGasto as $gasto)
			<tr>
				<td>{{ $gasto->nro_comprobante }}   </td>
				<td>{{ $gasto->nro_preventivo }}   </td>
				<td>{{ $gasto->fecha_comprobante}}</td>
				<td>{{ $gasto->sello }}   </td>
				<td>{{ $gasto->hojas }}   </td>
				<td>{{ $gasto->nro_cheque }}   </td>
				<td>{{ $gasto->fecha_cheque }}   </td>
				<td>{{ $gasto->beneficiario }}   </td>
				<td>{{ $gasto->monto_total_cheque}}   </td>
				<td>{{ $gasto->detalle_pres }}   </td>
				<td>{{ $gasto->total_autorizado }}   </td>
				<td>{{ $gasto->factura}}   </td>
				<td>{{ $gasto->total_retencion }}   </td>
				<td>{{ $gasto->total_multas }}   </td>
				<td>{{ $gasto->liquido_pagable }}   </td>
				<td>{{ $gasto->pagado }}   </td>
				<td>{{ $gasto->fecha_pago }}   </td>
				<td>{{ $gasto->nombre_unidad }}   </td>
				<td>{{ $gasto->observacion }}   </td>
				<td>{{ $gasto->tomo_pres}}   </td>
				@if(in_array(13, $permisos))
					<td class="text-center">
						@if($gasto->enviar_caja=='SI')
							<a role="button"  data-toggle="tooltip" data-placement="left" title="Este comprobante no puede ser editado, ya se envió a caja"><i class="fas fa-edit" style="font-size:20px;color:#6c757d;"></i></a>
						@else
							<a href="{{ route('gastosConImp.editBase', $gasto->id_comp_gasto) }}" role="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="Editar Comprobante"><i class="fas fa-edit"></i></a>
						@endif
					</td>

				@endif
				@if(in_array(14, $permisos))
					<td class="text-center">
						@if($gasto->enviar_caja=='SI')
							@if($gasto->pagado=='NO')
								<a href="{{ route('gastosConImp.editMontos', $gasto->id_comp_gasto) }}" role="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="Editar Montos"><i class="fas fa-edit"></i></a>
							@else
								<a data-toggle="tooltip" data-placement="left" title="Este comprobante no puede ser editado, ya se realizo el pago"><i class="fas fa-edit" style="font-size:20px;color:#6c757d;"></i></a>
							@endif
						@else
							<a role="button" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="left" title="Aun no se paso el comprobante a caja"><i class="fas fa-edit"></i></a>
						@endif
					</td>
				@endif
		
				@if(in_array(15,$permisos))
					<td class="text-center">
						@if($gasto->enviar_caja=='SI' and $gasto->pagado=='SI')
								@if($gasto->archivar=='NO')
									<a href="{{ route('gastosConImp.editTomo', $gasto->id_comp_gasto) }}" role="button" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
								@else
									<a data-toggle="tooltip" data-placement="left" title="Este comprobante no puede ser editado, ya se envió a caja"><i class="fas fa-edit" style="font-size:20px;color:#6c757d;"></i></a>
								@endif
						@else
							<a role="button" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="left" title="Aun no se pagó el comprobante"><i class="fas fa-edit"></i></a>
						@endif
					</td>	
				@endif
				
				@if(in_array(12, $permisos))
					<td>
						<a href="{{ route('gastosConImp.edit', $gasto->id_comp_gasto) }}" role="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>	
					</td>
				@endif
		
				@if(in_array(16, $permisos) or in_array(17, $permisos))
					<td class="text-center">
						@if($gasto->enviar_caja=='NO' or in_array(17, $permisos) )
							<a class="btn btn-danger btn-sm" href="#eliminar"  data-target="#eliminar{{ $gasto->id_comp_gasto}}" data-toggle="modal" ><i class="fas fa-times"></i></a>
								@include('errores.modalEliminar',['ruta'=>'gastosConImp.destroy','valor'=>$gasto->id_comp_gasto,'nota'=>''])
						@else
							<a data-toggle="tooltip" data-placement="left" title="Este comprobante no puede ser eliminado, ya se envio a caja"><i class="fas fa-times" style="font-size:20px;color:red;"></i></a>
						@endif
					</td>
				@endif
			</tr>

		@endforeach  
	</tbody>
</table>
</div>


{{-- {!!$compGasto->link()!!} --}}
{{-- {!! $compGasto->appends(request()->input())->render("pagination::bootstrap-4") !!} --}}
