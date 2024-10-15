<?php
session_start(); // Iniciar sesión
include 'DataBase.php'; // Incluir el archivo con la clase DataBase

// Verifica si el usuario ha iniciado sesión
$isLoggedIn = isset($_SESSION['usuario']);

try {
    // Conexión a la base de datos usando la clase DataBase
    $db = DataBase::connection();

    // Consulta para obtener todos los productos
    $sql = "SELECT nombre, precio, stock FROM producto";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    // Obtener los resultados
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Productos Disponibles</h1>

    <div id="productos">
        <?php
        // Verifica si se obtuvieron productos
        if (count($productos) > 0) {
            // Mostrar cada producto en un contenedor
            foreach ($productos as $producto) {
                echo '<div class="producto">';
                echo '<h3>' . htmlspecialchars($producto['nombre']) . '</h3>';
                echo '<p>Precio: $' . htmlspecialchars($producto['precio']) . '</p>';
                echo '<p>Stock disponible: ' . htmlspecialchars($producto['stock']) . '</p>';
                echo '<button class="button" onclick="agregarAlCarrito(\'' . $producto['nombre'] . '\', 1, ' . $producto['precio'] . ')">Agregar al Carrito</button>';
                echo '</div>';
            }
        } else {
            echo "No hay productos disponibles.";
        }

        // Cerrar la conexión
        $db = null;
        ?>
    </div>

    <!-- Incluimos el script para gestionar el carrito -->
    <script>
        const isLoggedIn = <?php echo $isLoggedIn ? 'true' : 'false'; ?>;

        function agregarAlCarrito(producto, cantidad, precio) {
            if (!isLoggedIn) {
                // Redirige a la página de login si no hay sesión
                window.location.href = 'login.php';
                return;
            }

            // Lógica para agregar al carrito (esto puede expandirse)
            console.log(`Agregando ${producto} al carrito. Precio: ${precio}`);
        }
    </script>
</body>
</html>
