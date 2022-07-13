<div wire:ignore.self class="modal fade" id="showGsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
                <i class="material-icons">person</i>
				<h5 class="modal-title" id="exampleModalLongTitle">DATOS COMPROBANTE NRO : {{$this->nro_devengado}}</h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="container">
                    <table class="table table-bordered">
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">text_snippet</i><strong> Nro Comprobante:</strong></td>
                            <td>{{$this->nro_comprobante}}</td>
                        </tr>
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">description</i><strong> Nro Devengado:</strong></td>
                            <td>{{$this->nro_devengado}}</td>
                        </tr>
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">event</i><strong> Fecha Devengado:</strong></td>
                            <td>{{$this->fecha_devengado}}</td>
                        </tr>
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">tag</i><strong> Sello:</strong></td>
                            <td>{{$this->sello}}</td>
                        </tr>
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">payments</i><strong> Nro Cheque:</strong></td>
                            <td>{{$this->nro_cheque}}</td>
                        </tr>
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">event</i><strong> Feche Cheque:</strong></td>
                            <td>{{$this->fecha_cheque}}</td>
                        </tr>
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">person</i><strong> Beneficiario:</strong></td>
                            <td>{{$this->beneficiario}}</td>
                        </tr>
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">web_stories</i><strong> Detalle:</strong></td>
                            <td>{{$this->detalle}}</td>
                        </tr>
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">web_stories</i><strong> Nro tomo:</strong></td>
                            <td>{{$this->nro_tomo}}</td>
                        </tr>
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">domain</i><strong> Unidad:</strong></td>
                            <td>{{$this->unidad}}</td>
                        </tr>
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">monetization_on</i><strong>Liquido Pagable:</strong></td>
                            <td>
                                <label style="color: rgb(21, 21, 117) !important; "><strong>= Liquido Pagable:  {{$this->liquido_pagable}} </strong></label><br>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer justify-content-center">
                    <button type="button" class="btn btn-info" data-dismiss="modal" wire:click="closeModal">{{ __('CERRAR INFORMACION') }}</button>
                </div>
			</div>
      	</div>
    </div>
</div>