<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/15e7ed816c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/styles_forms.css') }}">

    <title>Recuperar contraseña</title>
</head>
<body>

    <section>
        <div class="contenedor">
            <div class="formulario">
                <form action="{{ route('send.email') }}" method="POST">
                    @csrf
                    <img src="{{ asset('img/logo.png') }}" alt="Logo">

                    <h2>Recuperar contraseña</h2>



                    <div class="input-contenedor">
                        <i class="fa-solid fa-user"></i>
                        <input type="email" name="email" placeholder=" " class="form-control @error('email') is-invalid @enderror" required>

                        <label for="email">Email</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <button type="submit">Enviar correo</button>

                </form>
            </div>
        </div>
    </section>

    <script src="/assets/js/script_form.js"></script>
</body>
</html>
