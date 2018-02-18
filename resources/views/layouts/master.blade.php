<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="token" content="{{ csrf_token() }}">
        <meta name="viewpoint" content="width=device-width,initial-scale=1.0,user-scalable=no">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="format-detection" content="telephone=no">
        <meta name="applie-mobile-web-app-capable" content="yes">
        <meta name="applie-mobile-web-app-status-bar-style" content="black">

        <title>@yield('pageTitle', 'Paw Planner')</title>

        <link rel="stylesheet" type="text/css" href="{{ elixir_safe('dist/css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
        @stack('headerStyles')

        @stack('headerScripts')
        <script type="text/javascript" src="{{ elixir_safe('dist/js/vendor.js') }}"></script>

    </head>
    <body>
        <div id="app">
            @include('partials.nav')
            <br>
            @yield('content')
            {{-- @include('partials.footer') --}}
        </div>
        <script type="text/javascript" src="{{ elixir_safe('dist/js/app.js') }}" defer></script>
        
    </body>
</html>
