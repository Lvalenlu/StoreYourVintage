@extends('layouts.app')
@section('content')
<div class="search-bar">

    <input type="text" placeholder="Buscar producto...">
    <button>Buscar</button>
    <button onclick=abrirFiltros()>Filtros</button>
</div>

<div id="filtro-ovl" class="filtro-ovl">
        <div class="filter-content">
            <h2>Filtrar productos</h2>

            <div class="pack-filtros">
                <h3>Categoría</h3>
                <div class="columnas">
                    <div class="opciones">
                        <label><input type="checkbox" name="categoria" value="Camisetas"> Camisetas</label><br>
                        <label><input type="checkbox" name="categoria" value="Zapatos"> Zapatos</label><br>
                    </div>
                    <div class="opciones">
                        <label><input type="checkbox" name="categoria" value="Pantalones"> Pantalones</label><br>
                        <label><input type="checkbox" name="categoria" value="Suéteres"> Suéteres</label><br>
                </div>
            </div>
        </div>

        <div class="pack-filtros">
            <h3>Talla</h3>
            <div class="columnas">
                <div class="opciones">
                    <label><input type="checkbox" name="size" value="XS"> XS</label><br>
                    <label><input type="checkbox" name="size" value="S"> S</label><br>
                </div>
                <div class="opciones">
                    <label><input type="checkbox" name="size" value="M"> M</label><br>
                    <label><input type="checkbox" name="size" value="L"> L</label><br>
                </div>
                <div class="opciones">
                    <label><input type="checkbox" name="size" value="XL"> XL</label><br>
                </div>
            </div>
        </div>

        <div class="pack-filtros">
            <h3>Color</h3>
            <div class="columnas">
                <div class="opciones">
                    <label><input type="checkbox" name="color" value="Rojo"> Rojo</label><br>
                    <label><input type="checkbox" name="color" value="Azul"> Verde</label><br>
                    <label><input type="checkbox" name="color" value="Azul"> Azul</label><br>
                    <label><input type="checkbox" name="color" value="Rojo"> Negro</label><br>
                    <label><input type="checkbox" name="color" value="Azul"> Blanco</label><br>
                </div>
                <div class="opciones">
                    <label><input type="checkbox" name="color" value="Rojo"> Amarillo</label><br>
                    <label><input type="checkbox" name="color" value="Azul"> Magenta</label><br>
                    <label><input type="checkbox" name="color" value="Azul"> Naranja</label><br>
                    <label><input type="checkbox" name="color" value="Azul"> Gris</label><br>
                </div>
            </div>
        </div>

        <div>
            <button>Aplicar Filtros</button>
            <button>Limpiar Filtros</button>
            <button onclick="cerrarFiltros()">Cerrar</button>
        </div>

    </div>
</div>

<section class="products-container" id="products-container">
    @foreach ($products as $product)
    <div class="product-card">
        <img src="{{asset('img').$product->image}}" alt="{{$product->name}}">
        <h3>{{$product->name}}</h3>
        <p>{{$product->description}}</p>
        <button onclick="openModal('{{$product->image}}', '{{$product->name}}', '{{$product->description}}', '{{$product->price}}', '{{$product->size}}', '{{$product->likes}}', '{{$product->seller_id}}')">Más información</button>
    </div>
    <div class="modal-overlay" id="productModal" style="display: none;">
        <div class="modal-content">

            <img id="modalImage">


            <div class="modal-details">
                <h3 id="modalTitle"></h3>

                <div class="modal-info">
                    <span id="modalPrice"></span>

                    <span id="modalLikes"></span></span>
                    <br>
                    <span id="modalSize"></span>
                    <br>
                    <span id="modalSeller"></span>
                </div>

                <div class="modal-description" id="modalDescription"></div>

                <div class="modal-registro-comprador">
                    <p><strong>Publicado:</strong>Fecha de publicación</p>
                    <p><strong>Vendido:</strong>Fecha de venta</p>
                    <p><strong>Enviado:</strong>Fecha de envío</p>
                    <p><strong>Entregado:</strong>Fecha de entrega</p>
                </div>

                <div class="modal-actions"> <!-- Para Stiven: laravel como sabe que id esta tomando el id del producto ??? de que manera y en donde? -->
                    <button onclick="location.href='{{ route('products.edit', ['product' => $product->id]) }}'" class="btn-modificar">Modificar</button>
                    <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-eliminar">Eliminar</button>
                    </form>
                </div>
            </div>

            <!-- Botón para cerrar el modal -->
             <a onclick="closeModal()"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#e8eaed"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a>
        </div>
    </div>
    @endforeach
</section>



<script>
// Simulando productos e un JSON src="{{asset('js/simulacion.js')}}"
function openModal(image, title, description, price, size, likes, seller_id) {
    document.getElementById('modalImage').src = `{{ asset('img') }}/${image}`;
    document.getElementById('modalTitle').innerText = title;
    document.getElementById('modalDescription').innerText = `Descripción del producto:${description}`;
    document.getElementById('modalPrice').innerText = `Precio $${price}`;
    document.getElementById('modalSize').innerText = `Talla: ${size}`;
    document.getElementById('modalLikes').innerText = `Likes: ${likes}`;
    document.getElementById('modalSeller').innerText = `Vendedor: ${seller_id}`;

    // Mostrar modal
    document.getElementById('productModal').style.display = 'flex';
}
function closeModal() {document.getElementById('productModal').style.display = 'none';}

</script>
<script src="{{asset('js/products.js')}}"></script>
@endsection
