<div id="delete{{$valor}}" class="modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				{!! Form::open(array('route' =>[$ruta,$valor],'method'=>'delete')) !!}
				<p class="text-center"><i class="fas fa-exclamation-triangle" style="font-size:30px;color:red"></i> ¿ ESTA SEGURO QUE DESEA ELIMINAR AL USUARIO..?</p>
				<label><small>{{ $nota }}</small></label>
				{!! Form::button('<i class="fas fa-check"></i> Eliminar', array('type'=> 'submit','class'=>'btn btn-success btn-sm'))!!}
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button> 
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>