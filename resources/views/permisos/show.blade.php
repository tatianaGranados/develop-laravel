<div wire:ignore.self class="modal fade" id="showPer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
				<h5 class="modal-title" id="exampleModalLongTitle">{{$this->id_tipo_rol}} ACCESOS ASIGNADOS AL ROL</h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="table-responsive">	
                    <table class="table table-condensed table-bordered table-striped">
                        <thead class="text-center">
                            <tr class="table-info">
                                <th><strong>Nombre Rol        </strong></th>
                                <th><strong>Descripción Rol   </strong></th>
                                <th><strong>Accesos asignados </strong></th>    
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$this->tipo_rol}}      </td>
                                <td>{{$this->desc_tipo_rol}} </td>
                                <td>
                                    @foreach($accesos as $acceso)
                                        @if ($this->id_tipo_rol == $acceso->id_tipo_rol)
                                            <span class="material-icons">{{ $acceso->icono }}</span> {{$acceso->nombre_enlace}}<br>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

				<div class="card-footer justify-content-center">
					<button type="submit" class="btn btn-info">{{ __('CREAR NUEVO ROL') }}</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal">Cerrar</button>
				</div>
			</div>
      	</div>
    </div>
</div>