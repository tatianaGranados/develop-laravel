<div wire:ignore.self class="modal fade" id="prestarGsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
                <i class="material-icons">list</i>
				<h5 class="modal-title" id="exampleModalLongTitle">Prestar documentos</h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="container">
                        <form wire:submit.prevent="prestar" enctype="multipart/form-data">
                        @csrf
                        <div class="form_group row form-blue">
                            <div class="form-group col-md-6">
                                <span class="material-icons" style="font-size: 15px;">description</span>
                                <label for="unidad_prestada">Unidad Prestada:</label>
                                <input type="text" wire:model="unidad_prestada" class="form-control" id="unidad_prestada" placeholder="unidad_prestada" name="unidad_prestada">
                                @error('unidad_prestada')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <span class="material-icons" style="font-size: 15px;">event</span>
                                <label for="funcionario">Funcionario:</label>
                                <input type="text" wire:model="funcionario"  class="form-control" id="funcionario" name="funcionario">
                                @error('funcionario')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form_group row form-blue">
                            <div class="form-group col-md-6">
                                <span class="material-icons" style="font-size: 15px;">description</span>
                                <label for="responsable_prestamo">Responsable Prestamo:</label>
                                <input type="text" wire:model="responsable_prestamo" class="form-control" id="responsable_prestamo" placeholder="responsable_prestamo" name="responsable_prestamo">
                                @error('responsable_prestamo')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <span class="material-icons" style="font-size: 15px;">event</span>
                                <label for="fecha_prestamo">Fecha Prestamo:</label>
                                <input type="date" wire:model="fecha_prestamo"  class="form-control" id="fecha_prestamo" name="fecha_prestamo">
                                @error('fecha_prestamo')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <span class="material-icons" style="font-size: 15px;">event</span>
                                <label for="nro_prestamo">Nro Prestamo:</label>
                                <input type="number" wire:model="nro_prestamo"  class="form-control" id="nro_prestamo" name="nro_prestamo" readonly>
                                @error('nro_prestamo')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-condensed table-bordered table-striped">
                                <thead class="text-center" style="font-size: 13px;">
                                    <tr class="table-info" style="font-size: 13px;">
                                        <th style="font-size: 13px;"><strong>N°		     </strong></th>
                                        <th style="font-size: 13px;"><strong>N° Deveng   </strong></th>
                                        <th style="font-size: 13px;"><strong>Fecha Dev   </strong></th>
                                        <th style="font-size: 13px;"><strong>Sello       </strong></th>
                                        <th style="font-size: 13px;"><strong>Unidad      </strong></th>
                                        <th style="font-size: 13px;"><strong>Beneficiario</strong></th>
                                        <th style="font-size: 13px;"><strong>Detalle     </strong></th>			
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($repAgrupados as $gasto)
                                        <tr style="font-size: 13px;">
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{ $gasto->nro_devengado}}  </td>
                                            <td>{{ $gasto->fecha_devengado}}</td>
                                            <td>{{ $gasto->sello}}          </td>
                                            <td>{{ $gasto->nombre_unidad}} 	</td>
                                            <td>{{ $gasto->beneficiario}} 	</td>
                                            <td>{{ $gasto->detalle}} 	    </td> 
                                        </tr> 
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        @error('agrupado')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

						<div class="card-footer justify-content-center">
                            <div class="text-center container">
                                <button type="submit" class="btn btn-info">{{ __('GENERAR PRESTAMO') }}</button>
                            </div>
							<button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal">Cerrar</button>
						</div>
                    </form>
                </div>
			</div>
      	</div>
    </div>
</div>