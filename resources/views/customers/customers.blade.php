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

    <div class="table-responsive">
        <table  class="table table-primary" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Email</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr class="">
                    <td scope="row">{{$customer->name . ' ' .  $customer->lastName}}</td>
                    <td scope="row">{{$customer->document}}</td>
                    <td scope="row">{{$customer->address}}</td>
                    <td scope="row">{{$customer->email}}</td>
                    <td scope="row">
                        @if ($customer->status == 1)
                            Activo
                        @else
                            Desactivado
                        @endif
                    </td>
                    <td><a onclick="openReasonsModal({{$customer->id}})">
                            <button type="button" class="btn btn-danger show-delete-modal">Cambiar Estado</button>
                    </a>
                    </td>
                </tr>
                <div class="modal-overlay" id="reasonsModal{{$customer->id}}" style="display: none;">
                    <div class="modal-content">
                        <form class="modal-details" method="POST" action="{{route('customers.destroy', $customer->id)}}">
                            @csrf
                            @method('DELETE')
                            <h3>Razon de cambio: </j3>
                            <div class="modal-actions">
                                <input type="text" name="reason">
                                <button class="btn-eliminar" type="submit">Realizar cambio</button>
                                <button onclick="closeReasonsModal({{$customer->id}})">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

</div>



<script src="{{asset('js/usuarios.js')}}"></script>
<script src="{{asset('js/reasons.js')}}"></script>
@endsection
