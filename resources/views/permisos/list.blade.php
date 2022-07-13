<div class="container">
    @if(in_array(9, Auth::user()->AccesosUserAuth))
        <div class="text-center">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createPer"><span class="material-icons">add </span>CREAR NUEVO ROL</button>
        </div>
        @include('permisos.create')
    @endif

    <div class="table-responsive">
		<table class="table table-condensed table-bordered table-striped">
			<thead class="text-center">
				<tr class="table-info">
					<th><strong>N°         </strong></th>
					<th><strong>Nombre Rol </strong></th>
					<th><strong>Acciones   </strong></th>    
				</tr>
			</thead>
			<tbody>
				@forelse($roles as $rol)
					<tr class="text-center">
						<td>{{$loop->iteration}} </td>
						<td>{{$rol->tipo_rol}}   </td>
						<td class="td-actions text-center">
                            @if(in_array(8, Auth::user()->AccesosUserAuth))
                                <button wire:click="showPer({{$rol->id}})" class="btn btn-info btn-simple" data-toggle="modal" data-target="#showPer"><span class="material-icons">format_list_bulleted</span></button>
                            @endif
                            @if(in_array(10, Auth::user()->AccesosUserAuth))
                                <button wire:click="editPer({{$rol->id}})" class="btn btn-success btn-simple" data-toggle="modal" data-target="#editPer"><span class="material-icons">create</span></button>
                            @endif
                            @if(in_array(11, Auth::user()->AccesosUserAuth))
                                <button wire:click="editPer({{$rol->id}})" class="btn btn-danger btn-simple" data-toggle="modal" data-target="#delete"><span class="material-icons">close</span></button>
                            @endif
                            </td>
					</tr>
				@empty
					<tr>
						<td colspan="4" class="text-center">No existe registro de roles</td>
					</tr>
				@endforelse
			</tbody>
		</table>
    </div>
    @if(in_array(8, Auth::user()->AccesosUserAuth))
        @include('permisos.show') 
    @endif
    @if(in_array(10, Auth::user()->AccesosUserAuth))
        @include('permisos.edit') 
    @endif
    @if(in_array(11, Auth::user()->AccesosUserAuth))   
        @include('errors.modalDelete',['nota'=>'Elimando rol: '.$this->tipo_rol]) 
    @endif
</div>    
  
  