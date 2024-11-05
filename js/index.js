function openNav() {
    document.getElementById("sidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

function redirectToLink(value) {
    // Evitar la redirección si se selecciona la opción inicial
    if (value !== "#") {
        window.location.href = value; // Redirige al valor de la opción seleccionada
    }
}

// Llama a la función para cargar productos al inicio
document.addEventListener('DOMContentLoaded', cargarProductos);

function cargarProductos() {
    fetch('php/Const.Index.php') // Asegúrate de que la ruta sea correcta
        .then(response => response.json())
        .then(data => mostrarProductos(data.productos))
        .catch(error => console.error('Error al cargar productos:', error));
}

function mostrarProductos(productos) {
    const productosDiv = document.getElementById('productos');
    productosDiv.innerHTML = ''; // Limpia el contenedor antes de agregar productos

    productos.forEach(producto => {
        const productoDiv = document.createElement('div');
        productoDiv.classList.add('producto');
        productoDiv.innerHTML = `
            <h2>${producto.nombre}</h2>
            <img src="uploads/${producto.imagen}" alt="${producto.nombre}">
            <p>Precio: $${producto.precio}</p>
            <button onclick="agregarProducto('agreagr al carrito')">Agregar  al carrito</button>
        `;
        
        productosDiv.appendChild(productoDiv);
    });
}

// Inicializa la lista de compras vacía
let compras = [];

// Función para agregar producto a la lista y mostrarlo en el HTML
function agregarProducto(nombreProducto) {
    // Agrega el nombre del producto a la lista de compras
    compras.push(nombreProducto);

    // Actualiza el HTML para mostrar la lista de compras
    mostrarListaCompras();
}

// Función para mostrar la lista de compras en el HTML
function mostrarListaCompras() {
    // Selecciona el elemento UL en el HTML
    const comprasList = document.getElementById("comprasList");

    // Limpia el contenido actual para evitar duplicados
    comprasList.innerHTML = "";

    // Itera sobre la lista de compras y crea un elemento LI para cada producto
    compras.forEach((producto) => {
        const listItem = document.createElement("li");
        listItem.textContent = producto;
        comprasList.appendChild(listItem);
    });
}
