<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


      <link rel="stylesheet" href="{{asset('daftarngaji/bootstrap/css/bootstrap.min.css')}}">
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="{{asset('daftarngaji/style.css')}}">

      <link rel="stylesheet" href="{{asset('asset\pluggin\air-datepicker\dist\css\datepicker.css')}}">
      <link rel="icon" type="image/png" href="{{asset('daftarngaji/logo.png')}}">
      <title>daftar_ngaji</title>
<!-- stack -->
    @stack('style')

</head>
<body>
<div class="background" style="background-image: url('{{asset('daftarngaji/background.jpg')}}');" >



        <main>
            <!-- <div style="background-image: url('{{asset('daftarngaji/background.jpg')}}');"> -->
              @yield('content')

        </main>


    <!--java Scripts -->
     <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="{{asset('daftarngaji/bootstrap/js/bootstrap.min.js')}}"></script>


    <script type="text/javascript" src="{{asset('asset\pluggin\air-datepicker\dist\js\datepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset\pluggin\air-datepicker\dist\js\i18n\datepicker.en.js')}}"></script>


@stack('scripts')


</body>
</html>
