@extends('layouts.app', ['activePage' => 'gastosSinnImp', 'titlePage' => __('Comprobantes')])

@section('content')
    <div class="card">
        <div class="card-header-blue">
			<h4 class="card-title text-center">{{ __('COMPROBANTE GASTOS SIN IMPUTACIÓN') }}</h4>
      	</div>
      	<div class="card-body">
			<livewire:gastos-sin-imp>
      	</div>
   	</div>  
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#showGsi').modal('hide');
        $('#createGsi').modal('hide');
        $('#editGsi').modal('hide');
        $('#delete').modal('hide');
    })
</script>
@endsection