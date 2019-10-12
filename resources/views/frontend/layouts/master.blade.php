<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ config('app.name') }}</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Stylesheets -->

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/owl.transitions.css') }}">
{{-- Jquery scripts --}}
<script type="text/javascript" src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

</head>
<body>

  {{-- Preloader Start--}}
  <div class="preloader loader" style="display: block; background:#f2f2f2;">
    <img src="{{ asset('image/loader.gif') }}"  alt="#"/>
  </div>
  {{-- Preloader End --}}

  @include('frontend.partials._header') 
  
  @yield('banner')
  @yield('brands')

  <div class="container">
    @yield('content')
  </div>
  
  @include('frontend.partials._footer') 


  {{-- Scripts --}}
  
  <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jstree.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/template.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/common.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/global.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/parally.js') }}"></script>

  <script>
  $('.parallax').parally({offset: -40});
  </script>
</body>
</html>
