// Simulando productos de un JSON
const productos = [
    {
      nombre: "Camiseta Roja",
      descripcion: "Camiseta de algodón de alta calidad.",
      talla: "XL",
      likes: 50,
      vendedor: "Juan",
      precio: 19.99,
      imagen: "img/camisa_roja.jpg"
    },
    {
      nombre: "Zapatos Negros",
      descripcion: "Zapatos de cuero elegantes.",
      precio: 89.99,
      talla: "M",
      likes: 2052,
      vendedor: "El ñerito que me robo",
      imagen: "https://via.placeholder.com/300x200?text=Zapatos+Negros"
    },
    {
      nombre: "Pantalón Azul",
      descripcion: "Pantalón cómodo y resistente.",
      precio: 29.99,
      talla: "XS",
      likes: 205,
      vendedor: "Claudia lopez",
      imagen: "https://via.placeholder.com/300x200?text=Pantalon+Azul"
    },
    {
        nombre: "Sueter Floripepiado",
        descripcion: "Sueter horroroso que ni el diablo compraria.",
        precio: 999.99,
        talla: "XL",
        likes: -100,
        vendedor: "Manuel <3",
        imagen: "https://via.placeholder.com/300x200?text=Pantalon+Azul"
      },
      {
        nombre: "Pantalón Azul",
        descripcion: "Pantalón cómodo y resistente.",
        precio: 29.99,
        talla: "XS",
        likes: 205,
        vendedor: "Claudia lopez",
        imagen: "https://via.placeholder.com/300x200?text=Pantalon+Azul"
      },
      {
        nombre: "Pantalón Azul",
        descripcion: "Pantalón cómodo y resistente.",
        precio: 29.99,
        talla: "XS",
        likes: 205,
        vendedor: "Claudia lopez",
        imagen: "https://via.placeholder.com/300x200?text=Pantalon+Azul"
      },
      {
        nombre: "Pantalón Azul",
        descripcion: "Pantalón cómodo y resistente.",
        precio: 29.99,
        talla: "XS",
        likes: 205,
        vendedor: "Claudia lopez",
        imagen: "https://via.placeholder.com/300x200?text=Pantalon+Azul"
      }
];
  
  // Función que genera las tarjetas en HTML

function generarTarjetas() {
    let container = document.getElementById('productos-container');
    
    productos.forEach(producto => {
        let cardHTML = `
        <div class="product-card">
            <img src="${producto.imagen}" alt="${producto.nombre}">
            <h3>${producto.nombre}</h3>
            <p>${producto.descripcion}</p>
            <button onclick="openModal('${producto.imagen}', '${producto.nombre}', '${producto.descripcion}', '${producto.precio}', '${producto.talla}', '${producto.likes}', '${producto.vendedor}')">Más información</button>
        </div>
        `;
        container.innerHTML += cardHTML;
    });
}

function openModal(imageSrc, title, description, price, talla, likes, vendedor) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('modalTitle').innerText = title;
    document.getElementById('modalDescription').innerText = description;
    document.getElementById('modalPrice').innerText = `$ ${price}`;
    document.getElementById('modalTalla').innerText = `Talla: ${talla}`;
    document.getElementById('modalLikes').innerText = `Likes: ${likes}`;
    document.getElementById('modalVendedor').innerText = `Vendedor: ${vendedor}`;

    // Mostrar modal
    document.getElementById('productModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('productModal').style.display = 'none';
}
  
window.onload = generarTarjetas;

  

  // para backend reemplacen la llamada con la API real

  