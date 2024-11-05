<?php
session_start();
include 'DataBase.php';

$isLoggedIn = isset($_SESSION['usuario']);
$response = [];

try {
    $db = DataBase::connection();
    // Modificamos la consulta para traer el campo imagen
    $sql = "SELECT id_producto, nombre, precio, imagen FROM producto";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $response['productos'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $response['error'] = "Error en la consulta: " . $e->getMessage();
}

echo json_encode($response);
