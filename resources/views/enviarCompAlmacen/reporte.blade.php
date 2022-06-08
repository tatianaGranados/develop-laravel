<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <style>
        .table{
            width: 100%;
            border-collapse: collapse;
        }
        .table-tr th{
            border: 1px solid;
            }
        .table-tr td{
            border: 1px solid;
            }
    </style>
    <body>
        <table width= 100%>
            <tr>
                <th  width= 20%>
                    <img src="img/escudo_umss.png" width="50" height="70">
                </th>
                <th width= 60%  style="text-align:center">
                    <label style="color: rgba(18, 18, 134, 0.671); font-size: 20px;">UNIVERSIDAD MAYOR DE SAN SIMÓN</label><br>
                    <label style="color: rgba(134, 18, 28, 0.801)">VICERRECTORADO</label><br>
                    <label style="color: rgba(134, 18, 28, 0.801)">ESCUELA UNIVERSITARIA DE POSGRADO</label><br>
                    <label>Departamento Gestión Administrativa y Financiera</label>
                </th>
                <th width= 20% >
                    <img src="img/eupg.jpg" width="80" height="70">
                </th>
            </tr>
        </table>
        <hr style="color: rgba(18, 18, 134, 0.671);">

        <table class="table" width= 100%>
            <thead>
                <tr class="table-tr">
                    <th colspan="8" style="font-size: 13px;"><strong>CHEQUES REGISTRADOS A NOMBRE DE TERCEROS</strong></th>			
                </tr>

                <tr class="table-tr">
                    <th colspan="4"  style="font-size: 13px;"><strong>GESTIÓN: </strong></th>
                    <th style="font-size: 12px;"><strong>FECHA ENTREGA         </strong></th>
                    <th colspan="3" style="font-size: 13px;">{{$fecha_entrega_informe}} </th>		
                </tr>

                <tr class="table-tr">
                    <th colspan="4" style="font-size: 13px; height:40px;"><strong> </strong></th>
                    <th colspan="4"><strong>Nro: {{$nro_informe}}</strong></th>		
                </tr>

                <tr class="table-tr">
                    <th style="font-size: 13px;"><strong>N°		    </strong></th>
                    <th style="font-size: 13px;"><strong>Beneficiario</strong></th>
                    <th style="font-size: 13px;"><strong>Nro Cheque </strong></th>
                    <th style="font-size: 13px;"><strong>Monto      </strong></th>
                    <th style="font-size: 13px;"><strong>Fecha Pago </strong></th>
                    <th style="font-size: 13px;"><strong>Unidad 	</strong></th>
                    <th style="font-size: 13px;"><strong>Obser.     </strong></th>
                    <th style="font-size: 13px;"><strong>Sello   	</strong></th>				
                </tr>
            </thead>
            <tbody>
                @foreach ($repAgrupadosGci as $gasto)
                    <tr style="font-size: 13px;" class="table-tr">
                        <td style="text-align: center">{{$loop->iteration}}</td>
                        <td>{{ $gasto->beneficiario}} 	   </td>
                        <td style="text-align:rigth">{{ $gasto->nro_cheque}} 	   </td>
                        <td style="text-align:rigth">{{ $gasto->liquido_pagable}}   </td>
                        <td style="text-align:rigth">{{ $gasto->fecha_entrega_pago}}</td>
                        <td style="text-transform: uppercase;">{{ $gasto->nombre_unidad}}</td>
                        <td>{{ $gasto->observacion_pago}}  </td>
                        <td style="text-align:rigth">{{ $gasto->sello}} 			   </td>                    
                    </tr>
                    @php
                        $iter= $loop->count;
                    @endphp
                @endforeach

                @foreach ($repAgrupadosGsi as $gasto)
                    <tr style="font-size: 13px;" class="table-tr">
                        <td style="text-align: center">{{$loop->iteration + $iter }}</td>
                        <td>{{ $gasto->beneficiario}} 	                            </td>
                        <td style="text-align:rigth">{{ $gasto->nro_cheque}} 	    </td>
                        <td style="text-align:rigth">{{ $gasto->liquido_pagable}}   </td>
                        <td style="text-align:rigth">{{ $gasto->fecha_entrega_pago}}</td>
                        <td style="text-transform: uppercase;">{{ $gasto->nombre_unidad}}</td>
                        <td>{{ $gasto->observacion_pago}}                           </td>
                        <td style="text-align:rigth">{{ $gasto->sello}} 			</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <table width= 100%>
            <tr style="font-size: 13px;" align="center">
                <td style="padding-top: 90px;">
                    <label>___________________________</label><br>
                    <label>Lic. {{ Auth::user()->nombres }} {{ Auth::user()->paterno }} {{ Auth::user()->materno }}</label><br> 
                    <label>Resposable de Caja</label><br>
                    <label>Escuela Universitaria de Posgrado - UMSS</label>
                </td>
                <td style="padding-top: 90px;">
                    <label>___________________________</label><br>
                    <label>Gregorio Bejarano Bolivar</label><br> 
                    <label>Encargado Almacenes y Archivos</label><br>
                    <label>Escuela Universitaria de Posgrado - UMSS</label>
                </td>
            </tr>
        </table>
    </body>
</html>