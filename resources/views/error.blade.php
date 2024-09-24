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
                <div
                    class="card text-white bg-primary"
                >
                    <div class="card-body">
                        <h2 >{{$error}}</h2>
                        <h4>{{$message}} @if($link) {!! $link !!} @endif</h4>
                    </div>
                </div>

            </div>
        </div>
    </section>

</body>
