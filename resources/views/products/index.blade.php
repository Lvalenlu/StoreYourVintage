@extends('layouts.app')

@section('content')

<div class="search-bar">

    <input type="text" placeholder="Buscar producto..." id="search-input">
    <button id="search-button">Buscar</button>
    <button onclick=abrirFiltros()>Filtros</button>
</div>

<div id="filtro-ovl" class="filtro-ovl">
    <div class="filter-content">
        <h2>Filtrar productos</h2>
        <form id="filtro-form" action="{{ route('product') }}" method="POST">
            @csrf
        <div class="pack-filtros">
            <h3>Categoría</h3>
            <div class="columnas">
                @foreach($categories as $category)
                    <div class="opciones">
                        <label>
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="pack-filtros">
            <h3>Talla</h3>
            <div class="columnas">
                @foreach($sizes as $size)
                    <div class="opciones">
                        <label>
                            <input type="checkbox" name="sizes[]" value="{{ $size->id }}">
                            {{ $size->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="pack-filtros">
            <h3>Color</h3>
            <div class="columnas">
                @foreach($colors as $color)
                    <div class="opciones">
                        <label>
                            <input type="checkbox" name="colors[]" value="{{ $color->id }}">
                            {{ $color->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div>
            <button type="submit">Aplicar Filtros</button>
            <button type="reset">Limpiar Filtros</button>
            <button onclick="cerrarFiltros()">Cerrar</button>
        </div>
        </form>
    </div>
</div>


<section class="products-container" id="products-container">
    @foreach ($products as $product)
    <div class="product-card" onclick="openModal('{{$product->id}}')" data-name="{{ $product->name }}">
        <img src="{{asset('img').$product->image}}" alt="{{$product->name}}">
        <h3>{{$product->name}}</h3>
        <p>{{$product->description}}</p>
        {{-- <button onclick="openModal('{{$product->id}}')">Más información</button> --}}
    </div>
    <div class="modal-overlay" id="productModal{{$product->id}}" style="display: none;">
        <div class="modal-content">

            <img id="modalImage" src="{{asset('img').$product->image}}" alt="{{$product->name}}">


            <div class="modal-details">
                <h3 id="modalTitle">{{$product->name}}</h3>

                <div class="modal-info">
                    <span id="modalPrice">Precio: {{$product->price}}</span><br>
                    <span id="modalLikes">Likes: {{$product->likes}}</span><br>
                    <span id="modalSize">Talla: {{$product->size}}</span><br>
                    <span id="modalSeller">Vendedor: {{$product->seller_id}}</span>
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


                <div class="modal-actions"> <!-- Para Stiven: laravel como sabe que id esta tomando el id del producto ??? de que manera y en donde? -->
                    <button onclick="location.href='{{ route('products.edit',$product->id) }}'" class="btn-modificar">Modificar</button>
                    <form action="{{ route('products.destroy', $product->id)}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
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
// Simulando productos e un JSON src="{{asset('js/simulacion.js')}}"
function openModal(id) {
    // Mostrar modal
    document.getElementById('productModal'+id).style.display = 'flex';
}
function closeModal(id) {document.getElementById('productModal'+id).style.display = 'none';}
// Función para cerrar el dropdown si se hace clic fuera de él

</script>

<script src="{{asset('js/products.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('search-input');
  const searchButton = document.getElementById('search-button');
  const productsContainer = document.querySelector('.products-container');

  searchButton.addEventListener('click', function() {
    const searchTerm = searchInput.value.toLowerCase();
    const products = productsContainer.querySelectorAll('.product-card');

    products.forEach(product => {
      const productName = product.getAttribute('data-name').toLowerCase();
      if (productName.includes(searchTerm)) {
        product.style.display = '';
      } else {
        product.style.display = 'none';
      }
    });
  });

  // Opción alternativa: Filtración en tiempo real
  searchInput.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const products = productsContainer.querySelectorAll('.product-card');

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
