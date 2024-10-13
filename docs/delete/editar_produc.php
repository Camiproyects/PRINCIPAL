<?php
require_once 'conexion.php';

class producto {
    private $conn;

    public function __construct() {
        $this->conn = DataBase::connection(); 
    }

    public function getById($id_producto) {
        $sql = "SELECT * FROM producto WHERE id_producto=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id_producto]);
        return $stmt->fetch();
    }

    public function update($id_producto, $nombre, $precio, $talla, $color, $stock, $proveedor_id, $id_categoria) {
        $sql = "UPDATE producto SET nombre=?, precio=?, talla=?, color=?, stock=?, proveedor_id=?, id_categoria=? WHERE id_producto=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nombre, $precio, $talla, $color, $stock, $proveedor_id, $id_categoria, $id_producto]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $talla = $_POST['talla'];
    $color = $_POST['color'];
    $stock = $_POST['stock'];
    $proveedor_id  = $_POST['proveedor_id'];
    $id_categoria = $_POST['id_categoria'];

    $producto = new producto();
    $producto->update($id_producto, $nombre, $precio, $talla, $color, $stock, $proveedor_id, $id_categoria);

    header("Location: Admin.views.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_producto']) && !empty($_GET['id_producto'])) {
    $id_producto = $_GET['id_producto'];

    $producto = new producto();
    $datosproducto = $producto->getById($id_producto);

    if (!$datosproducto) {
        header("Location: Admin.views.php?error=Producto no encontrado");
        exit();
    }
} else {
    header("Location: Admin.views.php?error=ID de producto no válido");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
       <style>
        body {
            background-image: url('gratis-png-cuatro-mujeres-visten-modelo-de-dibujo-modelo-de-dibujo.png'); 
            background-size: cover; 
            background-position: center; 
            font-family: 'Baguet Script', cursive;
            margin: 0;
            padding: 0;
            background-color: rgb(255, 255, 255);
        }
        header {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }
        nav {
            background-color: #007bff;
            padding: 10px;
            text-align: center;
        }
        nav a {
            margin: 0 15px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
            color: #ffc107;
        }
        .table {
            background-color: #f8f9fa; /* Color gris claro */
        }
        #agrebot {
            margin-bottom: 20px;
        }
    </style>
</style>
<body>
<header>
    <h1>Producto</h1>
</header>

<nav>
    <a href="">Proveedores</a>
    <a href="">Empleados</a>
    <a href="">Clientes</a>
    <a href="Admin.views.php">Inicio</a>
</nav>

<div class="container mt-5">
    <h1>Editar Producto</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id_producto" value="<?php echo htmlspecialchars($datosproducto['id_producto']); ?>">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($datosproducto['nombre']); ?>">
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" class="form-control" id="precio" name="precio" value="<?php echo htmlspecialchars($datosproducto['precio']); ?>">
        </div>
        <div class="form-group">
            <label for="talla">Talla:</label>
            <input type="text" class="form-control" id="talla" name="talla" value="<?php echo htmlspecialchars($datosproducto['talla']); ?>">
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="text" class="form-control" id="stock" name="stock" value="<?php echo htmlspecialchars($datosproducto['stock']); ?>">
        </div>
        <div class="form-group">
            <label for="proveedor_id">Proveedor_id:</label>
            <input type="text" class="form-control" id="proveedor_id" name="proveedor_id" value="<?php echo htmlspecialchars($datosproducto['proveedor_id']); ?>">
        </div>
        <div class="form-group">
            <label for="id_categoria">Id_categoria:</label>
            <input type="text" class="form-control" id="id_categoria" name="id_categoria" value="<?php echo htmlspecialchars($datosproducto['id_categoria']); ?>">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
</body>
</html>
