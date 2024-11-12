<?php
session_start();
include 'DataBase.php'; // Asegúrate de tener tu archivo de conexión a la base de datos

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $correo = $_POST['correo'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Validar si los campos están vacíos
    if (empty($correo) || empty($contrasena)) {
        $response['error'] = "Por favor ingresa ambos campos: correo y contraseña.";
    } else {
        try {
            // Establecer la conexión a la base de datos
            $db = DataBase::connection();

            // Consulta SQL para buscar al usuario por correo electrónico
            $sql = "SELECT id, nombre, apellido, email, password_hash, rol_id 
                    FROM persona WHERE email = :correo";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
            
            // Verificar si el usuario existe
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($contrasena, $user['password_hash'])) {
                // Si la contraseña es correcta, iniciar sesión
                $_SESSION['usuario'] = $user['id'];
                $_SESSION['nombre'] = $user['nombre'];
                $_SESSION['apellido'] = $user['apellido'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['rol_id'] = $user['rol_id'];

                // Respuesta exitosa
                $response['success'] = "Bienvenido, " . $user['nombre'];
            } else {
                // Si las credenciales no son correctas
                $response['error'] = "Correo o contraseña incorrectos.";
            }
        } catch (PDOException $e) {
            $response['error'] = "Error en la conexión a la base de datos: " . $e->getMessage();
        }
    }
} else {
    $response['error'] = "Método no permitido.";
}

// Devolver la respuesta en formato JSON
echo json_encode($response);
?>
