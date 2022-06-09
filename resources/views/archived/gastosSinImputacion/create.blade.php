<div wire:ignore.self class="modal fade" id="createTomoGsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
                <i class="material-icons">list</i>
				<h5 class="modal-title" id="exampleModalLongTitle"> DATOS ENVIO AGRUPADO TOMO</h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="container">
                    <form wire:submit.prevent="store">
                        @csrf
                        <div class="form_group row form-blue">
                            <div class="form-group col-md-6">
                                <span class="material-icons" style="font-size: 15px;">description</span>
                                <label for="tomo">Nro Tomo:</label>
                                <input type="text" class="form-control" id="tomo" placeholder="nro cheque" name="tomo" wire:model="tomo">
                                @error('tomo')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <span class="material-icons" style="font-size: 15px;">event</span>
                                <label for="fecha_archivado">Fecha Archivado:</label>
                                <input type="date" value="<?php echo date("Y-m-d");?>" class="form-control" id="fecha_archivado" name="fecha_archivado" wire:model="fecha_archivado">
                                @error('fecha_archivado')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        @error('agrupadoGsi')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="table-responsive">
                            <table class="table table-condensed table-bordered table-striped">
                                <thead class="text-center">
                                    <tr class="table-info">
                                        <th style="font-size: 13px;"><strong>N° Devengado   </strong></th>
                                        <th style="font-size: 13px;"><strong>Fecha Deveng	</strong></th>
                                        <th style="font-size: 13px;"><strong>Sello   		</strong></th>
                                        <th style="font-size: 13px;"><strong>Nro Cheque 	</strong></th>
                                        <th style="font-size: 13px;"><strong>Fecha Cheque 	</strong></th>
                                        <th style="font-size: 13px;"><strong>Beneficiario	</strong></th>
                                        <th style="font-size: 13px;"><strong>Unidad 		</strong></th>
                                        <th style="font-size: 13px;"><strong>Detalle 		</strong></th>
                                        <th style="font-size: 13px;"><strong>Liquido Pagable</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($gastosSelec as $gasto)
                                        <tr style="font-size: 13px;" for="{{ $gasto->id }}" >
                                            <td>{{ $gasto->nro_devengado}}  </td>
                                            <td>{{ $gasto->fecha_devengado}}</td>
                                            <td>{{ $gasto->sello}} 			</td>
                                            <td>{{ $gasto->nro_cheque}} 	</td>
                                            <td>{{ $gasto->fecha_cheque}} 	</td>
                                            <td>{{ $gasto->beneficiario}} 	</td>
                                            <td>{{ $gasto->nombre_unidad}}  </td>
                                            <td>{{ $gasto->detalle}} 		</td>
                                            <td>{{ $gasto->liquido_pagable}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="15" class="text-center">
                                                No existe ningun archivo seleccionado
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <div class="shadow-lg mb-3 rounded text-center" style="background-color: #2a50a647 !important;">
                                <h4><strong>*Revise bien el listado que archivara en el tomo</strong></h4> 
                            </div>

						<div class="card-footer justify-content-center">
                            <div class="text-center container">
                                <button type="submit" class="btn btn-info">{{ __('AGRUPAR TOMO') }}</button>
                            </div>
							<button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal">Cerrar</button>
						</div>
                    </form>
                </div>
			</div>
      	</div>
    </div>
</div>