@extends('layouts.app', ['activePage' => 'permisos', 'titlePage' => __('Comprobantes')])

@section('content')
<div class="card">
    <div class="card-header-blue">
        <h4 class="card-title text-center">{{ __('ADMINISTRACIÓN DE PERMISOS') }}</h4>
    </div>
    <div class="card-body">
        <livewire:permisos>
    </div>
</div>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#createPer').modal('hide');
        $('#showPer').modal('hide');
        $('#editPer').modal('hide');
        $('#delete').modal('hide');
    })
</script>
@endsection
