@extends('layouts.app')

@section('content')

<div class="view">
    <div class="container">
        <!-- Mostrar errores de validación, si los hay -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="contenedor-perfil">
            <h2 class="titulo">Editar Producto</h2>
            <!-- Formulario para editar producto -->
            <form class="edit_product" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Método HTTP para actualizar el recurso -->

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
                            <textarea class="form-control" id="description" name="description" required>{{ old('description', $product->description) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Imagen del producto -->
                <div class="form-group">
                    <div class="columna">
                        <label for="image"><strong>Imagen del producto</strong></label>
                        <div class="entrada">
                            @if($product->image) <!-- Si ya hay una imagen, se muestra -->
                                <img src="{{ asset('storage/images/' . $product->image) }}" alt="Imagen de {{ $product->name }}" style="max-width: 150px; display: block; margin-bottom: 10px;">
                            @endif
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <small>Dejar en blanco para no cambiar la imagen.</small> <!-- Instrucción para el usuario -->
                        </div>
                    </div>
                </div>

                <!-- Precio del producto -->
                <div class="form-group">
                    <div class="columna">
                        <label for="price"><strong>Precio</strong></label>
                        <div class="entrada">
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01" required>
                        </div>
                    </div>
                </div>

                <!-- Selección de categoría -->
                <div class="form-group">
                    <div class="columna">
                        <label for="category_id"><strong>Categoría</strong></label>
                        <div class="entrada">
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category) <!-- Itera sobre las categorías disponibles -->
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Selección de talla -->
                <div class="form-group">
                    <div class="columna">
                        <label for="size_id"><strong>Talla</strong></label>
                        <div class="entrada">
                            <select class="form-control" id="size_id" name="size_id" required>
                                @foreach($sizes as $size) <!-- Itera sobre las tallas disponibles -->
                                    <option value="{{ $size->id }}" {{ old('size_id', $product->size_id) == $size->id ? 'selected' : '' }}>
                                        {{ $size->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Selección de color -->
                <div class="form-group">
                    <div class="columna">
                        <label for="color_id"><strong>Color</strong></label>
                        <div class="entrada">
                            <select class="form-control" id="color_id" name="color_id" required>
                                @foreach($colors as $color) <!-- Itera sobre los colores disponibles -->
                                    <option value="{{ $color->id }}" {{ old('color_id', $product->color_id) == $color->id ? 'selected' : '' }}>
                                        {{ $color->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Botón para actualizar el producto -->
                <div class="update_product_button">
                    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
