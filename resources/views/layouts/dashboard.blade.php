<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - DUPAK BKKBN</title>

  <style>
    .alert {
      -webkit-animation: fadein 1s;
    }

    @keyframes fadein {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

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

  {{-- Animasi ALERT --}}
  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 4000);
  </script>

</body>

</html>
