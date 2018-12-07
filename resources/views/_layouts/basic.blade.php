<!DOCTYPE html>
<html lang="en" data-textdirection="LTR" class="loading">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>DESA</title>
  {{-- 
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('robust/app-assets/images/ico/apple-icon-60.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('robust/app-assets/images/ico/apple-icon-76.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('robust/app-assets/images/ico/apple-icon-120.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('robust/app-assets/images/ico/apple-icon-152.png') }}"> 
  --}}
  {{-- 
  <link rel="apple-touch-icon" sizes="30x30" href="{{ asset('img/png/logo-icon-small.png') }}"> 
  <link rel="shortcut icon" type="image/png" href="{{ asset('img/png/logo-icon-small.png') }}"> 
  --}}
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  @include('_layouts.script-top')
  @yield('script-top')
    
</head>

  @yield('basic-content')

  @include('_layouts.script-bottom')
  @yield('script-bottom')
</html>
