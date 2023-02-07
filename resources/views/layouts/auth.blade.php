<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - DUPAK BKBBN</title>
  <link rel="stylesheet" href="{{ asset('voler') }}/assets/css/bootstrap.css">

  <link rel="shortcut icon" href="{{ asset('voler') }}/assets/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('voler') }}/assets/css/app.css">
</head>

<body>
  <div id="auth">

    <div class="container">
      @yield('main-content')
    </div>

  </div>
  <script src="{{ asset('voler') }}/assets/js/feather-icons/feather.min.js"></script>
  <script src="{{ asset('voler') }}/assets/js/app.js"></script>

  <script src="{{ asset('voler') }}/assets/js/main.js"></script>
</body>

</html>
