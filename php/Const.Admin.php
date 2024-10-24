<?php
class Admin {
    public function main() {
        require_once 'Views.Admin.html';
}
}
require_once 'DataBase.php';  


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
