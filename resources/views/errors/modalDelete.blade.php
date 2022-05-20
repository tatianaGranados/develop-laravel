<div wire:ignore.self class="modal fade" id="delete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<form wire:submit.prevent="destroy">
					<p><strong><span class="material-icons" style="color: red">dangerous</span>  ¿ ESTA SEGURO QUE DESEA ELIMINAR EL REGISTRO..?</strong></p>

					<div class="card-footer justify-content-around">
						<button type="submit" class="btn btn-info btn-social"><span class="material-icons">done</span> {{ __('ELIMINAR') }}</button>
						<button type="button" class="btn btn-default" data-dismiss="modal"><span class="material-icons">close</span> CANCELAR</button>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>