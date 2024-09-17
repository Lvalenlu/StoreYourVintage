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
                        <input type="text" id="name" name="name" placeholder=" " class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name">
                        <label for="name">Nombre Completo</label>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <!-- Número de documento -->
                    <div class="input-contenedor">
                        <i class="fa-solid fa-id-card"></i>
                        <input type="text" id="identity_document" name="document"  placeholder=" " class="form-control @error('document') is-invalid @enderror" value="{{ old('document') }}" required>
                        <label for="identity_document">Número de documento</label>
                        @error('document')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <!-- Correo electrónico -->
                    <div class="input-contenedor">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" id="email" name="email"  placeholder=" " class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        <label for="mail">Correo electrónico</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <!-- Cargo -->
                    <div class="input-contenedor">
                        <i class="fa-solid fa-circle-info"></i>
                        <input type="text" id="charge" name="charge"  placeholder=" " class="form-control @error('charge') is-invalid @enderror" value="{{ old('charge') }}" required>
                        <label for="cargo">Cargo</label>
                        @error('charge')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

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
