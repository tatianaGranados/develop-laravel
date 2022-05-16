<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header-blue">
                <i class="material-icons">person</i>
                <h5><strong>CREAR NUEVO USUARIO</strong></h5>
                <button type="button" class="close btn btn-danger btn-simple" data-dismiss="modal" aria-label="Close">
                    <span class="material-icons">close</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <p class="card-description text-center">{{ __('Los campos con * son obligatorios') }}</p>
                    @include('users.partials.form')
                </div>
            </div>
        </div>
    </div>
</div>
