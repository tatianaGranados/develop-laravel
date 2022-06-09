@extends('layouts.app', ['activePage' => 'gastosConImp', 'titlePage' => __('Comprobantes')])

@section('content')
    <div class="card">
        <div class="card-header-blue">
			<h4 class="card-title text-center">{{ __('ASIGNAR TOMO GASTOS CON IMPUTACIÓN') }}</h4>
      	</div>
      	<div class="card-body">
			<livewire:archivados-tomo-con-imputacion>
      	</div>
   	</div>  
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#createTomoGci').modal('hide');
    })
</script>
@endsection