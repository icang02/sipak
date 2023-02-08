<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - DUPAK BKKBN</title>

  <link rel="stylesheet" href="{{ asset('voler') }}/assets/css/bootstrap.css">

  <link rel="stylesheet" href="{{ asset('voler') }}/assets/vendors/chartjs/Chart.min.css">

  <link rel="stylesheet" href="{{ asset('voler') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" href="{{ asset('voler') }}/assets/css/app.css">
  <link rel="shortcut icon" href="{{ asset('voler') }}/assets/images/favicon.ico" type="image/x-icon">

  {{-- Data table --}}
  <link rel="stylesheet" href="{{ asset('voler') }}/assets/vendors/simple-datatables/style.css">

  {{-- PUSH LINK --}}
  @stack('link')
</head>

<body>
  <div id="app">
    @include('components.dashboard.sidebar')

    <div id="main">
      @include('components.dashboard.navbar')

      @yield('main-content')

      @include('components.dashboard.footer')
    </div>
  </div>
  <script src="{{ asset('voler') }}/assets/js/feather-icons/feather.min.js"></script>
  <script src="{{ asset('voler') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="{{ asset('voler') }}/assets/js/app.js"></script>

  <script src="{{ asset('voler') }}/assets/vendors/chartjs/Chart.min.js"></script>
  <script src="{{ asset('voler') }}/assets/vendors/apexcharts/apexcharts.min.js"></script>
  <script src="{{ asset('voler') }}/assets/js/pages/dashboard.js"></script>

  <script src="{{ asset('voler') }}/assets/js/main.js"></script>

  {{-- Data table --}}
  <script src="{{ asset('voler') }}/assets/vendors/simple-datatables/simple-datatables.js"></script>
  @if (!request()->is('dashboard'))
    <script src="{{ asset('voler') }}/assets/js/vendors.js"></script>
  @endif

  @stack('script')

</body>

</html>
