<div class="form_group row form-blue">
    <div class="form-group col-md-4">
        <span class="material-icons" style="font-size: 15px;">description</span>
        <label for="nro_comprobante">Nro comprobante:</label>
        <input type="text" class="form-control" id="nro_comprobante" placeholder="nro compro" wire:model="nro_comprobante">
        @error('nro_comprobante')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <span class="material-icons" style="font-size: 15px;">description</span>
        <label for="nro_preventivo">Nro Preventivo:</label>
        <input type="text" class="form-control" id="nro_preventivo" placeholder="nro prevento" wire:model="nro_preventivo">
        @error('nro_preventivo')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <span class="material-icons" style="font-size: 15px;">event</span>
        <label for="fecha_comprobante"> Fecha Comprobante:</label>
        <input type="date" class="form-control" id="fecha_comprobante" wire:model="fecha_comprobante">
        @error('fecha_comprobante')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form_group row form-blue">
    <div class="form-group col-md-4">
        <span class="material-icons" style="font-size: 15px;">tag</span>
        <label for="sello">Sello:</label>
        <input type="text" class="form-control" id="sello" placeholder="Sello" wire:model="sello">
        @error('sello')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <span class="material-icons" style="font-size: 15px;">grading</span>
        <label for="nro_hojas">Nro Hoja:</label>
        <input type="number" class="form-control" id="nro_hojas" placeholder="nro hojas" wire:model="nro_hojas">
        @error('nro_hojas')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <span class="material-icons" style="font-size: 15px;">domain</span>
        <label for="id_unidad">Unidad:</label>
        {!! Form::select('id_unidad',$unidades,null,['class'=>'form-control form-control-sm','placeholder' =>'*Seleccione la Unidad...','wire:model'=>'id_unidad'] )!!}
        @error('id_unidad')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div> 
</div>

<div class="input-group form-blue">
    <div class="input-group-prepend" style="margin: auto">
        <span class="material-icons" style="font-size: 15px;">people_alt</span>
        <label for="beneficiario"> Beneficiario: </label>
    </div>
    <input type="text" class="form-control" id="beneficiario" placeholder="Escribe el beneficiario....." wire:model="beneficiario">
</div>
@error('beneficiario')
	    <span class="text-danger">{{$message}}</span>
@enderror

<div class="form-group form-blue">
    <span class="material-icons" style="font-size: 15px;">web_stories</span>
    <label for="detalle">Detalle:</label>
    <textarea rows="2" class="form-control" id="detalle" placeholder="Escribe el Detalle....." wire:model="detalle"></textarea>
    @error('detalle')
	    <span class="text-danger">{{$message}}</span>
     @enderror
</div>

<div class="form_group row form-blue">
    <div class="form-group col-md-6">
        <span class="material-icons" style="font-size: 15px;">payments</span>
        <label for="nro_cheque">Nro Cheque:</label>
        <input type="text" class="form-control" id="nro_cheque" placeholder="nro cheque" wire:model="nro_cheque">
        @error('nro_cheque')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <span class="material-icons" style="font-size: 15px;">event</span>
        <label for="fecha_cheque">Fecha cheque:</label>
        <input type="date" class="form-control" id="fecha_cheque" wire:model="fecha_cheque">
        @error('fecha_cheque')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form_group row form-blue">
    <div class="form-group col-md-2">
        <span class="material-icons" style="font-size: 15px;">monetization_on</span>
        <label for="t_autorizado">Total Autorizado:</label>
        <input type="number" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" class="form-control" id="t_autorizado" data-toggle="tooltip"  title="####.##" wire:model="total_autorizado">
        @error('t_autorizado')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-2">
        <label for="emite_factura">Factura:</label>
        {!! form::select('emite_factura',['NO'=>'NO','SI'=>'SI'],null,['class'=>'form-control','id'=>'factura','wire:model'=>'emite_factura']) !!}
        @error('emite_factura')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-2">
        <span class="material-icons" style="font-size: 15px;">monetization_on</span>
        <label for="iue">IUE(12,5%):</label>
        <input type="number" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" class="form-control" id="iue" wire:model="iue">
        @error('iue')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-2">
        <span class="material-icons" style="font-size: 15px;">monetization_on</span>
        <label for="it">IT(3%):</label>
        <input type="number" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" class="form-control" id="it"  wire:model="it">
        @error('it')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-2">
        <span class="material-icons" style="font-size: 15px;">monetization_on</span>
        <label for="t_retencion">Total Retención:</label>
        <input type="number" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" class="form-control" id="t_retencion"  wire:model="total_retencion">
        @error('t_retencion')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-2">
        <span class="material-icons" style="font-size: 15px;">monetization_on</span>
        <label for="t_multas">Total Multas:</label>
        <input type="number" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" class="form-control" id="t_multas" onkeyup="liquidoPagable();"  wire:model="total_multas">
        @error('total_multas')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form_group row form-blue">
    <div class="form-group col-md-4">
        <span class="material-icons" style="font-size: 15px;">monetization_on</span>
        <label for="total_garantia">Total Garantia:</label>
        <input type="number" class="form-control" id="total_garantia" placeholder="total garantia" wire:model="total_garantia">
        @error('total_garantia')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <span class="material-icons" style="font-size: 15px;">monetization_on</span>
        <label for="liquidoP">Liquido Pagable:</label>
        <input type="text" class="form-control" id="liquidoP" wire:model="liquido_pagable">
        @error('liquidoP')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    
    <div class="form-group form-check form-check-inline col-md-4" style="justify-content: center; background-color: #00bcd45e; ">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" style="font-weight:800" wire:model="enviado_caja">{{$this->enviado_caja}} ENVIAR COMPROBANTE A CAJA
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

