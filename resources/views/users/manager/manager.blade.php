@extends('layouts.app') <!-- Asegúrate de que extiendes del layout correcto -->

@section('content')
<div class="vista">

    <!-- Modal para restringir -->
    <div id="restricion-modal" class="modal">
        <div class="contenido-modal">
            <span id="cerrar-modal" class="cerrar">&times;</span>
            <p id="mensaje">¿Estás seguro que deseas restringir este usuario?</p>
            <button id="confirmar-restricion" class="boton">Aceptar</button>
            <button id="cancelar-restricion" class="boton">Cancelar</button>
        </div>
    </div>
    <div class="contenedor">
        <div>
            <h2 class="subtitulo" >Gestor administradores</h2>

        </div>
        <div class="manager_button">
            <form action="{{route('users.create')}}" method="GET">
                <button type="submit" class="button_manager btn-register">Registrar nuevo administrador</button>
            </form>
        </div>


        <div class="table-responsive">
            <table class="table table-primary" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Email</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name . ' ' . $user->lastName}}</td>
                        <td>{{$user->document}}</td>
                        <td>{{$user->email}}</td>
                        <td class="manager_buttons">
                            <button type="button" class="buttons_manager" onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->document }}', '{{ $user->charge }}')">Editar</button>
                            <button type="button" class="buttons_manager" onclick="openDeleteModal({{$user->id}})">Eliminar</button>
                        </td>
                    </tr>
                    <div class="modal-overlay" id="deleteModal{{$user->id}}" style="display: none;">
                        <div class="modal-content">
                            <form class="modal-reasons" method="POST" action="{{route('users.destroy', $user->id)}}">
                                <h3>¿Seguro de que deseas eliminar este usuario?</h3>
                                <div class="modal-actions">
                                    <button class="btn-eliminar" type="submit">Eliminar</button>
                                    <button type="button" onclick="closeDeleteModal({{$user->id}})">Cancelar</button>
                                    @csrf
                                    @method('DELETE')
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="editModal" class="modal">
                        <div class="modal-contenido">
                            <a class="cerrar-modal">&times;</a>
                            <h2 class="titulo">Editar Usuario</h2>
                            <form id="formularioEditarUsuario" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="entrada">
                                    <label for="editName">Nombre:</label>
                                    <input type="text" id="editName" name="name" required>
                                </div>

                                <div class="entrada">
                                    <label for="editEmail">Correo:</label>
                                    <input type="email" id="editEmail" name="email" required>
                                </div>

                                <div class="entrada">
                                    <label for="editDocument">Documento:</label>
                                    <input type="text" id="editDocument" name="document" required readonly>
                                </div>

                                <div class="entrada">
                                    <label for="editCharge">Cargo:</label>
                                    <input type="text" id="editCharge" name="charge" required>
                                </div>

                                <button type="submit" class="btn guardar">Guardar Cambios</button>
                            </form>
                        </div>
                    </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
<script src="{{asset('js/usuarios.js')}}"></script>
<script src="{{asset('js/modals.js')}}"></script>
@endsection
