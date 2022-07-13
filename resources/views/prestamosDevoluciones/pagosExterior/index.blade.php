@extends('layouts.app', ['activePage' => 'gastosConImp', 'titlePage' => __('Comprobantes')])

@section('content')
    <div class="card">
        <div class="card-header-blue">
			<h4 class="card-title text-center">{{ __('COMPROBANTES PAGOS EXTERIOR PARA PRESTAR') }}</h4>
      	</div>
      	<div class="card-body">
			<livewire:prest-dev-pagos-exterior>
      	</div>
   	</div>  
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#prestarPe').modal('hide');
		$('#devolverPe').modal('hide');
    })
</script>
@endsection