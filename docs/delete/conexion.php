<?php
class DataBase {
    public static function connection() {
        $hostname = "localhost";
        $port = "3306";
        $database = "tienda_ropa"; 
        $username  = "root";
        $password = "";
        
        try {
            $pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>

