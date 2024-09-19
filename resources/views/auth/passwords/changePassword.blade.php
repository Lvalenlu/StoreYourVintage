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
                <form method="POST" action="">
                    @csrf
                    <img src="{{asset('img/logo.png')}}" alt="Logo">

                    <h2>Cambiar Contraseña</h2>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-user"></i>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{     __('Contraseña') }}</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-lock"></i>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>

                    </div>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-lock"></i>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Codigo de usuario') }}</label>

                    </div>
                </form>
                <div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Guardar') }}
                    </button>
                </div>
            </div>
        </div>
    </section>

</body>
