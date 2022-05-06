@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Comprobantes')])

@section('content')
  <div class="card-body">
    <div class=" iframe-container d-none d-lg-block">
      <iframe>
        <img src="{{ asset('img') }}/login.jpg">      
      </iframe>
    </div>
    </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush