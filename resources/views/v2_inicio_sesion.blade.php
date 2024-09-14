<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/15e7ed816c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/styles_forms.css">
    
    <title>Inicio de sesion</title>
    
</head>
<body>
    
    <section>
        <div class="contenedor">
            <div class="formulario">
                <form action="#">

                    <img src="./assets/img/Logo.png" alt="Logo">
                    
                    <h2>Ingreso</h2>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" required>
                        <label for="#">Número de documento</label>
                    </div>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" required>
                        <label for="#">Contraseña</label>
                    </div>
                </form>
                <div>
                    <button onclick="location.href='/v3_registro_admin.html'">Ingresar</button>

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