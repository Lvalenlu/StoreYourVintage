<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/15e7ed816c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/styles_forms.css') }}">
    <title>Registro</title>
</head>
<body>

    <section>
        <div class="contenedor">
            <div class="formulario">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <img src="{{ asset('img/Logo.png') }}" alt="Logo">

                    <h2>Registro</h2>

                    <!-- Nombre Completo -->
                    <div class="input-contenedor">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="name">Nombre Completo</label>
                    </div>

                    <!-- Número de documento -->
                    <div class="input-contenedor">
                        <i class="fa-solid fa-id-card"></i>
                        <input type="text" id="identity_document" name="document" class="form-control @error('document') is-invalid @enderror" value="{{ old('document') }}" required>
                        @error('document')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="identity_document">Número de documento</label>
                    </div>

                    <!-- Correo electrónico -->
                    <div class="input-contenedor">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
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
                        <input type="text" id="charge" name="charge" class="form-control @error('charge') is-invalid @enderror" value="{{ old('charge') }}" required>
                        @error('charge')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="cargo">Cargo</label>
                    </div>

                    <!-- Botón de registro -->
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </section>

    <script src="/assets/js/script_form.js"></script>
</body>
</html>
