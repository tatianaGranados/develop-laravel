@extends('layouts.app', ['activePage' => 'gastosConImp', 'titlePage' => __('Comprobantes')])

@section('content')
    <div class="card">
        <div class="card-header-blue">
			<h4 class="card-title text-center">{{ __('COMPROBANTE GASTO CON IMPUTACIÓN') }}</h4>
      	</div>
      	<div class="card-body">
			<livewire:prest-dev-con-imputacion>
      	</div>
   	</div>  
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#prestarGci').modal('hide');
    })
</script>
@endsection