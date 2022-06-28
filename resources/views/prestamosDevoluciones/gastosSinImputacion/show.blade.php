<div wire:ignore.self class="modal fade" id="showGsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
                <i class="material-icons">person</i>
				<h5 class="modal-title" id="exampleModalLongTitle">DATOS COMPROBANTE NRO </h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="container">
                    <table class="table table-condensed table-bordered table-striped">
                        <thead class="text-center" style="font-size: 13px;">
                            <tr class="table-info" style="font-size: 13px;">
                                <th style="font-size: 13px;"><strong>N°  		    </strong></th>
                                <th style="font-size: 13px;"><strong>Unidad Prestada</strong></th>
                                <th style="font-size: 13px;"><strong>Funcionario	</strong></th>
                                <th style="font-size: 13px;"><strong>Prestado Por	</strong></th>
                                <th style="font-size: 13px;"><strong>Fecha Prestamo	</strong></th>
                                <th style="font-size: 13px;"><strong>Devuelto	    </strong></th>
                                <th style="font-size: 13px;"><strong>Fecha Devolución</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->reporte_prestamo as $reporte)
                                <tr style="font-size: 13px;">
                                    <td class="text-center">{{$loop->iteration}}</td>	
                                    <td>{{ $reporte->unidad_prestada}}          </td>
                                    <td>{{ $reporte->funcionario}}              </td>
                                    <td>{{ $reporte->responsable_prestamo}}     </td>
                                    <td>{{ $reporte->fecha_prestamo}}           </td>
                                    <td>{{ $reporte->devuelto}}                 </td>
                                    <td>{{ $reporte->fecha_devolucion}}         </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No existen registros de prestamos</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer justify-content-center">
                    <button type="button" class="btn btn-info" data-dismiss="modal" wire:click="closeModal">{{ __('CERRAR INFORMACION') }}</button>
                </div>
			</div>
      	</div>
    </div>
</div>