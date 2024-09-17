@extends('layouts.app')

<body>
    <section>
        <div class="contenedor">
            <div class="formulario">
                <form method="POST" action="{{ route('users.edit') }}">

                    <img src="./assets/img/Logo.png" alt="Logo">

                    <h2>Cambiar Contraseña</h2>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-user"></i>
                        <input type="password" required>
                        <label for="#">Contraseña Nueva</label>
                    </div>

                    <div class="input-contenedor">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" required>
                        <label for="#">Confirmar Contraseña</label>
                    </div>
                </form>
                <div>
                    <button onclick="location.href='/v9_codigo_verificacion.html'">Cambiar</button>
                </div>
            </div>
        </div>
    </section>

    <script src="/assets/js/script_form.js"></script>
</body>
