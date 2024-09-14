<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles_navbar.css">
    <link rel="stylesheet" href="assets/css/styles_gestor.css">
    <script src="https://kit.fontawesome.com/15e7ed816c.js" crossorigin="anonymous"></script>

    <title>Usuarios</title>
</head>

<body>

    <div id="navbar-container"></div>
    <div class="vista">
        <div class="contenedor">
            <div class="admin-container">
                <div class="contenedor-busqueda">
                    <input type="text" id="barra-busqueda" placeholder="Buscar...">
                    <button id="add-admin-btn" class="add-admin-btn">Añadir administrador</button>
                </div>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cargo</th>
                            <th>Cuenta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="admin-table-body">
                        <!-- Aquí se inyectan las filas -->
                    </tbody>
                </table>
            </div>
            
            <!-- Modal para Editar/Agregar admin -->
            <div id="admin-modal" class="modal">
                <div class="modal-content">
                    <span id="close-modal" class="close">&times;</span>
                    <h2 id="modal-title" class="titulo_modal">Editar Administrador</h2>
                    <form id="admin-form" class="formulario">
                        <div class="entrada">
                            <label for="name">Nombre:</label>
                            <input type="text" id="name" name="name">
                        </div>
                        <div class="entrada">
                            <label for="position">Cargo:</label>
                            <input type="text" id="position" name="position">
                        </div>
                        <div class="entrada">
                            <label for="state">Estado:</label>
                            <input type="text" id="state" name="state">
                        </div>
                        
                        <button type="submit" id="save-btn" class="save-btn">Guardar</button>
                    </form>
                </div>
            </div>
            
            <!-- Modal de confirmación de eliminación -->
            <div id="confirm-delete-modal" class="modal">
                <div class="modal-content">
                    <span id="close-delete-modal" class="close">&times;</span>
                    <h2 class="titulo_modal">Confirmar Eliminación</h2>
                    <p>¿Estás seguro que deseas eliminar este administrador?</p>
                    <button id="confirm-delete-btn" class="btn-modal">Eliminar</button>
                    <button id="cancel-delete-btn" class="btn-modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="/assets/js/gestor.js"></script>
    <script src="/assets/js/data_usuarios&admin.js"></script>
    
    <script src="/assets/js/navbar_loader.js"></script>
    <script src="/assets/js/script_navbar.js"></script>
</body>
</html>