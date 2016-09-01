    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Sigenes, sigenes, enes león, león enes, sigenes león, león unam, unam león"/>
    <meta name="author" content="ENES LEÓN" />
    <link rel="shortcut icon" href="{{ asset(env('LOGO_ENES_120')) }}">
    <link rel="apple-touch-icon" href="{{ asset(env('LOGO_ENES_120')) }}">
    <link rel="image_src" type="image/jpeg" href="{{ asset(env('LOGO_ENES_120')) }}" />

    <title>@yield('page_title')</title>

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/semantic/dist/semantic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/angular-advanced-searchbox/dist/angular-advanced-searchbox.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.2/css/bootstrap3/bootstrap-switch.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
    <link href="{{ asset('bower_components/angular-ui-notification/dist/angular-ui-notification.min.css') }}" rel="stylesheet">
    <style>
        html, body {
            background-image: url("/resources/images/fondologo.png");
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
    @yield('extra_css')
