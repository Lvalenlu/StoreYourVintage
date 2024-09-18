<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/styles_navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles_products.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles_gestor.css')}}">

    <!-- Scripts -->

</head>
<body>
    <div id="app">
        <!-- Aquí está tu barra de navegación personalizada -->
        <nav>
            <ul>
                <li><img src="{{asset('img/logo.png')}}" alt="Logo"></li>
                <li><a href="{{ route('products.index') }}">Productos</a> </li>
                <li><a href="{{ route('customers.index') }}">Usuarios</a></li>
                <li><a href="{{ route('users.index')}}">Gestor</a></li>
                <a class="nav-item nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fa fa-window-close me-2"></i>Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </nav>
        <!-- Fin de la barra de navegación personalizada -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src={{asset('js/gestor.js')}}></script>
    <script src={{asset('js/data_usuarios&user.js')}}></script>
    <script src={{asset('js/navbar_loader.js')}}></script>
    <script src={{asset('js/script_navbar.js')}}></script>
</body>
</html>
