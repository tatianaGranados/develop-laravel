@extends('layouts.app', ['activePage' => 'gastosConImp', 'titlePage' => __('Comprobantes')])

@section('content')
    <div class="card">
        <div class="card-header-blue">
			<h4 class="card-title text-center">{{ __('COMPROBANTES LISTOS PARA ENTREGA ALMACEN') }}</h4>
      	</div>
      	<div class="card-body">
			<livewire:enviar-comp-almacen>
      	</div>
   	</div>  
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#createAgrup').modal('hide');
    })
</script>
@endsection