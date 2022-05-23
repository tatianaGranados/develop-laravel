<div wire:ignore.self class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header card-header-blue text-center">
                <i class="material-icons">person</i>
				<h5 class="modal-title" id="exampleModalLongTitle">CREAR NUEVO USUARIO</h5>
				<button type="button" class="close btn-simple" data-dismiss="modal" aria-label="Close">
					<span class="material-icons btn-danger">close</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="container">
                    <p class="card-description text-center">{{ __('Los campos con * son obligatorios') }}</p>
               
                    <form wire:submit.prevent="store">
                        @include('users.partials.form')
                    </form>
                </div>
			</div>
      	</div>
    </div>
</div>