<div class="container">
    @if(in_array(12, $permisos))
		<div class="text-center">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#create"><span class="material-icons">add </span>CREAR GESTION</button>
		</div>
		@include('gestiones.create')
	@endif

    <div class="table-responsive">
		<table class="table table-condensed table-bordered table-striped">
			<thead class="text-center">
				<tr class="table-info">
					<th><strong>N°      </strong></th>
					<th><strong>ID      </strong></th>
					<th><strong>Gestión </strong></th>
					<th><strong>Acciones</strong></th>    
				</tr>
			</thead>
			<tbody>
				@forelse($gestiones as $gestion)
					<tr class="text-center">
						<td>{{$loop->iteration}} </td>
						<td>{{$gestion->id}}     </td>
						<td>{{$gestion->gestion}}</td>
						<td class="td-actions text-center">
							@if(in_array(13, $permisos))
								<button wire:click="edit({{$gestion->id}})" class="btn btn-success btn-simple" data-toggle="modal" data-target="#edit"><span class="material-icons">create</span></button>
							@endif
							@if(in_array(14, $permisos))
								<button wire:click="edit({{$gestion->id}})" class="btn btn-danger btn-simple" data-toggle="modal" data-target="#delete"><span class="material-icons">close</span></button>
							@endif
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="4" class="text-center">No existe registro de gestiones</td>
					</tr>
				@endforelse
			</tbody>
		</table>
    </div>
	@if(in_array(13, $permisos))
		@include('gestiones.edit')
	@endif
	@if(in_array(14, $permisos))
		@include('errors.modalDelete',['nota'=>'GESTIÓN: '.$this->gestion])
	@endif
</div>    
  
  