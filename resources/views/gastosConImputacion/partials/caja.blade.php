<div class="container">
    @if(in_array(17, $permisos) &&  in_array(18, $permisos))
        <hr>
    @else
        <table class="table table-bordered">
            <tr class="table-small">
                <td><i class="material-icons" style="font-size: 15px;">description</i><strong> Nro comprobante:</strong></td>
                <td>{{$this->nro_comprobante}}</td>

                <td><i class="material-icons" style="font-size: 15px;">payments</i><strong> Nro Cheque:</strong></td>
                <td>{{$this->nro_cheque}}</td>

                <td><i class="material-icons" style="font-size: 15px;">event</i><strong> Feche Cheque:</strong></td>
                <td>{{$this->fecha_cheque}}</td>

            <tr class="table-small">
                <td><i class="material-icons" style="font-size: 15px;">person</i><strong> Beneficiario:</strong></td>
                <td colspan="5">{{$this->beneficiario}}</td>
            </tr>
            <tr class="table-small">
                <td><i class="material-icons" style="font-size: 15px;">web_stories</i><strong> Detalle:</strong></td>
                <td colspan="5">{{$this->detalle}}</td>
            </tr>
            <tr class="table-small">
                <td><i class="material-icons" style="font-size: 15px;">domain</i><strong> Unidad:</strong></td>
                <td colspan="2">{{$this->unidad}}</td>

                <td><i class="material-icons" style="font-size: 15px;">monetization_on</i><strong>Liquido Pagable:</strong></td>
                <td colspan="2"><label style="color: rgb(21, 21, 117) !important; "><strong>= {{$this->liquido_pagable}} </strong></label><br></td>
            </tr>
        </table>  
    @endif
        
    <div class="form_group row form-blue" style="height: 80px;">
        <div class="form-group form-check form-check-inline col-md-12" style="justify-content: center; background-color: #00bcd45e; ">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" id="cheque_listo" style="font-weight:800" wire:model="cheque_listo"> CHEQUE LISTO PARA ENTREGA
              <span class="form-check-sign">
                  <span class="check"></span>
              </span>
            </label>
        </div>
    </div>

    <div class="form-group form-blue">
        <span class="material-icons" style="font-size: 15px;">web_stories</span>
        <label for="observacion_pago">Observación:</label>
        <textarea rows="2" class="form-control" id="observacion_pago" placeholder="Escribe el observacion pago....." wire:model="observacion_pago"></textarea>
        @error('observacion_pago')
            <span class="text-danger">{{$message}}</span>
         @enderror
    </div>

    @if($this->cheque_listo != 'NO' || $this->cheque_listo != 1 )
        <button wire:click="devComprobante()" class="btn btn-danger" data-toggle="modal" data-target="#devComprobante">{{ __('Devolver Comprobante') }}</button>
    @endif

    @if($this->cheque_listo == 'SI' || $this->cheque_listo == 1 )
        <div class="form_group row form-blue">
            <div class="form-group col-md-6">
                <span class="material-icons" style="font-size: 15px;">event</span>
                <label for="fecha_entrega_pago">Fecha Pago:</label>
                <input type="date" class="form-control" id="fecha_entrega_pago" wire:model="fecha_entrega_pago">
                @error('fecha_entrega_pago')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group form-check form-check-inline col-md-6" style="justify-content: center; background-color: #00bcd45e; ">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" style="font-weight:800" wire:model="pagado"> CHEQUE ENTREGADO
                <span class="form-check-sign">
                    <span class="check"></span>
                </span>
                </label>
            </div>
        </div>
    @endif
</div>

