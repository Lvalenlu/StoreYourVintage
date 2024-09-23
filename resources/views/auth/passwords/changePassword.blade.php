<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/15e7ed816c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/styles_forms.css') }}">
    <title>Cambiar Contraseña</title>
</head>

<body>
    <section>
        <!-- Enlace para volver a la página anterior -->
        <a href="{{ url()->previous() }}" class="back-link">
            <img src="{{ asset('img/back_icon.png') }}" alt="Volver">
        </a>
        <div class="contenedor">
            <!-- Formulario para cambiar la contraseña -->
            <div class="formulario">
                <form method="POST" action="a{{route('change.password')}}">
                    @csrf
                    <img src="{{asset('img/logo.png')}}" alt="Logo">

                    <h2>Cambiar Contraseña</h2>

                    <!-- Campo para la contraseña actual -->
                    <div class="input-contenedor">
                        <i class="fa-solid fa-key"></i>
                        <input id="current-password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password">
                        <label for="current-password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña actual') }}</label>
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Campo para la nueva contraseña -->
                    <div class="input-contenedor">
                        <i class="fa-solid fa-key"></i>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{     __('Nueva Contraseña') }}</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Campo para confirmar la nueva contraseña -->
                    <div class="input-contenedor">
                        <i class="fa-solid fa-key"></i>
                        <input id="password-confirm" type="password" class="form-control " name="password_confirmation" required autocomplete="new-password">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>
                    </div>

                    <!-- Enlace para recuperar contraseña en caso de olvido -->
                    <div class="link_content">
                        <a  class="link" href="{{route('reset.password')}}">Olvide mi contraseña</a>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        {{ __('Guardar') }}
                    </button>
                </form>
                <div>

                </div>
            </div>
        </div>
    </section>

</body>
