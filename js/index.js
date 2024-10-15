// Seleccionamos los elementos relevantes
const cartButton = document.getElementById('cart-button');
const cart = document.getElementById('cart');
const carrito = document.getElementById('carrito');
const total = document.getElementById('total');
const btnVaciar = document.getElementById('btnVaciar');

// Función para abrir el carrito
cartButton.addEventListener('click', () => {
    cart.classList.add('active');
});

// Función para cerrar el carrito
document.getElementById('closeCart')?.addEventListener('click', () => {
    cart.classList.remove('active');
});

// Función para vaciar el carrito
btnVaciar.addEventListener('click', () => {
    carrito.innerHTML = ''; // Limpia los productos del carrito
    total.textContent = '0.00'; // Reinicia el total a 0
});

// Función para agregar productos al carrito
function agregarAlCarrito(producto, cantidad, precio) {
    if (!isLoggedIn) {
        // Si el usuario no está logueado, lo redirigimos a la página de login
        window.location.href = 'login.php';
        return;
    }

    // Crear la fila del producto
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>${producto}</td>
        <td>${cantidad}</td>
        <td>${precio}</td>
        <td>${(cantidad * precio).toFixed(2)}</td>
    `;
    carrito.appendChild(row);

    // Actualizar el total
    let totalActual = parseFloat(total.textContent);
    totalActual += cantidad * precio;
    total.textContent = totalActual.toFixed(2);
}
