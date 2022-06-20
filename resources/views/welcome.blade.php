@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Material Dashboard')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-8 col-md-8 text-center">
          <h1  style="padding-top:70px;" class="text-white lineUp ">
            {{ __('Bienvenido al Sistema de Comprobantes') }}
          </h1>
          <hr class="hr-guest">
          <h2 class="lineUp"> {{ __('Escuela Universitaria de Posgrado') }}</h2>
      </div>
  </div>
</div>
<style>
  
</style>
@endsection
