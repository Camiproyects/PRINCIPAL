<?php
session_start();
include 'DataBase.php';

$isLoggedIn = isset($_SESSION['usuario']);
$response = [];

if ($isLoggedIn) {
    // Verifica que se reciban los datos del formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $db = DataBase::connection();

            // Valores a insertar desde el formulario
            $nombreCompleto = explode(' ', $_POST['nombres']);
            $nombre = $nombreCompleto[0];
            $apellido = isset($nombreCompleto[1]) ? $nombreCompleto[1] : ''; // Manejar caso de un solo nombre
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $email = $_POST['correo'];
            $password = $_POST['clave'];
            $confirmarClave = $_POST['confirmarClave'];

            // Verificar que las contraseñas coincidan
            if ($password !== $confirmarClave) {
                $response['error'] = "Las contraseñas no coinciden.";
            } else {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $rol_id = 1; // Siempre será 1

                // Consulta de inserción
                $sql = "INSERT INTO `persona`(`nombre`, `apellido`, `direccion`, `telefono`, `email`, `password_hash`, `rol_id`) 
                        VALUES (:nombre, :apellido, :direccion, :telefono, :email, :password_hash, :rol_id)";
                $stmt = $db->prepare($sql);

                // Asignación de parámetros
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':apellido', $apellido);
                $stmt->bindParam(':direccion', $direccion);
                $stmt->bindParam(':telefono', $telefono);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password_hash', $password_hash);
                $stmt->bindParam(':rol_id', $rol_id); // Rol ID siempre 1

                // Ejecutar la consulta
                if ($stmt->execute()) {
                    $response['success'] = "Registro insertado correctamente.";
                } else {
                    $response['error'] = "Error al insertar el registro.";
                }
                
            }
        } catch (PDOException $e) {
            $response['error'] = "Error en la consulta: " . $e->getMessage();
        }
    } else {
        $response['error'] = "Método de solicitud no permitido.";
    }
} else {
    $response['error'] = "Usuario no autenticado.";
}

echo json_encode($response);
