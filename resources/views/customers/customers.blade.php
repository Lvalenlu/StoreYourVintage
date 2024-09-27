@extends('layouts.app')

@section('content')
<div class="vista">
    <div class="contenedor">
        <div>
            <h2 class="subtitulo">Clientes de la tienda</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-primary" id="myTable">
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
                    <tr>
                        <td>{{ $customer->name . ' ' . $customer->lastName }}</td>
                        <td>{{ $customer->document }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            @if ($customer->status == 1)
                                Activo
                            @else
                                Desactivado
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="openReasonsModal({{ $customer->id }})">Cambiar Estado</button>
                        </td>
                    </tr>

                    <!-- Modal para ingresar la razón de cambio -->
                    <div class="modal-overlay" id="reasonsModal{{ $customer->id }}" style="display: none;">
                        <div class="modal-content">
                            <form class="modal-reasons" method="POST" action="{{ route('customers.destroy', $customer->id) }}">
                                <h3>Razón de cambio:</h3>
                                <div class="modal-actions">
                                    <input type="text" name="reason" required placeholder="Ingrese razón...">
                                    <button class="btn-eliminar" type="submit">Realizar cambio</button>
                                    <button type="button" onclick="closeReasonsModal({{ $customer->id }})">Cancelar</button>
                                    @csrf
                                    @method('DELETE')
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="{{ asset('js/modals.js') }}"></script>
@endsection
