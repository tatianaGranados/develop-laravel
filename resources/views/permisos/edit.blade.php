<div wire:ignore.self class="modal fade" id="editPer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
				<h5 class="modal-title" id="exampleModalLongTitle">EDITAR ROL ASIGNADO : {{$this->id_tipo_rol}}</h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">
				<form wire:submit.prevent="updatePer">

					<div class="form-group row">
                        <label for="tipo_rol" class="col-md-3">Nombre tipo usuario:</label>
                        <div class="col-md-8">
                            <input type="text" name="tipo_rol" id="tipo_rol" class="form-control" placeholder="{{ __('Introduce el nombre tipo usuario...') }}" wire:model="tipo_rol">
                            @error('tipo_rol')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="desc_tipo_rol" class="col-md-3">Descripción del Rol:</label>
                        <div class="col-md-8">
                            <input type="text" id="desc_tipo_rol" class="form-control" placeholder="{{ __('Introduce los detalles del rol...') }}" wire:model="desc_tipo_rol">
                            @error('desc_tipo_rol')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <thead>
                                <tr class="text-center table-info">
                                    <th class="no-padding"><strong>NRO               </strong></th>
                                    <th class="no-padding"><strong>NOMBRE DEL ACCESO </strong></th>
                                    <th class="no-padding"><strong>ACCESO ASIGNADO   </strong></th>
                                    <th class="no-padding"><strong>ASIGNAR          </strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach( $enlaces as $enlace)
                                        <tr>
                                            <td class="text-center no-padding" >{{ $enlace->id }}</td>
                                            <td class="no-padding">
                                                <span class="material-icons">{{ $enlace->icono }}</span>
                                                <label for="{{ $enlace->id }}"> {{ $enlace->nombre_enlace }}</label>
                                            </td>
                                            <td class="text-center no-padding">
                                                    @foreach($accesos as $acceso)
                                                        @if( $acceso->id_enlace == $enlace->id)
                                                            <span class="material-icons" style="color: green;">check</span>
                                                        @endif
                                                    @endforeach
                                            </td>
                                            <td class="text-center no-padding">
                                                <input class="form-check-input" style="width: 18px; height: 18px; position: relative;" name="permiso[]" type="checkbox" value="{{ $enlace->id }}" id="{{ $enlace->id }}" wire:model ="permisos">
                                            </td>
                                        </tr>
                                    @endforeach
                            <tbody>
                        </table>
                    </div>
					<div class="card-footer justify-content-center">
						<button type="submit" class="btn btn-info">{{ __('EDITAR ROL') }}</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal">Cerrar</button>
					</div>
				</form>
			</div>
      	</div>
    </div>
</div>