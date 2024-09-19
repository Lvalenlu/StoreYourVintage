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
        <table  class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Document</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr class="">
                    <td scope="row">{{$customer->name}}</td>
                    <td scope="row">{{$customer->lastName}}</td>
                    <td scope="row">{{$customer->document}}</td>
                    <td scope="row">{{$customer->address}}</td>
                    <td scope="row">{{$customer->email}}</td>
                    <td scope="row">
                        @if ($customer->status == 1)
                            Activo
                        @else
                            Desactivo
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas cambiar el estado a este usuario?');">Cambiar Estado</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>

<script src="{{asset('js/usuarios.js')}}"></script>
@endsection
