
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/15e7ed816c.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="{{asset('css/styles_forms.css')}}">
    
    
    <title>Registro Admnistrador</title>
    
</head>
<body>
 
    <section>
        <div class="contenedor">
            <div class="formulario">
                <form action="/register" method="POST">
                    @csrf
                    <img src="{{asset("img/Logo.png")}}" alt="Logo">
                    
                    <h2>Registro</h2>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="name" name="nombre" required>
                        <label for="name">Nombre Completo</label>
                    </div>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-id-card"></i>
                        <input type="text" id="identity_document" name="cedula" required>
                        <label for="identity_document">Número de documento</label>
                    </div>


                    <div class="input-contenedor">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" id="mail" name="email" required>
                        <label for="mail">Correo electronico</label>
                    </div>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-circle-info"></i>
                        <input type="text" id="" name="cargo" required>
                        <label for="#">Cargo</label>
                    </div>
                    <button type="submit">Registrar</button>
                </form>
                <div>
                    
                </div>
            </div>
        </div>
    </section>

    <script src="/assets/js/script_form.js"></script>
</body>
</html>