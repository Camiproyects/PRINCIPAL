<?php
session_start();
include 'DataBase.php'; // Incluye tu archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Validación básica
    if (empty($correo) || empty($contrasena)) {
        echo json_encode(['error' => 'Por favor ingresa el correo y la contraseña.']);
        exit;
    }

    try {
        // Conectar a la base de datos
        $db = DataBase::connection();

        // Preparar la consulta para verificar el inicio de sesión
        $sql = "SELECT p.*, p.password_hash, c.rol_id 
                FROM persona p 
                JOIN cliente c ON p.id = c.id 
                WHERE p.email = :email";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $correo);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verificar la contraseña (asumiendo que password_hash almacena la contraseña encriptada en persona)
            if (password_verify($contrasena, $user['password_hash'])) {
                // Contraseña correcta: establecer variables de sesión
                $_SESSION['usuario'] = $user['id'];
                $_SESSION['correo'] = $user['email'];

                // Verificar el rol_id para la redirección
                if ($user['rol_id'] == 1) {
                    // Cliente: redirigir a la página principal
                    echo json_encode(['success' => 'Inicio de sesión exitoso', 'redirect' => 'index.php']);
                } elseif ($user['rol_id'] == 2) {
                    // Empleado: redirigir al panel de administración
                    echo json_encode(['success' => 'Inicio de sesión exitoso', 'redirect' => 'Views.Admin.html']);
                } else {
                    echo json_encode(['error' => 'Rol no reconocido.']);
                }
            } else {
                // Si la contraseña es incorrecta, imprime el hash almacenado y la contraseña ingresada para depuración
                echo json_encode([
                    'error' => 'Contraseña incorrecta.',
                    'stored_hash' => $user['password_hash'],
                    'input_password' => $contrasena
                ]);
            }
        } else {
            echo json_encode(['error' => 'El correo no está registrado.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error en la consulta: ' . $e->getMessage()]);
    }
}
?>
