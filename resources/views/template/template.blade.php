<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Green Travel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/custom.css']);
    <link rel="icon" type="image/jpg" href="./img/LOGO_VERDE_WEB.ico" />
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
