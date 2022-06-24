<div wire:ignore.self class="modal fade" id="informes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
                <i class="material-icons">list</i>
				<h5 class="modal-title" id="exampleModalLongTitle">INFORMES GENERADOS</h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="container">
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered table-striped">
                            <thead class="text-center" style="font-size: 13px;">
                                <tr class="table-info" style="font-size: 13px;">
                                    <th style="font-size: 13px;"><strong>N°	Informe	      </strong></th>
                                    <th style="font-size: 13px;"><strong>Fecha Informe    </strong></th>
                                    <th style="font-size: 13px;"><strong>Nros Comprobantes</strong></th>
                                    <th style="font-size: 13px;"><strong>Acciones   	  </strong></th>				
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($informes as $informe)
                                <tr class="text-center">
                                    <td>{{$informe->nro_informe}}          </td>
                                    <td>{{$informe->fecha_entrega_informe}}</td>
                                    <td>
                                        @foreach ($gastosInf as $gasto)
                                            @if ($gasto->nro_informe == $informe->nro_informe)
                                               {{$gasto->nro_comprobante}}<br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="td-actions text-center">
                                        <a href="{{ route('reimpresion',$informe->nro_informe)}}" class="btn btn-success btn-simple" target="_blank"><span class="material-icons">print</span></a>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No existe registro de gestiones</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

						<div class="card-footer justify-content-center">
							<button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal">Cerrar</button>
						</div>
                </div>
			</div>
      	</div>
    </div>
</div>