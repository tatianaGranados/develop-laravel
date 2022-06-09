@extends('layouts.app', ['activePage' => 'gastosConImp', 'titlePage' => __('Comprobantes')])

@section('content')
    <div class="card">
        <div class="card-header-blue">
			<h4 class="card-title text-center">{{ __('ASIGNAR TOMO GASTOS SIN IMPUTACIÓN') }}</h4>
      	</div>
      	<div class="card-body">
			<livewire:archivados-tomo-sin-imputacion>
      	</div>
   	</div>  
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#createTomoGsi').modal('hide');
    })
</script>
@endsection