<!DOCTYPE html>
<html lang="fr">

    <head>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta charset="UTF-8"/>
      <meta property="og:site_name" content="{{app_name()}}">
      <meta property="og:url" content="{{url('')}}">
      <meta property="og:type" content="website">
      @if(\Route::currentRouteName() == 'product.huile_essentiel.detail' || \Route::currentRouteName() == 'product.epice.detail')
      <title>{{app_name()}} - {{i18n_product($product, 'nom')}}</title>
      <meta content="{{substr(i18n_product($product, 'description'), 0, 300)}}" name="description">
      <meta content="{{substr(i18n_product($product, 'description'), 0, 150)}}" name="keywords">
      
      <meta property="og:title" content="{{app_name()}} - {{i18n_product($product, 'nom')}}">
      
      <meta property="og:description" content="{{substr(i18n_product($product, 'description'), 0, 300)}}">
        @if($product->images && count($product->images) >0)
        <meta property="og:image" content="{{ asset('/assets/images/products/'. $product->images[0]->filename) }}">
        @else
        <meta property="og:image" content="{{ asset('assets/images/logo_madarom.png') }}">
        @endif
        <meta property="og:image:width" content="500">
        <meta property="og:image:height" content="500">
      @else
      <title>{{app_name()}} - {{seo('title')}}</title>
      <meta content="{{seo('description')}}" name="description">
      <meta content="{{seo('keywords')}}" name="keywords">
      <meta property="og:title" content="{{app_name()}} - {{seo('title')}}">
      <meta property="og:type" content="website">
      <meta property="og:description" content="{{seo('description')}}">
      <meta property="og:image" content="{{ asset('assets/images/logo_madarom.png') }}">
      <meta property="og:image:width" content="500">
      <meta property="og:image:height" content="500">
      @endif

      
      
      <link rel="stylesheet" href="{{ asset('assets/css/Montserrat.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/css/material-icons.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />
      <link rel="icon" type="image/x-icon" href="/assets/images/favicon_madarom.png">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      @stack('styles')
    </head>

    <body>
        
        @include('layouts.header')
        @yield('content')

        @if(\Route::currentRouteName() != 'maintenance')
        @include('layouts.footer')
        @endif

      <!-- Vendor JS Files -->
      <script src="{{ asset('assets//js/jquery-3.5.1.min.js') }}"></script>
      <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
      @stack('scripts')
    </body>
</html>