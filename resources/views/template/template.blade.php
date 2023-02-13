<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Green Travel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/custom.css'])
    <script defer src="{{ URL::asset("assets/js/custom.js")}}"></script>
    <link rel="icon" type="image/jpg" href="{{ URL::asset('favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    @yield('banner')
    @yield('nav')
    @yield('index')
    @yield('category')
    @yield('shoppingCart')
    @yield('user')
    @yield('login')
    @yield('admin')
    @yield('footer')
</body>

</html>
