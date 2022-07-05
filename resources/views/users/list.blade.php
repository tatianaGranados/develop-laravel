<div>
    @if(in_array(2, $permisos))
        <div class="text-center container">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createUser">
                <span class="material-icons">person_add</span> Crear Nuevo Usuario
            </button>	
        </div>
        @include('users.create')
    @endif
    

    <div class="input-group">
        <input type="search" wire:model="search" class="form-control" style="width: 240px; background-color: #efefef; flex: 0 1 auto;" placeholder=" Introduzca valor buscado..."/>
        <span class="material-icons input-group-btn">search</span>
    </div>
<br>

<div class="table-responsive">
    <table class="table table-condensed table-bordered table table-striped">
        <thead class="text-center">
            <tr class="table-info">
                <th><strong>N°       </strong></th>
                <th><strong>Apellidos</strong></th>
                <th><strong>Nombres  </strong></th>
                <th><strong>Unidad   </strong></th>
                <th><strong>Roles    </strong></th>
                <th><strong>Acciones </strong></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>	
                    <td>{{ $user->paterno}} {{ $user->materno}} </td>
                    <td>{{ $user->nombres}} 				    </td>
                    <td>{{ $user->nombre_unidad}} 				</td>
                    <td class="td-actions">
                        <table class="table">
                        @foreach ($tipo_roles as $rol)
                            @if ($rol->id_usuario == $user->id_usuario)
                                <tr>
                                    <td>{{$rol->tipo_rol}}</td>
                                    <td class="td-actions text-center" style="width: 80px;">
                                        @if(in_array(6, $permisos))
                                            <button wire:click="editRol({{$rol->id}})" class="btn btn-success btn-simple" data-toggle="modal" data-target="#editRol"><span class="material-icons">create</span></button>
                                        @endif
                                        @if(in_array(7, $permisos))
                                            <button wire:click="editRol({{$rol->id}})" class="btn btn-danger btn-simple" data-toggle="modal" data-target="#deleteRol"><span class="material-icons">close</span></button>
                                        @endif
                                    </td> 
                                </tr>
                            @endif 
                        @endforeach
                        </table>
                    </td>
                    <td class="td-actions text-center">
                        @if(in_array(1, $permisos))
                            <button wire:click="show({{$user->id_usuario}})" class="btn btn-info btn-simple" data-toggle="modal" data-target="#showUser"><span class="material-icons">person</span></button>
                        @endif
                        @if(in_array(3, $permisos))
                            <button wire:click="edit({{$user->id_usuario}})" class="btn btn-success btn-simple" data-toggle="modal" data-target="#editUser"><span class="material-icons">create</span></button>
                        @endif
                        @if(in_array(4, $permisos))
                            <button wire:click="edit({{$user->id_usuario}})" class="btn btn-danger btn-simple" data-toggle="modal" data-target="#delete"><span class="material-icons">close</span></button>
                        @endif
                        @if(in_array(5, $permisos))
                            <button wire:click="showRol({{$user->id_usuario}})" class="btn btn-warning" data-toggle="modal" data-target="#createRol"><span class="material-icons">add</span>rol</button>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No existen registros</td>
                </tr>
            @endforelse
        </tbody>
    </table>
 </div>
    {{$users->links()}}

    @if(in_array(1, $permisos))
        @include('users.show')
    @endif
    @if(in_array(3, $permisos)) 
        @include('users.edit')
    @endif
    @if(in_array(4, $permisos)) 
        @include('errors.modalDelete',['nota'=>'USUARIO: '.$this->paterno.' '.$this->materno.' '.$this->nombres]) 
    @endif
    @if(in_array(5, $permisos))    
        @include('users.createRol')
    @endif
    @if(in_array(6, $permisos))
        @include('users.editRol')
    @endif
    @if(in_array(7, $permisos))
        @include('users.deleteRol')
    @endif
</div>