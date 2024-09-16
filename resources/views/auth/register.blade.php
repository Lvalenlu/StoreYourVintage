@extends('layouts.app')

@section('content')
<section>
    <script src="https://kit.fontawesome.com/15e7ed816c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/styles_forms.css')}}">
    <div class="contenedor">
        <div class="formulario">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <img src="{{ asset('img/Logo.png') }}" alt="Logo">

                <h2>Registrar administrador</h2>

                <!-- Nombre Completo -->
                <div class="input-contenedor">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" id="name" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required autocomplete="name">
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="name">Nombre Completo</label>
                </div>

                <!-- Número de documento -->
                <div class="input-contenedor">
                    <i class="fa-solid fa-id-card"></i>
                    <input type="text" id="identity_document" name="cedula" class="form-control @error('cedula') is-invalid @enderror" value="{{ old('cedula') }}" required>
                    @error('cedula')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="identity_document">Número de documento</label>
                </div>

                <!-- Correo electrónico -->
                <div class="input-contenedor">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" id="mail" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="mail">Correo electrónico</label>
                </div>

                <!-- Cargo -->
                <div class="input-contenedor">
                    <i class="fa-solid fa-circle-info"></i>
                    <input type="text" id="cargo" name="cargo" class="form-control @error('cargo') is-invalid @enderror" value="{{ old('cargo') }}" required>
                    @error('cargo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="cargo">Cargo</label>
                </div>

                <!-- Botón de registro -->
                <button type="submit" class="btn btn-primary">Registrar</button>
                <script src="/assets/js/script_form.js"></script>
            </form>
        </div>
    </div>
</section>
@endsection
