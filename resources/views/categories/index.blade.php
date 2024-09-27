@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Categorías</h2>

    {{-- Botón para crear una nueva categoría --}}
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Crear Nueva Categoría</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabla que muestra la lista de categorías --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Editar</a>

                    {{-- Formulario para eliminar la categoría (comentado) --}}
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Sección de paginación para navegar por las páginas de categorías --}}
    <div class="d-flex justify-content-center">
        {{ $categories->links() }}
    </div>
</div>
@endsection
