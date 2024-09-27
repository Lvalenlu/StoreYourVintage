@extends('layouts.app')

@section('content')

<!-- Barra de búsqueda para filtrar productos -->
<div class="search-bar">
    <input type="text" placeholder="Buscar producto..." id="search-input">
    <button id="search-button">Buscar</button>
    <button onclick="abrirFiltros()">Filtros</button>
</div>

<!-- Panel de filtros oculto que se muestra al hacer clic en "Filtros" -->
<div id="filtro-ovl" class="filtro-ovl">
    <div class="filter-contenedor">
        <h2>Filtrar productos</h2>
        <!-- Formulario para aplicar filtros -->
        <form id="filtro-form" class="filter-form" action="{{ route('product') }}" method="POST">
            @csrf

            <div class="pack-filtros">
                <h3>Categoría</h3>
                <div class="columnas_filtros">
                    @foreach($categories as $category)
                        <div class="opciones">
                            <label>
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"> <!-- Checkbox para seleccionar categoría -->
                                {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Filtros por Talla -->
            <div class="pack-filtros">
                <h3>Talla</h3>
                <div class="columnas_filtros">
                    @foreach($sizes as $size)
                        <div class="opciones">
                            <label>
                                <input type="checkbox" name="sizes[]" value="{{ $size->id }}"> <!-- Checkbox para seleccionar talla -->
                                {{ $size->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Filtros por Color -->
            <div class="pack-filtros">
                <h3>Color</h3>
                <div class="columnas_filtros">
                    @foreach($colors as $color)
                        <div class="opciones">
                            <label>
                                <input type="checkbox" name="colors[]" value="{{ $color->id }}"> <!-- Checkbox para seleccionar color -->
                                {{ $color->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Botones para aplicar o limpiar filtros -->
            <div class="filter_buttons">
                <button type="submit">Aplicar Filtros</button>
                <div class="secondary-buttons">
                    <button type="reset">Limpiar Filtros</button>
                    <button onclick="cerrarFiltros()">Cerrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<section class="products-container" id="products-container">
    @foreach ($products as $product)
    <!-- Tarjeta de producto, que se puede hacer clic para abrir un modal -->
    <div class="product-card" onclick="openModal('{{$product->id}}')" data-name="{{ $product->name }}">
        <img src="{{asset('storage/images').$product->image}}" alt="{{$product->name}}">
        <h3>{{$product->name}}</h3>
        <p>{{$product->description}}</p>
    </div>

    <!-- Modal para mostrar detalles del producto -->
    <div class="modal-overlay" id="productModal{{$product->id}}" style="display: none;">
        <div class="modal-content">
            <img id="modalImage" src="{{asset('storage/images').$product->image}}" alt="{{$product->name}}">
            <div class="modal-details">
                <h3 id="modalTitle">{{$product->name}}</h3>

                <div class="modal-info">
                    <span id="modalPrice"><strong>Precio:</strong>  {{$product->price}}</span><br>
                    <span id="modalLikes"><strong>Likes:</strong>   {{$product->likes}}</span><br>
                    <span id="modalSize"><strong>Talla:</strong>   {{$product->size->name}}</span><br>
                    <span id="modalCategory"><strong>Categoría:</strong>
                        @if ($product->categories)
                            {{ $product->categories->name}}
                        @else
                            Categoría no disponible
                        @endif</span><br>
                    <span id="modalColor"><strong>Color:</strong>   {{$product->color->name}}</span><br>
                    <span id="modalSeller"><strong>Vendedor:</strong> {{$product->seller_id}}</span>
                </div>

                <div class="modal-description" id="modalDescription"></div>

                <div class="modal-registro-comprador">
                    @foreach ($product->orders as $order)
                        <p><strong>Publicado:</strong> {{$product->publicationDate}}</p>
                        <p><strong>Vendido:</strong> {{$order->saleDate}}</p>
                        <p><strong>Enviado:</strong> {{$order->shippingDate}}</p>
                        <p><strong>Entregado:</strong> {{$order->deliveryDate}}</p>
                    @endforeach
                </div>

                <div class="modal-actions">
                    <button onclick="location.href='{{ route('products.edit',$product->id) }}'" class="btn-modificar">Modificar</button>
                    <form action="{{ route('products.destroy', $product->id)}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <!-- Botón para confirmar eliminación -->
                        <button type="submit" class="btn-eliminar">Eliminar</button>
                    </form>
                </div>
            </div>

            <!-- Botón para cerrar el modal -->
            <a onclick="closeModal({{$product->id}})"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#e8eaed"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a>
        </div>
    </div>
    @endforeach
</section>

<script>
// Función para abrir el modal del producto
function openModal(id) {
    document.getElementById('productModal' + id).style.display = 'flex';
}

// Función para cerrar el modal del producto
function closeModal(id) {
    document.getElementById('productModal' + id).style.display = 'none';
}

// Aquí podrían añadirse más funciones si es necesario
</script>

<script src="{{asset('js/products.js')}}"></script>
<script>
    // Evento que se ejecuta al cargar el contenido de la página
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search-input');
        const searchButton = document.getElementById('search-button');
        const productsContainer = document.querySelector('.products-container');

        // Evento que se activa al hacer clic en el botón de búsqueda
        searchButton.addEventListener('click', function() {
            const searchTerm = searchInput.value.toLowerCase();
            const products = productsContainer.querySelectorAll('.product-card');

            // Iterar sobre las tarjetas de producto para mostrar u ocultar según el término de búsqueda
            products.forEach(product => {
                const productName = product.getAttribute('data-name').toLowerCase();
                if (productName.includes(searchTerm)) {
                    product.style.display = '';
                } else {
                    product.style.display = 'none';
                }
            });
        });

        // Opción alternativa: Filtración en tiempo real mientras se escribe en el campo de búsqueda
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const products = productsContainer.querySelectorAll('.product-card');

            // Iterar sobre las tarjetas de producto para mostrar u ocultar según el término de búsqueda
            products.forEach(product => {
                const productName = product.getAttribute('data-name').toLowerCase();
                if (productName.includes(searchTerm)) {
                    product.style.display = '';
                } else {
                    product.style.display = 'none';
                }
            });
        });
    });
</script>

@endsection
