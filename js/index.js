function openNav() {
  document.getElementById("sidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.getElementById("main").style.color= "rgb(13, 59, 111)";
}

function closeNav() {
  document.getElementById("sidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

function redirectToLink(value) {
  if (value !== "#") {
    window.location.href = value;
  }
}

document.addEventListener('DOMContentLoaded', cargarProductos);

function cargarProductos() {
  fetch('php/Const.Index.php')
    .then(response => response.json())
    .then(data => mostrarProductos(data.productos))
    .catch(error => console.error('Error al cargar productos:', error));
}
let totalCompra = 0;

function mostrarProductos(productos) {
  const productosDiv = document.getElementById('productos');
  productosDiv.innerHTML = '';
  productos.forEach(producto => {

    const productoDiv = document.createElement('div');
    productoDiv.classList.add('producto');
    productoDiv.innerHTML = `
      <h2>${producto.nombre}</h2>
      <img src="uploads/${producto.imagen}" alt="${producto.nombre}">
      <p>Precio: $${producto.precio}</p>
      <button id="Compra" onclick="agregarAlCarrito('${producto.nombre}', ${producto.precio})">Agregar al carrito</button>
    `;
    
    productosDiv.appendChild(productoDiv);
  });
}

function agregarAlCarrito(nombre, precio) {
  const comprasList = document.getElementById('comprasList');

  const item = document.createElement('li');
  item.textContent = `${nombre} - $${precio}`;
  comprasList.appendChild(item);

  totalCompra += precio;

  const totalDiv = document.getElementById('totalCompra');
  totalDiv.textContent = `Total: $${totalCompra.toFixed(2)}`;

}