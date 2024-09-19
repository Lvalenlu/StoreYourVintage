@extends('layouts.app')
@section('content')

<div class="vista">
    <div class="contenedor">
        <div class="user-container">
            <div class="contenedor-busqueda">
                <input type="text" id="barra-busqueda" placeholder="Buscar...">
                <button id="add-user-btn" class="add-user-btn">Añadir Administrador</button>
            </div>
            <table class="user-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Cuenta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="user-table-body">
                    <!-- Aquí se inyectan las filas -->
                </tbody>
            </table>
        </div>

        <!-- Modal para Editar/Agregar user -->
        <div id="user-modal" class="modal">
            <div class="modal-content">
                <span id="close-modal" class="close">&times;</span>
                <h2 id="modal-title" class="titulo_modal">Editar Administrador</h2>
                <form id="user-form" class="formulario">
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
                <p>¿Estás seguro que deseas eliminar este Administrador?</p>
                <button id="confirm-delete-btn" class="btn-modal">Eliminar</button>
                <button id="cancel-delete-btn" class="btn-modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

@endsection
