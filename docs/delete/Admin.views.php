<?php
require_once 'conexion.php';  

class Producto {
    private $conn;

    public function __construct() {
        $this->conn = DataBase::connection();  
    }

    public function read() {
        $sql = "SELECT * FROM producto";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $sql = "DELETE FROM producto WHERE id_producto=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}

$producto = new Producto();
$productos = $producto->read();  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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
            background-color: #f8f9fa; 
        }
        #agrebot {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Productos</h1>
    </header>

    <nav>
        <a href="">Proveedores</a>
        <a href="">Empleados</a>
        <a href="">Clientes</a>
        <a href="">Inicio</a>
    </nav>

    <div class="container mt-5">
        <a href="agregar_produc.php" class="btn btn-primary mb-3">Agregar Producto</a>
        <h1>Listado de Productos</h1>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Talla</th>
                    <th>Color</th>
                    <th>Stock</th>
                    <th>Proveedor_id</th>
                    <th>Id_Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) { ?>
                    <tr>
                        <td><?php echo $producto['id_producto']; ?></td>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['precio']; ?></td>
                        <td><?php echo $producto['talla']; ?></td>
                        <td><?php echo $producto['color']; ?></td>
                        <td><?php echo $producto['stock']; ?></td>
                        <td><?php echo $producto['proveedor_id']; ?></td>
                        <td><?php echo $producto['id_categoria']; ?></td>
                        <td>
                            <a href="editar_produc.php?id_producto=<?php echo $producto['id_producto']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminar_produc.php?id_producto=<?php echo $producto['id_producto']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
