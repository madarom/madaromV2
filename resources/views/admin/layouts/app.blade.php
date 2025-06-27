<!DOCTYPE html>
<html lang="fr">

    <head>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta charset="UTF-8" />
      <title>Mad'Arom | Admin</title>
      <meta content="" name="description">
      <meta content="" name="keywords">

      <!-- Favicons -->
      <link rel="icon" type="image/x-icon" href="/assets/images/favicon_madarom.png">
      <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

      <!-- Google Fonts -->
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

      <!-- Vendor CSS Files -->
      <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
      <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
      <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
      <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">
      <link href="/assets/css/admin.css" rel="stylesheet">

      
      <meta name="csrf-token" content="{{ csrf_token() }}">

      @stack('styles')
    </head>

    <body>
      @include('admin.layouts.header')
      @include('admin.layouts.menu')
      @yield('content')
      <script src="/assets/js/jquery-3.5.1.min.js"></script>
      <script src="/assets/js/bootstrap.min.js"></script>
       <!-- Vendor JS Files -->
      <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
      <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="/assets/vendor/chart.js/chart.umd.js"></script>
      <script src="/assets/vendor/echarts/echarts.min.js"></script>
      <script src="/assets/vendor/quill/quill.min.js"></script>
      <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
      <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
      <script src="/assets/vendor/php-email-form/validate.js"></script>
      <script src="/assets/js/admin.js"></script>
      
      
      @stack('scripts')
    </body>
</html>