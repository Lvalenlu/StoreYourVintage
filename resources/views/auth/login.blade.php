<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/15e7ed816c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/styles_forms.css') }}">

    <title>Inicio de sesión</title>
</head>
<body>

    <section>
        <div class="contenedor">
            <div class="formulario">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <img src="{{ asset('img/logo.png') }}" alt="Logo">

                    <h2>Ingreso</h2>

                    <!-- Número de documento -->
                    <div class="input-contenedor">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="document" class="form-control @error('document') is-invalid @enderror" value="{{ old('document') }}" required>
                        @error('document')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="document">Número de documento</label>
                    </div>

                    <!-- Contraseña -->
                    <div class="input-contenedor">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="password">Contraseña</label>
                    </div>

                    <!-- Recordarme -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Recordarme</label>
                    </div>

                    <!-- Botón de envío -->
                    <button type="submit">Ingresar</button>

                    <!-- Link de registro -->
                    <div class="link">
                        <p>Registrate <a href="{{ route('register') }}">aquí</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="/assets/js/script_form.js"></script>
</body>
</html>
