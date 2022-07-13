<div wire:ignore.self class="modal fade" id="showUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      	<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
				<h5 class="modal-title" id="exampleModalCenterTitle">EDITAR GESTIÓN</h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-left"><i class="material-icons">person</i><strong> Nombre Completo:</strong></td>
                            <td>{{$this->nombres}} {{$this->paterno}} {{$this->materno}}</td>
                        </tr>
                        <tr>
                            <td class="text-left"><i class="material-icons">account_circle</i><strong> UserName:</strong></td>
                            <td>{{$this->username}}</td>
                        </tr>
                        <tr>
                            <td class="text-left"><i class="material-icons">email</i><strong> Correo Electronico:</strong></td>
                            <td>{{$this->email}}</td>
                        </tr>
                        <tr>
                            <td class="text-left"><span class="material-icons">maps_home_work</span><strong> Unidad:</strong></td>
                            <td>{{$this->unidad}}</td>
                        </tr>
                        <tr>
                            <td class="text-left"><span class="material-icons"><span class="material-icons">engineering</span></span><strong> Tipo rol:</strong></td>
                            <td>
                                @foreach ($tipo_roles as $rol)
                                    @if ($rol->id_usuario == $this->id_user)
                                      {{$rol->tipo_rol}} <br>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
			</div>
    	</div>
	</div>
</div>