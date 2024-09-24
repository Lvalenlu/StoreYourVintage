<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'StoreYourVintage') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">

    <!-- enlaces-->
    <link rel="stylesheet" href="{{asset('css/styles_navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles_products.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles_gestor.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles_perfil.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles_usuarios.css')}}">
    <link rel="stylesheet" href="{{asset('css/variables.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>

</head>
<body>
    <div id="app">
        <!-- Barra de navegación -->
        <nav class="nav_principal">
            <ul>
                <li><a href="{{route('products.index')}}"><img src="{{asset('img/logo.png')}}" alt="Logo"></a></li>

                <li class="dropdown">
                    <a href="#" id="productsButton">Productos</a>
                    <div id="productsDropdown" class="dropdown-content">
                        <a href="{{route('products.index')}}">Ver productos</a>
                        <a href="{{route('audits.index', 'products')}}">Cambios a productos</a>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="#" id="usersButton">Usuarios</a>
                    <div id="usersDropdown" class="dropdown-content">
                        <a href="{{route('customers.index')}}">Ver usuarios</a>
                        <a href="{{route('audits.index', 'users')}}">Restricciones a usuarios</a>
                    </div>
                </li>

                <li class="dropdown">
                    @if (Auth::user()->is_manager == 1)
                        <a href="#" id="gestorButton">Gestor de Administradores</a>
                        <div id="gestorDropdown" class="dropdown-content">
                            <a href="{{ route('users.index') }}">Ver administradores</a>
                            <a href="{{ route('audits.index', 'allProducts') }}">Ver cambios a productos</a>
                            <a href="{{ route('audits.index', 'allUsers') }}">Ver cambios a usuarios</a>

                        </div>
                    @endif
                </li>

                <li class="dropdown">
                    <div id="userIcon" class="user-icon">
                        <img src="{{asset('img/user_icon.png') }}" alt="UserIcon"/>
                    </div>

                    <div id="dropdownContent" class="dropdown-content">
                        <div class="user-info">
                            <strong>{{ Auth::user()->name }}</strong>
                            <span>{{ Auth::user()->status }}</span>
                        </div>
                        <div class="divider"></div>
                        <a href="{{ route('profile') }}">Ver perfil</a>
                        <a href="{{ route('changes.password') }}">Cambiar contraseña</a>
                        <a onclick="openLogoutModal()">
                            Cerrar sesión
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>

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
                        <button class="btn-eliminar" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</button>
                        <button onclick="closeLogoutModal()">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <script src="{{asset('js/gestor.js')}}"></script>
    <script src="{{asset('js/data_usuarios&user.js')}}"></script>
    <script src="{{asset('js/navbar_loader.js')}}"></script>
    <script src="{{asset('js/script_navbar.js')}}"></script>
    <script>

        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
</body>
</html>
