@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Comprobantes')])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            	<div class="card-header card-header-info" style="background:linear-gradient(0deg, #2773b9, #003770)">
	                <h5 class="card-title text-center">COMPROBANTE GASTO CON IMPUTACIÓN</h5>
	            </div>
				
				<div class="card-body" > 
					{!! Form::open(['route' =>'gastosConImp.index','method' => 'GET']) !!}
						<div class="form-group row" style="padding-bottom: 1px;">
							{!! form::label('i','Gestión:',['class'=>'col-sm-3 text-right']) !!}
							<div class="col-sm-4">					
								{!! form::select('i',['class'=>'form-control form-control-sm','placeholder'=>'Seleccione','required'=>'required']) !!}
				
							</div>
							<div class="col-sm-2">
							{!! Form::button('<i class="fa fa-check"></i> Cargar', array('type'=> 'submit','class'=>'btn btn-success btn-sm '))!!}
							</div>
						</div>
						{!! form::close() !!}
				</div>
                
			</div>
		</div>
	</div>
@endsection