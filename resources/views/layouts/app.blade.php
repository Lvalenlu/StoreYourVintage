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

    <!-- enlaces-->
    <link rel="stylesheet" href="{{asset('css/styles_navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles_products.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles_gestor.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles_perfil.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles_usuarios.css')}}">
    <link rel="stylesheet" href="{{asset('css/variables.css')}}">

</head>
<body>
    <div id="app">
        <!-- Barra de navegación -->
        <nav>
            <ul>
                <li><img src="{{asset('img/logo.png')}}" alt="Logo"></li>
                <li><a href="{{route('products.index')}}">Productos</a> </li>
                <li><a href="{{route('customers.index')}}">Usuarios</a></li>
                <li><a href="{{route('users.index')}}">Gestor</a></li>
                <li class="dropdown">
                    <div id="userIcon" class="user-icon">
                        <img src="{{asset('img/user_icon.png') }}" alt="UserIcon"/>
                    </div>

                    <div id="dropdownContent"  class="dropdown-content">
                        <div class="user-info">
                            <strong>{{ Auth::user()->name }}</strong>
                            <span>{{ Auth::user()->role }}</span>
                        </div>
                        <div class="divider"></div>
                        <a href="{{ route('profile') }}">Ver perfil</a>
                        <a href="{{ route('password.request') }}">Cambiar contraseña</a>
                        <a class="nav-item nav-link" onclick="openLogoutModal()">
                        <i class="fa fa-window-close me-2"></i>Cerrar sesión</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>
        </nav>

        <!-- Modal para confirmar cierre de sesión -->
        <div class="modal-overlay" id="logoutModal" style="display: none;">
            <div class="modal-content">
                <div class="modal-details">
                    <p>¿Estás seguro de que quieres cerrar sesión?</p>
                    <div class="modal-actions">
                        <button class="btn-eliminar"  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Cerrar sesión</button>
                        <button onclick="closeLogoutModal()">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
    // Funciónes para abrir, cerrar el modal
    function openLogoutModal() {
        document.getElementById('logoutModal').style.display = 'flex';
    }

    // Función para cerrar el modal
    function closeLogoutModal() {
        document.getElementById('logoutModal').style.display = 'none';
    }

    // Función para confirmar el cierre de sesión
    function confirmLogout() {
        document.getElementById('logout-form').submit();
    }
    </script>
    <script src={{asset('js/gestor.js')}}></script>
    <script src={{asset('js/data_usuarios&user.js')}}></script>
    <script src={{asset('js/navbar_loader.js')}}></script>
    <script src={{asset('js/script_navbar.js')}}></script>
</body>
</html>
