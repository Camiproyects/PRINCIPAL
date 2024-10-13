<?php
require_once 'conexion.php';

class producto {
    private $conn;

    public function __construct() {
        $this->conn = DataBase::connection(); 
    }

    public function delete($id_producto) {
        $sql = "DELETE FROM producto WHERE id_producto=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id_producto]);
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id_producto = $_POST['id_producto'];

    
    $producto = new producto();
    $producto->delete($id_producto);

   
    header("Location: Admin.views.php");
    exit();
}


if (!isset($_GET['id_producto'])) {
    header("Location: Admin.views.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Eliminar Producto</title>
</head>
<body>
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
        <h1>Eliminar Producto</h1>
        <p>¿Estás seguro de que quieres eliminar este producto?</p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id_producto" value="<?php echo $_GET['id_producto']; ?>">
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="Admin.views.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>