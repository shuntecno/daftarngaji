<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->


<link rel="icon" type="image/png" href="{{asset('daftarngaji/logo.png')}}">
    <title>Dashboard Daftar Ngaji</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('dashboard-tem/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard-tem/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard-tem/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard-tem/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('dashboard-tem/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('dashboard-tem/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard-tem/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard-tem/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard-tem/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard-tem/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard-tem/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard-tem/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
      <link rel="stylesheet" href="{{asset('asset\pluggin\air-datepicker\dist\css\datepicker.css')}}">
    <!-- Main CSS-->
    <link href="{{asset('dashboard-tem/css/theme.css')}}" rel="stylesheet" media="all">
    @stack('style')
</head>
<body class="animsition">

    @yield('content')

    <!--java Scripts -->
    <!-- Jquery JS-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="{{asset('dashboard-tem/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('dashboard-tem/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('dashboard-tem/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('dashboard-tem/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('dashboard-tem/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('dashboard-tem/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('dashboard-tem/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('dashboard-tem/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('dashboard-tem/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('dashboard-tem/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('dashboard-tem/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('dashboard-tem/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('dashboard-tem/vendor/select2/select2.min.js')}}">
    </script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <script type="text/javascript" src="{{asset('asset\pluggin\air-datepicker\dist\js\datepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset\pluggin\air-datepicker\dist\js\i18n\datepicker.en.js')}}"></script>


    <!-- Main JS-->
    <script src="{{asset('dashboard-tem/js/main.js')}}"></script>

@stack('scripts')
</body>
</html>
