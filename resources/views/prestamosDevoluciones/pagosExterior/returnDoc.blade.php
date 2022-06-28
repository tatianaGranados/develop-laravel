<div wire:ignore.self class="modal fade" id="devolverPe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
                <i class="material-icons">list</i>
				<h5 class="modal-title" id="exampleModalLongTitle">DEVOLVER DOCUMENTO</h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="container">
                        <form wire:submit.prevent="devolver" enctype="multipart/form-data">
                        @csrf

                        <div class="form_group row form-blue">
                            <div class="form-group col-md-6">
                                <span class="material-icons" style="font-size: 15px;">description</span>
                                <label for="responsable_devolucion">Responsable Devolución:</label>
                                <input type="text" wire:model="responsable_devolucion" class="form-control" id="responsable_devolucion" placeholder="responsable_devolucion" name="responsable_devolucion">
                                @error('responsable_devolucion')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <span class="material-icons" style="font-size: 15px;">event</span>
                                <label for="fecha_devolucion">Fecha Devolución:</label>
                                <input type="date" wire:model="fecha_devolucion"  class="form-control" id="fecha_devolucion" name="fecha_devolucion">
                                @error('fecha_devolucion')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-condensed table-bordered table-striped">
                                <thead class="text-center" style="font-size: 13px;">
                                    <tr class="table-info" style="font-size: 13px;">
                                        <th style="font-size: 13px;"><strong>N° Prestamo </strong></th>
                                        <th style="font-size: 13px;"><strong>Fecha Prestamo </strong></th>
                                        <th style="font-size: 13px;"><strong>Unidad Prestada </strong></th>
                                        <th style="font-size: 13px;"><strong>Comprobantes prestados </strong></th>
                                        <th style="font-size: 13px;"><strong>Devolver    </strong></th>	
                                        <th style="font-size: 13px;"><strong>Imprimir    </strong></th>		
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($nro_prestamos as $nro)
                                        <tr style="font-size: 13px;">
                                            <td>{{ $nro->nro_prestamo}}  </td>
                                            <td>{{ $nro->fecha_prestamo}}  </td>
                                            <td>{{ $nro->unidad_prestada}}  </td>
                                            <td>
                                                @foreach ($prestados as $prestado)
                                                    @if ($prestado->nro_prestamo == $nro->nro_prestamo)
                                                        {{ $prestado->nro_comprobante}} <br>
                                                    @endif  
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                <input style="width: 18px; height: 18px;" type="checkbox" value="{{ $nro->nro_prestamo }}" wire:model="nro_devuelto"> 
                                            </td>
                                            <td class="td-actions text-center">
                                                <a href="{{ route('prestarPe', ['id' => $nro->id_agrupado]) }}" class="btn btn-warning" target="_blanck"><span class="material-icons">print</span></a>  
                                            </td>
                                        </tr> 
                                    @empty
                                        <tr>
                                            <td colspan="15" class="text-center">No existen Documentos prestados</td>
                                        </tr>
                                    @endforelse
                                    

                                </tbody>
                            </table>
                        </div>
                        @error('nro_devuelto')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

						<div class="card-footer justify-content-center">
                            <div class="text-center container">
                                <button type="submit" class="btn btn-info">{{ __('DEVOLVER COMPROBANTES') }}</button>
                            </div>
							<button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal">Cerrar</button>
						</div>
                    </form>
                </div>
			</div>
      	</div>
    </div>
</div>