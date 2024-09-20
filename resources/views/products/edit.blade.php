@extends('layouts.app')

@section('content')
<div class="container">
    

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

    <div class="contenedor-principal">
        <div class="contenedor-perfil">
            <h2 class="titulo">Editar Producto</h2>
            <!-- Formulario para editar producto -->
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Nombre del producto -->
                <div class="form-group">
                    <div class="columna">
                        <label for="name"><strong>Nombre del producto</strong></label>
                        <div class="entrada">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                        </div>
                    </div>
                </div>

                <!-- Descripción del producto -->
                <div class="form-group">
                    <div class="columna">
                        <label for="description"><strong>Descripción</strong></label>
                        <div class="entrada">
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $product->description) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Tamaño del producto -->
                <div class="form-group">
                    <div class="columna">
                        <label for="size"><strong>Talla</strong></label>
                        <div class="entrada">
                            <input type="text" class="form-control" id="size" name="size" value="{{ old('size', $product->size) }}" required>
                        </div> 
                    </div>
                </div>

                <!-- Precio del producto -->
                <div class="form-group">
                    <div class="columna">
                        <label for="prices"><strong>Precio</strong></label>
                        <div class="entrada">
                            <input type="number" class="form-control" id="prices" name="prices" value="{{ old('prices', $product->prices) }}" step="0.01" required>
                        </div>
                    </div>
                </div>

                <!-- Categoría del producto -->
                <div class="form-group">
                    <div class="columna">
                        <label for="id_categories"><strong>Categoría</strong></label>
                        <div class="entrada">
                            <select class="form-control" id="id_categories" name="id_categories" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('id_categories', $product->id_categories) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Botón para enviar el formulario -->
                <button type="submit" class="btn btn-primary">Actualizar Producto</button>
            </form>
        </div>
    </div>
</div>
@endsection
