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
            <form class="edit_product" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
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
                            <textarea class="form-control" id="description" name="description" required>{{ old('description', $product->description) }}</textarea>
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

                <div class="form-group">
                    <div class="columna">
                        <label for="size_id"><strong>Talla</strong></label>
                        <div class="entrada">
                            <select class="form-control" id="size_id" name="size_id" required>
                                @foreach($sizes as $size)
                                    <option value="{{ $size->id }}" {{ old('size_id', $product->size_id) == $size->id ? 'selected' : '' }}>
                                        {{ $size->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="columna">
                        <label for="color_id"><strong>Color</strong></label>
                        <div class="entrada">
                            <select class="form-control" id="color_id" name="color_id" required>
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}" {{ old('color_id', $product->color_id) == $color->id ? 'selected' : '' }}>
                                        {{ $color->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="update_product_button">
                    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection
