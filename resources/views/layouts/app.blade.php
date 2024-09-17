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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <!-- Aquí está tu barra de navegación personalizada -->
        <nav>
            <ul class="sidebar">
                <li onclick=ocultarSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#e8eaed"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
                <li><a href="{{ route('products.index') }}">Productos</a> </li>
                <li><a href="{{--{{ route('users.index') }}--}}">Usuarios</a></li>
                <li><a href="{{--{{ route('gestor.index') }}--}}">Gestor</a></li>
                <!-- Cerrar sesión solo si el usuario está autenticado -->
                {{-- @auth --}}
                    <!-- Formulario de logout, se enviará cuando se haga clic en el enlace "Cerrar sesión" -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                {{-- @endauth --}}
            </ul>

            <ul>
                <li><img src="{{asset('img/logo.png')}}" alt="Logo"></li>
                <li class="ocultarMobile"><a href="{{ route('products.index') }}">Productos</a></li>
                <li class="ocultarMobile"><a href="{{--{{ route('users.index') }}--}}">Usuarios</a></li>
                <li class="ocultarMobile"><a href="{{--{{ route('gestor.index') }}--}}">Gestor</a></li>
                <li class="ocultarMobile"><a href="/v7_perfil.html">Perfil</a></li>
                <!-- Aquí añadimos el enlace de "Cerrar sesión" junto a "Perfil" -->
                {{-- @auth --}}
                    <li class="ocultarMobile">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Cerrar sesión
                        </a>
                    </li>
                {{-- @endauth --}}
                <li class="boton-menu" onclick=mostrarSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#e8eaed"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
            </ul>
        </nav>
        <!-- Fin de la barra de navegación personalizada -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
