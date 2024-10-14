<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php include('php/Const.Delete_product.php')?>
    <title>Eliminar Producto</title>
</head>
<body>
<header>
        <h1>Producto</h1>
    </header>

    <nav>
        <a href="">Proveedores</a>
        <a href="">Empleados</a>
        <a href="">Clientes</a>
        <a href="Admin.views.php">Inicio</a>
        
    </nav>

    <div class="container mt-5">
        <h1>Eliminar Producto</h1>
        <p>¿Estás seguro de que quieres eliminar este producto?</p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id_producto" value="<?php echo $_GET['id_producto']; ?>">
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="Admin.views.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>