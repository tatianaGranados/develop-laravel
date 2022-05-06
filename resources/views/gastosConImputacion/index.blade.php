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

                <div class="card-body" > 
                    <div class="table-responsive">
                    <table class="table table-condensed table-bordered table-sm" id="gastosConImp">
                            <thead>
                                <tr>
                                    <th>N° Compr 			</th>
                                    <th>N° preven   	 	</th>
                                    <th>Fecha Comp  		</th>
                                    <th>Sello				</th>
                                    <th>Hojas				</th>
                                    <th>N° cheque			</th>
                                    <th>Fecha Cheque		</th>
                                    <th>Beneficiario		</th>
                                    <th>Monto total cheque  </th>
                                    <th>Detalle				</th>
                                    <th>Total Autorizado	</th>
                                    <th>Factura				</th>
                                    <th>Total retención		</th>
                                    <th>Total multas		</th>
                                    <th>Liquido Pagable		</th>
                                    <th>Pagado 				</th>
                                    <th>Fecha pago 			</th>
                                    <th>Unidad				</th>
                                    <th>Observación			</th>
                                    <th>Tomo				</th>
                                    
                                    <th>Editar detalle		</th>
                                   
                                   
                                    <th>Editar Montos		</th>
                                   
                                   
                                    <th>Editar tomo			</th>
                                   
                                    <th>Editar Total		</th>
                                    
                                    <th>Eliminar			</th>
                                   
                                </tr>
                            </thead>
                            <tbody id="myTable">
                            </tbody>
                    </table>
                    </div>
                </div>

			</div>
		</div>
	</div>
@endsection