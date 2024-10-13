<?php
require_once 'DataBase.php';

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
