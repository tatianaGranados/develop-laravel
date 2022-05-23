@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Comprobantes')])

@section('content')
<div class="card">
    <div class="card-header-blue">
        <h4 class="card-title text-center">{{ __('GESTIONES CREADAS') }}</h4>
    </div>
    <div class="card-body">
        <livewire:gestiones>
    </div>
</div>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#create').modal('hide');
        $('#edit').modal('hide');
        $('#delete').modal('hide');
    })
</script>

@endsection

