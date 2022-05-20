@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Comprobantes')])

@section('content')
    <div class="card">
        <div class="card-header-blue">
			<h4 class="card-title text-center">{{ __('LISTA USUARIOS DEL SISTEMA') }}</h4>
      	</div>
      	<div class="card-body">
			<div class="text-center container">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#createUser">
					<span class="material-icons">person_add</span> Crear Nuevo Usuario
				</button>	
				@include('users.create')
			</div>

			<button wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3" >Nuevo</button>
				@include('users.create')  
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
								<a href="{{ route('user.show', $user->id_usuario) }}" type="button" class="btn btn-info btn-simple" data-toggle="modal" data-target="#showModal{{ $user->id_usuario}}">
								<span class="material-icons">person</span>
								</a>
								@include('users.show')

								<button type="button" rel="tooltip" class="btn btn-success btn-simple">
								<span class="material-icons">edit</span>
								</button>

								<a href="#delete" type="button" class="btn btn-danger btn-simple" data-target="#delete{{$user->id_usuario}}" data-toggle="modal">
									<span class="material-icons">close</span>
								</a>
								@include('errors.modalDelete',['ruta'=>'user.destroy','valor'=>$user->id_usuario,'nota'=>'Todos los datos del usuario seran eliminados'])
							</td>
						</tr>
						@endforeach
					</tbody>
            	</table>
         	</div> 
      	</div>
   	</div>  
@endsection