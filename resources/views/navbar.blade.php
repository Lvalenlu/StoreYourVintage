<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styles_navbar.css">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>navbar</title>
    </head>
    <nav>
        <ul class="sidebar">

            <li onclick=ocultarSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#e8eaed"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
            <li><a href="/v4_productos.html">Productos</a> </li>
            <li><a href="/v5_usuarios.html">Usuarios</a></li>
            <li><a href="/v6_gestor.html">Gestor</a></li>
            <li><a href="#">Cerrar sesion</a></li>  

        </ul>

        <ul>
            <li><img src="{{asset('img/logo.png')}}" alt="Logo"></li>
            <li class="ocultarMobile"><a href="/v4_productos.html">Productos</a> </li>
            <li class="ocultarMobile"><a href="/v5_usuarios.html">Usuarios</a></li>
            <li class="ocultarMobile"><a href="/v6_gestor.html">Gestor</a></li>
            <li class="ocultarMobile"><a href="/v7_perfil.html">Perfil</a></li>
            <li class="boton-menu" onclick=mostrarSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#e8eaed"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
        </ul>
    </nav>
</html>

