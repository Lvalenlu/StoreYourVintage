@extends('layouts.app') <!-- Asegúrate de que extiendes del layout correcto -->

@section('content')
<div class="vista">
    <div class="contenedor">
        <div class="contenedor-busqueda">
            <input type="text" id="barra-busqueda" placeholder="Buscar...">
            <button class="boton-busqueda" id="switch">Cambiar a vendedores</button>
        </div>
        <div id="contendor-tabla">
            <!-- Aquí se inyectan las tablas -->
        </div>
    </div>

    <!-- Modal para restringir -->
    <div id="restricion-modal" class="modal">
        <div class="contenido-modal">
            <span id="cerrar-modal" class="cerrar">&times;</span>
            <p id="mensaje">¿Estás seguro que deseas restringir este usuario?</p>
            <button id="confirmar-restricion" class="boton">Aceptar</button>
            <button id="cancelar-restricion" class="boton">Cancelar</button>
        </div>
    </div>
</div>

<script src="{{asset('js/usuarios.js')}}"></script>
@endsection
