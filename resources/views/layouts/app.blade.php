<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <title>{{ __('Sistema comprobantes') }}</title>
      <link rel="icon" type="image/png" href="{{ asset('img') }}/eupg.ico">
      @livewireStyles

      <link href="{{ asset('material') }}/icon/icon.css" rel="stylesheet" />
      <link href="{{ asset('css') }}/style.css" rel="stylesheet" />
      <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
      <link href="{{ asset('css') }}/toastr.min.css" rel="stylesheet" />
   </head>

   <body class="{{ $class ?? '' }}">
      @auth()
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
         </form>
         @include('layouts.page_templates.auth')
      @endauth

      @guest()
         @include('layouts.page_templates.guest')
      @endguest

      <!--   Core JS Files   -->
      <script src="{{ asset('js') }}/navbar.js"></script>
      <script src="{{ asset('js') }}/jquery.min.js"></script>
      <script src="{{ asset('material') }}/js/core/popper.min.js"></script>
      <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script>
      <script src="{{ asset('material') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
      <!-- Plugin for the momentJs  -->
      <script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
      <!--  Plugin for Sweet Alert -->
      <script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
      <!-- Forms Validations Plugin -->
      <script src="{{ asset('material') }}/js/plugins/jquery.validate.min.js"></script>
      <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
      <script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker.min.js"></script>
      <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
      <script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
      <!-- Library for adding dinamically elements -->
      <script src="{{ asset('material') }}/js/plugins/arrive.min.js"></script>
      <!--  Notifications Plugin    -->
      <script src="{{ asset('material') }}/js/plugins/bootstrap-notify.js"></script>
      <script src="{{ asset('js') }}/toastr.min.js"></script>

      @stack('js')
      @livewireScripts
      <script>
         window.addEventListener('alert', event => {
            toastr.success(event.detail.message),
            toastr.options= {
               "closeButton": true
            }
         });

         window.addEventListener('error', event => {
            toastr.error(event.detail.message),
            toastr.options= {
               "closeButton": true
            }
         });
      </script>
      @yield('script')
   </body>
</html>