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
							<th><strong>N°          </strong></th>
							<th><strong>Apellidos    </strong></th>
							<th><strong>Nombres       </strong></th>
							<th><strong>Tipo Usuario</strong></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>dfghj  </td>
						</tr>
					</tbody>
            	</table>
         	</div> 
      	</div>
   	</div>  
@endsection