@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nuevo Producto</h2>

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para crear producto -->
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Nombre del producto -->
        <div class="form-group">
            <label for="name">Nombre del producto</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <!-- Descripción del producto -->
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
        </div>

        <!-- Imagen del producto -->
        <div class="form-group">
            <label for="image">Imagen del producto</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <!-- Tamaño del producto -->
        <div class="form-group">
            <label for="size">Tamaño</label>
            <input type="text" class="form-control" id="size" name="size" value="{{ old('size') }}" required>
        </div>

        <!-- Precio del producto -->
        <div class="form-group">
            <label for="prices">Precio</label>
            <input type="number" class="form-control" id="prices" name="prices" value="{{ old('prices') }}" step="0.01" required>
        </div>

        <!-- Categoría del producto -->
        <div class="form-group">
            <label for="id_categories">Categoría</label>
            <select class="form-control" id="id_categories" name="id_categories" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('id_categories') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Botón para enviar el formulario -->
        <button type="submit" class="btn btn-primary">Crear Producto</button>
    </form>
</div>
@endsection
