<div class="form_group row form-blue">
    <div class="form-group col-md-4">
        <span class="material-icons" style="font-size: 15px;">description</span>
        <label for="nro_devengado">Nro Devengado:</label>
        <input type="text" class="form-control" id="nro_devengado" placeholder="nro compro" wire:model="nro_devengado">
        @error('nro_devengado')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <span class="material-icons" style="font-size: 15px;">event</span>
        <label for="fecha_devengado"> Fecha Devengado:</label>
        <input type="date" class="form-control" id="fecha_devengado" wire:model="fecha_devengado">
        @error('fecha_devengado')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <span class="material-icons" style="font-size: 15px;">tag</span>
        <label for="sello">Sello:</label>
        <input type="text" class="form-control" id="sello" placeholder="Sello" wire:model="sello">
        @error('sello')
	        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form_group row form-blue">
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
    <div class="form-group col-md-4">
        <span class="material-icons" style="font-size: 15px;">monetization_on</span>
        <label for="liquidoP">Liquido Pagable:</label>
        <input type="number" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" class="form-control" id="liquidoP"  wire:model="liquido_pagable">
        @error('liquidoP')
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
    <div class="form-group form-check form-check-inline col-md-4" style="justify-content: center; background-color: #00bcd45e; height: 70px; ">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" style="font-weight:800" wire:model="enviado_caja"> ENVIAR COMPROBANTE A CAJA
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

