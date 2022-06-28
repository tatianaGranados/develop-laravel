<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>reporte_prestamo_nro</title>
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

        <p style="text-align:right">Nro Prest: {{$datos->nro_prestamo}}</p>
        <h4 style="text-align:center">REGISTRO DE PRESTAMO DE DOCUMENTOS DE GASTOS SIN IMPUTACIÓN</h4>
        <p style="text-align:justify">A requerimiento de la unidad {{$datos->unidad_prestada}} en fecha {{$fecha_prest}} se hace la entrega a {{$datos->funcionario}} , los mismos comprobantes son en calidad de préstamo bajo en siguiente detalle: </p>

        <table class="table" width= 100%>
            <thead>
                <tr class="table-tr">
                    <th style="font-size: 13px;"><strong>N°		     </strong></th>
                    <th style="font-size: 13px;"><strong>N° Deveng   </strong></th>
                    <th style="font-size: 13px;"><strong>Fecha Deveng</strong></th>
                    <th style="font-size: 13px;"><strong>Sello       </strong></th>
                    <th style="font-size: 13px;"><strong>Unidad      </strong></th>
                    <th style="font-size: 13px;"><strong>Beneficiario</strong></th>
                    <th style="font-size: 13px;"><strong>Detalle     </strong></th>			
                </tr>
            </thead>
            <tbody>
                @foreach ($prestados as $gasto)
                    <tr style="font-size: 13px;" class="table-tr">
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td style="text-align:center">{{ $gasto->nro_devengado}}  </td>
                        <td style="text-align:center">{{ $gasto->fecha_devengado}}</td>
                        <td style="text-align:center">{{ $gasto->sello}}          </td>
                        <td>{{ $gasto->nombre_unidad}} 	  </td>
                        <td>{{ $gasto->beneficiario}} 	  </td>
                        <td>{{ $gasto->detalle}} 	      </td> 
                    </tr>                 
                @endforeach
            </tbody>
        </table>


        <table width= 100%>
            <tr style="font-size: 13px;" align="center">
                <td width= 100% style="padding-top: 90px;">
                    <label>___________________________     </label><br>
                    <label style="text-transform: capitalize;">{{$datos->responsable_prestamo}}</label><br> 
                    <label>Responsable del Prestamo        </label><br>
                    <label>Escuela Universitaria de Posgrado - UMSS</label>
                </td>
                <td width= 100% style="padding-top: 90px;">
                    <label>___________________________</label><br>
                    <label  style="text-transform: capitalize;">{{$datos->funcionario}}    </label><br> 
                    <label>Responsable Recepción Prestamo</label><br>
                    <label style="text-transform: capitalize;">{{$datos->unidad_prestada}}</label>
                </td>
            </tr>
        </table>

        <table width= 100%>
            <tr style="font-size: 13px;" align="center">
                <td width= 100% style="padding-top: 90px;">
                    <label>___________________________   </label><br><br>
                    <label>..........................................................</label><br> 
                    <label>Responsable Recepción de Devolucion</label><br>
                    <label>Escuela Universitaria de Posgrado - UMSS</label>
                </td>
                <td width= 100% style="padding-top: 90px;">
                    <label>___________________________   </label><br><br>
                    <label>..........................................................</label><br> 
                    <label>Responsable Devolución</label><br>
                    <label style="text-transform: capitalize;">{{$datos->unidad_prestada}}</label><br>
                    <label>Fecha:...............................</label><br>
                </td>
            </tr>
        </table>
    </body>
</html>