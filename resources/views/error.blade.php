<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('fontsawesome/css/fontawesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('fontsawesome/css/brands.css') }}" rel="stylesheet" />
    <link href="{{ asset('fontsawesome/css/solid.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/styles_forms.css') }}">

    <title>Registro</title>

<body>
    <section>
        <div class="contenedor">
            <div class="formulario">
                <!-- Card para mostrar mensajes de error -->
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h2>{{$error}}</h2>
                        <h4>{!! nl2br($message) !!} @if(isset($link)) {!! $link !!} @endif</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
