<?php
require_once 'conexion.php';

class producto {
    private $conn;

    public function __construct() {
        $this->conn = DataBase::connection();  // Cambia aquí
    } 

    public function create($id_producto, $nombre, $precio, $talla, $color, $stock, $proveedor_id, $id_categoria, $imagen) {
        $target_dir = "uploads/"; 
        $target_file = $target_dir . basename($imagen["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($imagen["tmp_name"]);
        if ($check === false) {
            echo "El archivo no es una imagen.";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            echo "Lo siento, el archivo ya existe.";
            $uploadOk = 0;
        }

        if ($imagen["size"] > 500000) { 
            echo "Lo siento, tu archivo es demasiado grande.";
            $uploadOk = 0;
        }

        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Lo siento, tu archivo no ha sido subido.";
            return false; // Retorna false si no se subió
        } else {
            if (move_uploaded_file($imagen["tmp_name"], $target_file)) {
                $sql = "INSERT INTO producto (id_producto, nombre, precio, talla, color, stock, proveedor_id, id_categoria, imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                $success = $stmt->execute([$id_producto, $nombre, $precio, $talla, $color, $stock, $proveedor_id, $id_categoria, $target_file]);
                
                if ($success) {
                    return true;  // Inserción exitosa
                } else {
                    echo "Error en la inserción: " . $stmt->errorInfo()[2];  // Mensaje de error de la base de datos
                }
            } else {
                echo "Lo siento, hubo un error al subir tu archivo.";
            }
        }
        return false; // Retorna false si hubo un error
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que todos los campos estén presentes
    if (isset($_POST['id_producto'], $_POST['nombre'], $_POST['precio'], $_POST['talla'], $_POST['color'], $_POST['stock'], $_POST['proveedor_id'], $_POST['id_categoria']) && isset($_FILES['imagen'])) {
        $id_producto = $_POST['id_producto'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $talla = $_POST['talla'];
        $color = $_POST['color'];
        $stock = $_POST['stock'];
        $proveedor_id = $_POST['proveedor_id'];
        $id_categoria = $_POST['id_categoria'];
        $imagen = $_FILES['imagen']; 

        $producto = new producto();
        if ($producto->create($id_producto, $nombre, $precio, $talla, $color, $stock, $proveedor_id, $id_categoria, $imagen)) {
            header("Location: Admin.views.php");
            exit();
        } else {
            // Manejar el error si la inserción falló
            echo "No se pudo agregar el producto.";
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
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
            background-color: #f8f9fa; /* Color gris claro */
        }
        #agrebot {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Agregar Producto</h1>
    </header>
    <nav>
        <a href="">Proveedores</a>
        <a href="">Empleados</a>
        <a href="">Clientes</a>
        <a href="Admin.views.php">Inicio</a>
    </nav>
    <div class="container mt-5">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id_producto" class="form-label">ID Producto:</label>
                <input type="text" class="form-control" id="id_producto" name="id_producto" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio:</label>
                <input type="text" class="form-control" id="precio" name="precio" required>
            </div>
            <div class="mb-3">
                <label for="talla" class="form-label">Talla:</label>
                <input type="text" class="form-control" id="talla" name="talla" required>
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color:</label>
                <input type="text" class="form-control" id="color" name="color" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock:</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <div class="mb-3">
                <label for="proveedor_id" class="form-label">Proveedor ID:</label>
                <input type="text" class="form-control" id="proveedor_id" name="proveedor_id" required>
            </div>
            <div class="mb-3">
                <label for="id_categoria" class="form-label">ID Categoría:</label>
                <input type="text" class="form-control" id="id_categoria" name="id_categoria" required>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
</body>
</html>
