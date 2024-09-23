@extends('layouts.app')

@section('content')

    <div class="contenedor-principal">
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
            @if (Auth::user()->is_manager == 1)
            <div class="botones">
                <button id="editarPerfilBtn" class="btn">Editar Perfil</button>
            </div>
            @endif
        </div>

        <!-- Modal -->
        <div id="modalEditarPerfil" class="modal">
            <div class="modal-contenido">
                <a class="cerrar-modal">&times;</a>
                {{-- <span class="cerrar-modal">&times;</span> --}}
                <h2 class="titulo">Editar Perfil</h2>
                <form id="formularioEditarPerfil" action="{{route('users.update', $user->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="entrada">
                        <label for="name">Nombre:</label>
                        <input type="text" id="name" class=" @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="entrada">
                        <label for="document">Documento:</label>
                        <input type="text" id="document" name="document" class=" @error('document') is-invalid @enderror" value="{{ $user->document ?? '' }}" readonly>
                        @error('document')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="entrada">
                        <label for="email">Correo:</label>
                        <input type="email" id="email" name="email" class=" @error('email') is-invalid @enderror" value="{{ $user->email }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="entrada">
                        <label for="charge">Cargo:</label>
                        <input type="text" id="charge" name="charge" class=" @error('charge') is-invalid @enderror" value="{{ $user->charge ?? '' }}">
                        @error('charge')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn guardar">Guardar Cambios</button>


                </form>
            </div>
        </div>

        <script src="{{asset('js/perfil.js')}}"></script>
    </div>
@endsection
