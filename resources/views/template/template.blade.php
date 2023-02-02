<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Green Travel</title>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>

<body>
    @yield('banner')
    @yield('nav')
    @yield('index')
    @yield('category')
    @yield('shoppingcart')
    @yield('user')
    @yield('admin')
    @yield('footer')
</body>

</html>
