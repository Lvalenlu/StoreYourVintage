<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles_navbar.css">
    <link rel="stylesheet" href="assets/css/styles_perfil.css">


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
                    <p><strong>Apellidos:</strong> Gómez</p>
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
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" id="apellidos" name="apellidos" value="Gómez">
                    </div>

                    <div class="entrada">
                        <label for="documento">Documento:</label>
                        <input type="text" id="documento" name="documento" value="123456789">
                    </div>

                    <div class="entrada">
                        <label for="correo">Correo:</label>
                        <input type="email" id="correo" name="correo" value="juan.perez@example.com">
                    </div>

                    <div class="entrada">
                        <label for="celular">Celular:</label>
                        <input type="tel" id="celular" name="celular" value="+57 320 123 4567">
                    </div>

                    <div class="entrada">
                        <label for="cargo">Cargo:</label>
                        <input type="text" id="cargo" name="cargo" value="Gerente de Ventas">
                    </div>

                    <div class="entrada">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" value="Juan">
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