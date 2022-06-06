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
                <th class="no-padding"><strong>ACCESO            </strong></th>
            </tr>
        </thead>
        <tbody>
            <th colspan="3" class="text-center table-success no-padding">ACCESO USUARIOS</th>
            @foreach( $enlaceUsuarios as $enlace)
                <tr>
                    <td class="text-center no-padding" >{{ $enlace->id }}</td>
                    <td class="no-padding">
                        <span class="material-icons">{{ $enlace->icono }}</span>
                        <label for="{{ $enlace->id }}"> {{ $enlace->nombre_enlace }}</label>
                    </td>
                    <td class="text-center no-padding">
                        <input class="form-check-input" style="width: 18px; height: 18px; position: relative;" name="permiso[]" type="checkbox" value="{{ $enlace->id }}" id="{{ $enlace->id }}" wire:model ="permisos">
                    </td>
                </tr>
            @endforeach

            <th colspan="3" class="text-center table-success no-padding">ACCESO ROLES Y PERMISOS</th>
            @foreach( $enlacePermisos as $enlace)
                <tr>
                    <td class="text-center no-padding" >{{ $enlace->id }}</td>
                    <td class="no-padding">
                        <span class="material-icons">{{ $enlace->icono }}</span>
                        <label for="{{ $enlace->id }}"> {{ $enlace->nombre_enlace }}</label>
                    </td>
                    <td class="text-center no-padding">
                        <input class="form-check-input" style="width: 18px; height: 18px; position: relative;" name="permiso[]" type="checkbox" value="{{ $enlace->id }}" id="{{ $enlace->id }}" wire:model ="permisos">
                    </td>
                </tr>
            @endforeach

            <th colspan="3" class="text-center table-success no-padding">ACCESO GESTIONES</th>
            @foreach( $enlaceGestiones as $enlace)
                <tr>
                    <td class="text-center no-padding" >{{ $enlace->id }}</td>
                    <td class="no-padding">
                        <span class="material-icons">{{ $enlace->icono }}</span>
                        <label for="{{ $enlace->id }}"> {{ $enlace->nombre_enlace }}</label>
                    </td>
                    <td class="text-center no-padding">
                        <input class="form-check-input" style="width: 18px; height: 18px; position: relative;" name="permiso[]" type="checkbox" value="{{ $enlace->id }}" id="{{ $enlace->id }}" wire:model ="permisos">
                    </td>
                </tr>
            @endforeach

            <th colspan="3" class="text-center table-success no-padding">ACCESOS GASTOS CON IMPUTACIÓN</th>
            @foreach( $enlaceGastosConImp as $enlace)
                <tr>
                    <td class="text-center no-padding" >{{ $enlace->id }}</td>
                    <td class="no-padding">
                        <span class="material-icons">{{ $enlace->icono }}</span>
                        <label for="{{ $enlace->id }}"> {{ $enlace->nombre_enlace }}</label>
                    </td>
                    <td class="text-center no-padding">
                        <input class="form-check-input" style="width: 18px; height: 18px; position: relative;" name="permiso[]" type="checkbox" value="{{ $enlace->id }}" id="{{ $enlace->id }}" wire:model ="permisos">
                    </td>
                </tr>
            @endforeach

            <th colspan="3" class="text-center table-success no-padding">ACCESOS GASTOS SIN IMPUTACIÓN</th>
            @foreach( $enlaceGastosSinImp as $enlace)
                <tr>
                    <td class="text-center no-padding" >{{ $enlace->id }}</td>
                    <td class="no-padding">
                        <span class="material-icons">{{ $enlace->icono }}</span>
                        <label for="{{ $enlace->id }}"> {{ $enlace->nombre_enlace }}</label>
                    </td>
                    <td class="text-center no-padding">
                        <input class="form-check-input" style="width: 18px; height: 18px; position: relative;" name="permiso[]" type="checkbox" value="{{ $enlace->id }}" id="{{ $enlace->id }}" wire:model ="permisos">
                    </td>
                </tr>
            @endforeach

            <th colspan="3" class="text-center table-success no-padding">PAGOS AL EXTERIOR</th>
            @foreach( $pagosExterior as $enlace)
                <tr>
                    <td class="text-center no-padding" >{{ $enlace->id }}</td>
                    <td class="no-padding">
                        <span class="material-icons">{{ $enlace->icono }}</span>
                        <label for="{{ $enlace->id }}"> {{ $enlace->nombre_enlace }}</label>
                    </td>
                    <td class="text-center no-padding">
                        <input class="form-check-input" style="width: 18px; height: 18px; position: relative;" name="permiso[]" type="checkbox" value="{{ $enlace->id }}" id="{{ $enlace->id }}" wire:model ="permisos">
                    </td>
                </tr>
            @endforeach

        <tbody>
    </table>
</div>