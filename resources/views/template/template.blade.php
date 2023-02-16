<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Green Travel</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js', 'resources/css/custom.css'])
    <script defer src="{{ URL::asset('assets/js/custom.js') }}"></script>
    <link rel="icon" type="image/jpg" href="{{ URL::asset('favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body onload="carga()">
    <div class="loader-parent">
        <img id="loader" src="{{ URL::asset('img/LOGO_VERDE_WEB.png') }}">
        <div id="contenido">
            @yield('banner')
            @yield('nav')
            @yield('index')
            @yield('category')
            @yield('shoppingCart')
            @yield('user')
            @yield('login')
            @yield('admin')
            @yield('footer')
        </div>
    </div>
</body>
</html>
