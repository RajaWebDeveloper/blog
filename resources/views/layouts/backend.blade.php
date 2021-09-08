<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('backend/app-assets/images/ico/apple-icon-120.png')}}">

    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/bootstrap-admin-template/robust/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/extensions/unslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/weather-icons/climacons.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/app.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/plugins/calendars/clndr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/fonts/meteocons/style.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/style.css')}}">

    @yield('css_cdn')

  </head>

  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
        @include('backend.includes.navbar')
        @include('backend.includes.sidebar')

        @yield('content')

        @include('backend.includes.footer')


    <script src="{{asset('backend/app-assets/vendors/js/vendors.min.js')}}"></script>

    @yield('datatable')

    <script src="{{asset('backend/app-assets/vendors/js/charts/raphael-min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/charts/morris.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/charts/chart.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/extensions/moment.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/extensions/underscore-min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/extensions/clndr.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/charts/echarts/echarts.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/extensions/unslider-min.js')}}"></script>
    <script src="{{asset('backend/app-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/js/core/app.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/js/scripts/customizer.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/js/scripts/pages/dashboard-ecommerce.min.js')}}"></script>

    @yield('script_cdn')

  </body>

</html>
