<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/styles_navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles_perfil.css')}}">


    <script src="https://kit.fontawesome.com/15e7ed816c.js" crossorigin="anonymous"></script>

    <title>Perfil</title>
</head>

<body>

    <div id="navbar-container"></div>

    <div class="contenedor-principal">
        <div class="contenedor-perfil">
            <h2 class="titulo">Información de tu Perfil</h2>
            <div class="columnas">
                <div class="columna">
                    <p><strong>Nombre:</strong> Juan</p>
                    <p><strong>Documento:</strong> 123456789</p>
                    <p><strong>Correo:</strong> juan.perez@example.com</p>
                </div>
                <div class="columna">
                    <p><strong>name:</strong> Gómez</p>
                    <p><strong>Celular:</strong> +57 320 123 4567</p>
                    <p><strong>Cargo:</strong> Gerente de Ventas</p>
                </div>
            </div>
            <div class="botones">
                <button id="editarPerfilBtn" class="btn">Editar Perfil</button>
                <button id="cambiarContraseñaBtn" class="btn" onclick="location.href='/v8_cambiar_contraseña.html'">Cambiar Contraseña</button>
            </div>
        </div>

        <!-- Modal -->
        <div id="modalEditarPerfil" class="modal">
            <div class="modal-contenido">
                <span class="cerrar-modal">&times;</span>
                <h2 class="titulo">Editar Perfil</h2>
                <form id="formularioEditarPerfil">

                    <div class="entrada">
                        <label for="name">Nombre:</label>
                        <input type="text" id="name" name="name" value="Gómez">
                    </div>

                    <div class="entrada">
                        <label for="document">Documento:</label>
                        <input type="text" id="document" name="document" value="123456789">
                    </div>

                    <div class="entrada">
                        <label for="email">Correo:</label>
                        <input type="email" id="email" name="email" value="juan.perez@example.com">
                    </div>

                    <div class="entrada">
                        <label for="charge">Cargo:</label>
                        <input type="text" id="charge" name="charge" value="Gerente de Ventas">
                    </div>

                    <button type="submit" class="btn guardar">Guardar Cambios</button>
                </form>
            </div>
        </div>

        <script src="/assets/js/perfil.js"></script>
    </div>


    <script src="/assets/js/navbar_loader.js"></script>
    <script src="/assets/js/script_navbar.js"></script>
</body>
</html>
