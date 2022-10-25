<div class="form_group row form-blue">
    <div class="form-group col-md-2">
        <span class="material-icons" style="font-size: 15px;">monetization_on</span>
        <label for="t_autorizado">Total Autorizado:</label>
        <input type="number" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" class="form-control" onkeyup="liquidoPag();" id="t_autorizado1" value="0" data-toggle="tooltip"  title="####.##" wire:model="total_autorizado">
        @error('total_autorizado')
            <span class="text-danger">{{$message}}</span>
         @enderror
    </div>
    <div class="form-group col-md-2">
        <label for="factura">Factura:</label>
        <select name="factura" class="form-control" id="factura1" onchange="liquidoPag();" onkeyup="liquidoPag();" wire:model="emite_factura">
            <option value="NO">NO</option>
            <option value="SI">SI</option>
        </select>
        @error('factura')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-2">
        <label for="iue">IUE(12,5%):</label>
        <input type="number" step="0.01" name="iue" pattern="^\d+(?:\.\d{1,2})?$" value="{{$this->iue}}" class="form-control" id="iue1">
        @error('iue')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-2">
        <label for="it">IT(3%):</label>
        <input type="number" step="0.01" name="it" pattern="^\d+(?:\.\d{1,2})?$" value="{{$this->it}}" class="form-control" id="it1">
        @error('it')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-2">
        <label for="t_retencion">Total Retención:</label>
        <input type="number" step="0.01" name="total_retencion" pattern="^\d+(?:\.\d{1,2})?$" value="{{$this->total_retencion}}" class="form-control" id="t_retencion1">
        @error('total_retencion')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-2">
        <label for="t_multas">Total Multas:</label>
        <input type="number" name="t_multas" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" class="form-control" id="t_multas1" onkeyup="liquidoPag();" value="0" wire:model = "total_multas">
        @error('total_multas')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>  
</div>

<div class="form_group row form-blue">
    <div class="form-group col-md-4">
        <span class="material-icons" style="font-size: 15px;">monetization_on</span>
        <label for="total_garantia">Total Garantia:</label>
        <input type="number" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" class="form-control" id="t_garantia1" value="0" onkeyup="liquidoPag();" wire:model="total_garantia">
        @error('total_garantia')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <span class="material-icons" style="font-size: 15px;">monetization_on</span>
        <label for="liquidoP">Liquido Pagable:</label>
        <input type="number" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" name="liquido_pagable" value="{{$this->liquido_pagable}}" class="form-control" id="liquidoP1">
        @error('liquido_pagable')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    
    <div class="form-group form-check form-check-inline col-md-4" style="justify-content: center; background-color: #00bcd45e; ">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" style="font-weight:800" wire:model="enviado_caja">
                @if ($this->nro_pago != null || $this->fecha_envio_pago !=null)
                    ENVIAR COMPROBANTE A ARCHIVO
                @else
                    ENVIAR COMPROBANTE A CAJA
                @endif
          
          <span class="form-check-sign">
              <span class="check"></span>
          </span>
        </label>
    </div>
</div>

<script>
    $(function () {
        var campo = $("total_autorizado").val();
        $('[data-toggle="tooltip"]').tooltip(campo)
        })
</script>
