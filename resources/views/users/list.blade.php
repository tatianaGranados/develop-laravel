<div class="text-center container">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createUser">
        <span class="material-icons">person_add</span> Crear Nuevo Usuario
    </button>	
    @include('users.create')
</div>

<br>
<div class="table-responsive">
    <table class="table table-condensed table-bordered">
        <thead class="text-center">
            <tr class="table-info">
                <th><strong>N°       </strong></th>
                <th><strong>Apellidos</strong></th>
                <th><strong>Nombres  </strong></th>
                <th><strong>Unidad 	 </strong></th>
                <th><strong>Acciones </strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="text-center">{{$loop->iteration}}</td>	
                <td>{{ $user->paterno}} {{ $user->materno}} </td>
                <td>{{ $user->nombres}} 				    </td>
                <td>{{ $user->nombre_unidad}} 				</td>
                <td class="td-actions text-center">
                    <button wire:click="edit({{$user->id_usuario}})" class="btn btn-success btn-simple" data-toggle="modal" data-target="#editUser"><span class="material-icons">create</span></button>
					
			
					<button wire:click="delete({{$user->id_usuario}})" class="btn btn-danger btn-simple" data-toggle="modal" data-target="#deleteUser"><span class="material-icons">close</span></button>
					
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @include('users.edit')
	@include('errors.modalDelete',['nota'=>'GESTIÓN: '.$user->paterno.' '.$user->materno.' '.$user->nombres])
 </div> 