<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/styles_navbar.css">
    <link rel="stylesheet" href="./assets/css/styles_productos.css">
    <script src="https://kit.fontawesome.com/15e7ed816c.js" crossorigin="anonymous"></script>

    <title>Productos</title>
</head>

<body>

    <div id="navbar-container"></div>
    
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
                        <label><input type="checkbox" name="talla" value="XS"> XS</label><br>
                        <label><input type="checkbox" name="talla" value="S"> S</label><br>
                    </div>
                    <div class="opciones">
                        <label><input type="checkbox" name="talla" value="M"> M</label><br>
                        <label><input type="checkbox" name="talla" value="L"> L</label><br>
                    </div>
                    <div class="opciones">
                        <label><input type="checkbox" name="talla" value="XL"> XL</label><br>
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

    <section class="productos-container" id="productos-container"></section>

    <div class="modal-overlay" id="productModal" style="display: none;">
        <div class="modal-content">
            
            <img id="modalImage" src="" alt="Imagen del producto">
    
            
            <div class="modal-details">
                <h3 id="modalTitle">Nombre del Producto</h3>
    
                <div class="modal-info">
                    <span id="modalPrice">$ Precio</span>
                    <span id="modalLikes">Likes: 0</span>
                    <span id="modalTalla">Talla: N/A</span>
                    <span id="modalVendedor">Vendedor: N/A</span>
                </div>
    
                <div class="modal-description" id="modalDescription">
                    Descripción del producto...
                </div>
    
                <div class="modal-registro-comprador">
                    <p><strong>Publicado:</strong> Fecha de publicación</p>
                    <p><strong>Vendido:</strong> Fecha de venta</p>
                    <p><strong>Enviado:</strong> Fecha de envío</p>
                    <p><strong>Entregado:</strong> Fecha de entrega</p>
                </div>
    
                <div class="modal-actions">
                    <button class="btn-modificar">Modificar</button>
                    <button class="btn-eliminar">Eliminar</button>
                </div>
            </div>
    
            <!-- Botón para cerrar el modal -->
             <a onclick="closeModal()"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#e8eaed"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a>
        </div>
    </div>

    <script src="./assets/js/simulacion.js"></script>
    <script src="./assets/js/products.js"></script>
    <script src="./assets/js/navbar_loader.js"></script>
    <script src="./assets/js/script_navbar.js"></script>
</body>
</html>