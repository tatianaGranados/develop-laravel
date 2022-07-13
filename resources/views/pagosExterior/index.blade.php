@extends('layouts.app', ['activePage' => 'pagosExterior', 'titlePage' => __('Pagos Exterior')])

@section('content')
    <div class="card">
        <div class="card-header-blue">
			<h4 class="card-title text-center">{{ __('PAGOS AL EXTERIOR') }}</h4>
      	</div>
      	<div class="card-body">
			<livewire:pagos-exterior>
      	</div>
   	</div>  
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#showPe').modal('hide');
        $('#createPe').modal('hide');
        $('#editPe').modal('hide');
        $('#delete').modal('hide');
    })
</script>
@endsection