<div class="modal fade" id="showModal{{ $user->id_usuario}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header-blue">
                <i class="material-icons">person</i>
                <h5><strong>INFORMACION USUARIO</strong> </h5>
                <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-left"><i class="material-icons">person</i><strong> Nombre Completo:</strong></td>
                            <td>{{$user->nombres}} {{$user->paterno}} {{$user->materno}}</td>
                        </tr>
                        <tr>
                            <td class="text-left"><i class="material-icons">account_circle</i><strong> UserName:</strong></td>
                            <td>{{$user->username}}</td>
                        </tr>
                        <tr>
                            <td class="text-left"><i class="material-icons">email</i><strong> Correo Electronico:</strong></td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td class="text-left"><span class="material-icons">maps_home_work</span><strong> Unidad:</strong></td>
                            <td>{{$user->nombre_unidad}}</td>
                        </tr>
                        <tr>
                            <td class="text-left"><span class="material-icons"><span class="material-icons">engineering</span></span><strong> Tipo rol:</strong></td>
                            <td>{{$user->tipo_rol}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
