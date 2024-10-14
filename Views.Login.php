<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/Login.js" defer></script>
    <title>Iniciar Sesión</title>
</head>
<body>
    <header>
        <h1>Inicio De Sesión</h1>
    </header>
    <section id="Formulario">
        <form id="registro-form" action="" method="POST">
            <div>
                <input class="caja" type="email" name="correo" id="Correo" placeholder="Ingresa Tu Correo" required>
            </div>
            <div>
                <input class="caja" type="password" name="contrasena" id="Contraseña" placeholder="Ingresa Tu Contraseña" required>
            </div>
            <div class="Recordar">
                <label><input type="checkbox" id="Recordar" name="session" value="Recordar"> Recordar Inicio De Sesión</label>
            </div>
                <button class="submit" type="submit">Iniciar Sesión</button>
            <p>Olvidaste Tu Usuario?</p>
            <div>
                <button class="button" type="button" onclick="RecuperarUsurio()">Recuperar Usurio</button>
            </div>
            <p>No Tienes Un Usuario?</p>
            <div class="button">
                <button class="button" type="button" onclick="RegistrarUsuario()">Crear Usuario</button>
            </div>
        </form>
    </section>
    <footer>
        <p>&copy; 2024 , <a href="#">Términos y condiciones</a></p>
    </footer>
</body>
</html>