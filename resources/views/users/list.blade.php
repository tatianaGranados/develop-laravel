<div>
    <div class="text-center container">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createUser">
            <span class="material-icons">person_add</span> Crear Nuevo Usuario
        </button>	
    </div>
@include('users.create')


<div class="input-group">
    <input type="search" wire:model="search" class="form-control" style="width: 240px; background-color: #efefef; flex: 0 1 auto;" placeholder=" Introdusca nombre persona..."/>
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
                    <td class="td-actions text-center">
                        <button wire:click="show({{$user->id_usuario}})" class="btn btn-info btn-simple" data-toggle="modal" data-target="#showUser"><span class="material-icons">person</span></button>
                        <button wire:click="edit({{$user->id_usuario}})" class="btn btn-success btn-simple" data-toggle="modal" data-target="#editUser"><span class="material-icons">create</span></button>
                        <button wire:click="edit({{$user->id_usuario}})" class="btn btn-danger btn-simple" data-toggle="modal" data-target="#delete"><span class="material-icons">close</span></button>
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
 @include('users.show') 
 @include('users.edit')
 @include('errors.modalDelete',['nota'=>'USUARIO: '.$this->paterno.' '.$this->materno.' '.$this->nombres]) 
</div>