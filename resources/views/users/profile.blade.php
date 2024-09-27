@extends('layouts.app')

@section('content')

<div class="container">

    <div class="contenedor-principal">
        <!-- Sección que muestra la información del perfil del usuario -->
        <div class="contenedor-perfil">
            <h2 class="titulo">Información de tu Perfil</h2>
            <div class="profile-data">
                <p><strong>Nombre:</strong></p>
                <p>{{ $user->name }}</p>
                <p><strong>Documento:</strong></p>
                <p>{{ $user->document ?? 'No disponible' }}</p>
                <p><strong>Correo:</strong></p>
                <p>{{ $user->email }}</p>
                <p><strong>Cargo:</strong></p>
                <p>{{ $user->charge ?? 'No disponible' }}</p>
            </div>
            <!-- Solo muestra el botón de editar perfil si el usuario es un gestor -->
            @if (Auth::user()->is_manager == 1)
            <div class="botones">
                <button id="editarPerfilBtn" class="btn">Editar Perfil</button>
            </div>
            @endif
        </div>

        <!-- Modal para editar perfil -->
        <div id="modalEditarPerfil" class="modal" style="display: none;"> 
            <div class="modal-contenido">
                <!-- Botón para cerrar el modal -->
                <a class="cerrar-modal">&times;</a>
                <h2 class="titulo">Editar Perfil</h2>
                <!-- Formulario para editar el perfil del usuario -->
                <form id="formularioEditarPerfil" action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="entrada">
                        <label for="name">Nombre:</label>
                        <input type="text" id="name" class="@error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="entrada">
                        <label for="document">Documento:</label>
                        <input type="text" id="document" name="document" class="@error('document') is-invalid @enderror" value="{{ $user->document ?? '' }}" readonly>
                        @error('document')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="entrada">
                        <label for="email">Correo:</label>
                        <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror" value="{{ $user->email }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="entrada">
                        <label for="charge">Cargo:</label>
                        <input type="text" id="charge" name="charge" class="@error('charge') is-invalid @enderror" value="{{ $user->charge ?? '' }}" required>
                        @error('charge')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Botón para guardar los cambios realizados en el perfil -->
                    <button type="submit" class="btn guardar">Guardar Cambios</button>
                </form>
            </div>
        </div>

        <!-- Incluye el script para manejar el modal -->
        <script src="{{ asset('js/perfil.js') }}"></script>
    </div>
</div>

@endsection
