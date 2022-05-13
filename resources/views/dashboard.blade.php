@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Comprobantes')])

@section('content')
   <div class="card">
      <div class="card-header-blue">
         <h6 class="card-title text-center">CHEQUE LISTOS PARA ENTREGA</h6>
      </div>
      <div class="card-body">
         <p><strong>*Todos los cheques listados a continuación estan listos para su recojo en cajas de la Escuela Universitaria de Posgrado</strong></p> 
         <div class="table-responsive">
            <table class="table table-condensed table-bordered">
               <thead class="text-center">
                  <tr class="table-info">
                     <th><strong>N°          </strong></th>
                     <th><strong>Gestión     </strong></th>
                     <th><strong>Sello       </strong></th>
                     <th><strong>Beneficiario</strong></th>
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