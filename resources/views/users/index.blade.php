@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Comprobantes')])

@section('content')
    <div class="card">
        <div class="card-header-blue">
         	<h6 class="card-title text-center">LISTA USUARIOS DEL SISTEMA</h6>
      	</div>
      	<div class="card-body">
			<div class="text-center container">
				<button type="button" class="btn btn-success"><span class="material-icons">person_add</span> Crear Nuevo Usuario</button>
			</div>
			<br>
         	<div class="table-responsive">
            	<table class="table table-condensed table-bordered">
					<thead class="text-center">
						<tr class="table-info">
							<th><strong>N°          	</strong></th>
							<th><strong>Apellidos    	</strong></th>
							<th><strong>Nombres       	</strong></th>
							<th><strong>Tipo Rol Usuario</strong></th>
							<th><strong>username		</strong></th>
							<th><strong>Unidad 			</strong></th>
							<th><strong>Acciones		</strong></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $usuario)
						<tr>
							<td class="text-center">{{$loop->iteration}} 	 </td>	
							<td>{{ $usuario->paterno}} {{ $usuario->materno}}</td>
							<td>{{ $usuario->nombres}} 						 </td>
							<td>{{ $usuario->tipo_rol}} 					 </td>
							<td>{{ $usuario->username}} </td>
							<td>{{ $usuario->nombre_unidad}} </td>
							<td class="td-actions text-center">
								<button type="button" rel="tooltip" class="btn btn-info btn-simple">
								<i class="material-icons">person</i>
								</button>
								<button type="button" rel="tooltip" class="btn btn-success btn-simple">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" rel="tooltip" class="btn btn-danger btn-simple">
									<i class="material-icons">close</i>
								</button>
							</td>
						</tr>
						@endforeach
						
						
					</tbody>
            	</table>
         	</div> 
      	</div>
   	</div>  
@endsection