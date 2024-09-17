<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles_navbar.css">
    <link rel="stylesheet" href="assets/css/styles_usuarios.css">
    <script src="https://kit.fontawesome.com/15e7ed816c.js" crossorigin="anonymous"></script>

    <title>Usuarios</title>
</head>

<body>

    <div id="navbar-container"></div>
    
    <div class="vista">

        <div class="contenedor">
        
            <div class="contenedor-busqueda">
                <input type="text" id="barra-busqueda" placeholder="Buscar...">
                <button class="boton-busqueda" id="switch">Cambiar a vendedores</button>
            </div>
            <div id="contendor-tabla">
                <!-- Aqui se inyectan las tablas <3 -->
            </div>
        </div>
    
        <!-- Modal para restringir -->
        <div id="restricion-modal" class="modal">
            <div class="contenido-modal">
                <span id="cerrar-modal" class="cerrar">&times;</span>
                <p id="mensaje">¿Estas seguro que deseas restringir este usuario?</p>
                <button id="confirmar-restricion" class="boton">Aceptar</button>
                <button id="cancelar-restricion"class="boton">Cancelar</button>
            </div>
        </div>

    </div>
    
    
    <script src="/assets/js/usuarios.js"></script>
    <script src="/assets/js/data_usuarios&admin.js"></script>
    
    <script src="/assets/js/navbar_loader.js"></script>
    <script src="/assets/js/script_navbar.js"></script>
</body>
</html>