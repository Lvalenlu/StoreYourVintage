<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <script src="https://kit.fontawesome.com/15e7ed816c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/styles_products.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles_navbar.css')}}">
    <title>Productos</title>
</head>

<body>

    <div id="navbar-container"></div>
    @yield('content')

    <script src="{{asset('js/navbar_loader.js')}}"></script>
    <script src="{{asset('js/script_navbar.js')}}"></script>

</body>
</html>
