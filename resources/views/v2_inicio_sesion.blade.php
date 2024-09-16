<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/15e7ed816c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/styles_forms.css')}}">
    
    <title>Inicio de sesion</title>
    
</head>
<body>
    <section>
        <div class="contenedor">
            <div class="formulario">
                <form action="/login" method="POST">
                    @csrf
                    <img src="{{asset('img/logo.png')}}" alt="Logo">
                    
                    <h2>Ingreso</h2>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="cedula" required>
                        <label for="#">Número de documento</label>
                    </div>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="contrasena" required>
                        <label for="#">Contraseña</label>
                    </div>
                    <button type="submit">Ingresar</button>
                </form>
                <div>
                

                    <div class="link">
                        <p>Registrate <a href="#">aqui</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/assets/js/script_form.js"></script>
</body>
</html>