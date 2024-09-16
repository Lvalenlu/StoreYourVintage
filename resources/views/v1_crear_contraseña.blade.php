<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/15e7ed816c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('/public/css/styles_forms.css')}}">
    
    <title>Crear contraseña</title>
    
</head>
<body>
    
    <section>
        <div class="contenedor">
            <div class="formulario">
                <form action="#">

                    <img src="{{asset('img/Logo.png')}}" alt="Logo">
                    
                    <h2>Crear Contraseña</h2>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-user"></i>
                        <input type="password" required>
                        <label for="#">Contraseña</label>
                    </div>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" required>
                        <label for="#">Confirmar Contraseña</label>
                    </div>
                </form>
                <div>
                    <button onclick="location.href='/v2_inicio_sesion.html'">Guardar</button>
                </div>
            </div>
        </div>
    </section>

    <script src="/assets/js/script_form.js"></script>
</body>
</html>