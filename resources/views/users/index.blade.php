@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Comprobantes')])

@section('content')
    <div class="card">
        <div class="card-header-blue">
			<h4 class="card-title text-center">{{ __('LISTA USUARIOS DEL SISTEMA') }}</h4>
      	</div>
      	<div class="card-body">
			<livewire:users>
      	</div>
   	</div>  
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#showUser').modal('hide');
        $('#createUser').modal('hide');
        $('#editUser').modal('hide');
        $('#delete').modal('hide');
    })
</script>
@endsection
