<div wire:ignore.self class="modal fade" id="showPe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
                <i class="material-icons">person</i>
				<h5 class="modal-title" id="exampleModalLongTitle">DATOS COMPROBANTE NRO : {{$this->nro_comprobante}}</h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="container">
                    <table class="table table-bordered">
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">description</i><strong> Nro comprobante:</strong></td>
                            <td>{{$this->nro_comprobante}}</td>
                        </tr>
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">description</i><strong> Nro Preventivo:</strong></td>
                            <td>{{$this->nro_preventivo}}</td>
                        </tr>
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">event</i><strong> Fecha Comprobante:</strong></td>
                            <td>{{$this->fecha_comprobante}}</td>
                        </tr>
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">tag</i><strong> Sello:</strong></td>
                            <td>{{$this->sello}}</td>
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
                            <td><i class="material-icons" style="font-size: 15px;">domain</i><strong> Unidad:</strong></td>
                            <td>{{$this->unidad}}</td>
                        </tr>
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">monetization_on</i><strong>Liquido Pagable:</strong></td>
                            <td>
                                <label><strong>+ Total Autorizado: &nbsp;       </strong>{{$this->total_autorizado}}</label><br>
                                <label><strong>- Total Retención:  &nbsp;&nbsp; </strong>{{$this->total_retencion}}<br>
                                <label style="color: rgb(21, 21, 117) !important; "><strong>= Liquido Pagable:  {{$this->liquido_pagable}} </strong></label><br>
                            </td>
                        </tr>
                        <tr class="table-small">
                            <td><i class="material-icons" style="font-size: 15px;">monetization_on</i><strong> Pago Comisión:</strong></td>
                            <td>{{$this->pago_comision}}</td>
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