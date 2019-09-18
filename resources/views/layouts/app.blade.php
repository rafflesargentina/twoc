<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="fb:app_id" content="212897572970001" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Google fonts - Poppins-->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Poppins:300,400,400i,700">
</head>
<body>
  <div id="app"></div>
  <script src="//maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_PLACES_API') }}&libraries=places" async defer></script>

  <script src="//www.gstatic.com/charts/loader.js"></script>
  <script src="//www.google.com/jsapi"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-140810428-1"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-140810428-1');
  </script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
</body>
</html>
