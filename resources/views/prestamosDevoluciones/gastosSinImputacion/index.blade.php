@extends('layouts.app', ['activePage' => 'gastosSinImp', 'titlePage' => __('Comprobantes')])

@section('content')
    <div class="card">
        <div class="card-header-blue">
			<h4 class="card-title text-center">{{ __('COMPROBANTES SIN IMPUTACIÓN PARA PRESTAR') }}</h4>
      	</div>
      	<div class="card-body">
			<livewire:prest-dev-sin-imputacion>
      	</div>
   	</div>  
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#prestarGsi').modal('hide');
		$('#devolverGsi').modal('hide');
    })
</script>
@endsection