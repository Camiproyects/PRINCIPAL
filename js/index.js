const isLoggedIn = false; // Puedes cambiar esto según tu lógica de sesión

// Función para cargar productos
async function cargarProductos() {
    const response = await fetch ('php/Const.Index.php');
    const data = await response.json();

    const productosDiv = document.getElementById('productos');
    if (data.error) {
        productosDiv.innerHTML = data.error;
        return;
    }

    if (data.productos.length > 0) {
        data.productos.forEach(producto => {
            const productoDiv = document.createElement('div');
            productoDiv.classList.add('producto');

            // Creamos la estructura del producto incluyendo la imagen
            productoDiv.innerHTML = `
                <h3>${producto.nombre}</h3>
                <img src="uploads/${producto.imagen}" alt="${producto.nombre}" style="width:150px; height:150px;">
                <p>Precio: $${producto.precio}</p>
                <p>Stock disponible: ${producto.stock}</p>
                <button class="button" onclick="agregarAlCarrito('${producto.nombre}', 1, ${producto.precio})">Agregar al Carrito</button>
            `;
            productosDiv.appendChild(productoDiv);
        });
    } else {
        productosDiv.innerHTML = "No hay productos disponibles.";
    }
}

function agregarAlCarrito(producto, cantidad, precio) {
    if (!isLoggedIn) {
        window.location.href = 'Views.Login.html';
        return;
    }
    console.log(`Agregando ${producto} al carrito. Precio: ${precio}`);
}

// Cargar productos al inicio
cargarProductos();
