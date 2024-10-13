<?php
require_once 'DataBase.php';

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