@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Comprobantes')])

@section('content')
   <div class="card">
      <div class="card-header-blue">
         <h5 class="card-title text-center">CHEQUE LISTOS PARA ENTREGA Y PAGOS ENVIADOS A CUENTA BANCARIA GESTIÓN: {{$gestion}}</h5>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-condensed table-bordered">
               <thead class="text-center">
                  <tr class="table-info">
                     <th colspan="9" style="background-color: #c4cee6">
                        <strong> PAGOS ENVIADOS A CUENTA ELECTRONICA</strong>
                     </th>
                  </tr>
                  <tr class="table-info">
                     <th><strong>N°             </strong></th>
                     <th><strong>Nro Sello      </strong></th>
                     <th><strong>Nro Comprobante</strong></th>
                     <th><strong>Nro Preventivo </strong></th>
                     <th><strong>Beneficiario   </strong></th>
                     <th><strong>Detalle        </strong></th>
                     <th><strong>Nro Pago bancario </strong></th>
                     <th><strong>Fecha envio pago bancario </strong></th>
                     <th><strong>Unidad         </strong></th>

                  </tr>
               </thead>
               <tbody>
                  @forelse ($gastosElec as $gasto)
                  <tr style="font-size: 13px;">
                     <td class="text-center">{{$loop->iteration}}</td>
                     <td>{{ $gasto->sello}} 			  </td>
                     <td>{{ $gasto->nro_comprobante}}</td>
                     <td>{{ $gasto->nro_preventivo}} </td>
                     <td>{{ $gasto->beneficiario}}   </td>
                     <td>{{ $gasto->detalle}} 		  </td>
                     <td>{{ $gasto->nro_pago}} 	  </td>
                     <td>{{ \Carbon\Carbon::parse($gasto->updated_at)->format('d-m-Y') }} </td>
                     <td>{{ $gasto->nombre_unidad}}  </td>
                  </tr>
               @empty
                  <tr>
                     <td colspan="15" class="text-center">NO EXISTEN PAGOS ENVIADOS A CUENTA </td>
                  </tr>
               @endforelse
               </tbody>
            </table>
         </div> 

         <div class="table-responsive">
            <table class="table table-condensed table-bordered">
               <thead class="text-center">
                  <tr class="table-info">
                     <th colspan="9" style="background-color: #c4cee6">
                        <strong> PAGOS LISTO CON CHEQUE<br>
                           *Todos los cheques listados a continuación estan listos para su recojo en cajas de la Escuela Universitaria de Posgrado
                        </strong></th>
                  </tr>
                  <tr class="table-info">
                     <th><strong>N°             </strong></th>
                     <th><strong>Nro Sello      </strong></th>
                     <th><strong>Nro Comprobante</strong></th>
                     <th><strong>Nro Preventivo </strong></th>
                     <th><strong>Beneficiario   </strong></th>
                     <th><strong>Detalle        </strong></th>
                     <th><strong>Nro Cheque     </strong></th>
                     <th><strong>Cheque listo desde </strong></th>
                     <th><strong>Unidad         </strong></th>

                  </tr>
               </thead>
               <tbody>
                  @forelse ($gastos as $gasto)
                  <tr style="font-size: 13px;">
                     <td class="text-center">{{$loop->iteration}}</td>
                     <td>{{ $gasto->sello}} 			  </td>
                     <td>{{ $gasto->nro_comprobante}}</td>
                     <td>{{ $gasto->nro_preventivo}} </td>
                     <td>{{ $gasto->beneficiario}}   </td>
                     <td>{{ $gasto->detalle}} 		  </td>
                     <td>{{ $gasto->nro_cheque}} 	  </td>
                     <td>{{ \Carbon\Carbon::parse($gasto->updated_at)->format('d-m-Y') }} </td>
                     <td>{{ $gasto->nombre_unidad}}  </td>
                  </tr>
               @empty
                  <tr>
                     <td colspan="15" class="text-center">NO EXISTEN CHEQUES PENDIENTE DE COBRO</td>
                  </tr>
               @endforelse
               </tbody>
            </table>
         </div> 
      </div>
   </div>  
@endsection