@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Categoría</h2>

    {{-- Verifica si hay errores de validación y los muestra en un mensaje --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario para editar una categoría existente --}}
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre de la categoría</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
        </div>

        {{-- Botón para enviar el formulario y actualizar la categoría --}}
        <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
    </form>
</div>
@endsection
