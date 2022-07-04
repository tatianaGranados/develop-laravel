@extends('layouts.app', ['activePage' => 'gastosConImp', 'titlePage' => __('Comprobantes')])

@section('content')
    <div class="card">
        <div class="card-header-blue">
			<h4 class="card-title text-center">{{ __('REPORTE GASTO SIN IMPUTACIÓN GENERADOS') }}</h4>
      	</div>
			<livewire:reportes-sin-imputacion>
      	</div>
   	</div>  
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#show').modal('hide');
    });
</script>
@endsection