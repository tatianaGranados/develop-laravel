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
        <label for="nro_hojas">Nro Fojas:</label>
        <input type="number" class="form-control" id="nro_hojas" placeholder="nro hojas" wire:model="nro_hojas">
        @error('nro_hojas')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <span class="material-icons" style="font-size: 15px;">domain</span>
        <label for="id_unidad">Unidad:</label>
        <select id="id_unidad" class="form-control" wire:model="id_unidad">
            <option value="">* Seleccion una Unidad...</option>
            @foreach ($unidades as $unidad)
                <option value="{{$unidad->id}}">{{ $unidad->nombre_unidad}}</option>
            @endforeach
        </select>
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
    <div class="form-group col-md-3">
        <span class="material-icons" style="font-size: 15px;">monetization_on</span>
        <label for="total_autorizado">Total Autorizado:</label>
        <input type="number" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" class="form-control" id="total_autorizado" data-toggle="tooltip"  title="####.##" wire:model="total_autorizado">
        @error('total_autorizado')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-3">
        <span class="material-icons" style="font-size: 15px;">monetization_on</span>
        <label for="total_retencion">Total Retención (12,5%):</label>
        <input type="number" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" class="form-control" id="total_retencion"  wire:model="total_retencion">
        @error('total_retencion')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-3">
        <span class="material-icons" style="font-size: 15px;">monetization_on</span>
        <label for="liquido_pagable">Liquido Pagable:</label>
        <input type="number" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" class="form-control" id="liquido_pagable" wire:model="liquido_pagable">
        @error('liquido_pagable')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-3">
        <span class="material-icons" style="font-size: 15px;">monetization_on</span>
        <label for="pago_comision">Pago Comisión:</label>
        <input type="number" class="form-control" id="pago_comision" placeholder="total garantia" wire:model="pago_comision">
        @error('pago_comision')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

</div>

<div class="form_group row form-blue">
    <div class="form-group form-check form-check-inline col-md-4" style="justify-content: center; background-color: #00bcd45e; height: 70px; ">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" style="font-weight:800" wire:model="enviado_archivo"> ENVIAR COMPROBANTE A ARCHIVO
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

