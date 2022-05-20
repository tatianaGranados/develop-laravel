<div class="container">
    <div class="text-center">
      	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#create"><span class="material-icons">add </span>CREAR GESTION</button>
    </div>
    @include('gestiones.create')
  
    @if (session()->has('message'))
      	<div class="alert alert-success text-center">{{ session('message') }}</div>
    @endif

    <div class="table-responsive">
		<table class="table table-condensed table-bordered">
			<thead class="text-center">
				<tr class="table-info">
					<th><strong>N°      </strong></th>
					<th><strong>ID      </strong></th>
					<th><strong>Gestión </strong></th>
					<th><strong>Acciones</strong></th>    
				</tr>
			</thead>
			<tbody>
				@foreach($gestiones as $gestion)
					<tr class="text-center">
						<td >{{$loop->iteration}}</td>
						<td>{{$gestion->id}}     </td>
						<td>{{$gestion->gestion}}</td>
						<td class="td-actions text-center">
							<button wire:click="edit({{$gestion->id}})" class="btn btn-success btn-simple" data-toggle="modal" data-target="#edit"><span class="material-icons">create</span></button>
							@include('gestiones.edit')
			
							<button wire:click="edit({{$gestion->id}})" class="btn btn-danger btn-simple" data-toggle="modal" data-target="#delete"><span class="material-icons">close</span></button>
							@include('errors.modalDelete')
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
    </div>
</div>    
  
  