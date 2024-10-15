<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="css/Add_product.css">
    <script src="js/Add_produc"></script>
    <?php include('php/Const.Add_produc.php'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Agregar Producto</h1>
    </header>
    <nav>
        <a href="">Proveedores</a>
        <a href="">Empleados</a>
        <a href="">Clientes</a>
        <a href="Admin.views.php">Inicio</a>
    </nav>
    <div class="container mt-5">
        <form method="post" action="<echo htmlspecialchars($_SERVER["PHP_SELF"]); ?></form>" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id_producto" class="form-label">ID Producto:</label>
                <input type="text" class="form-control" id="id_producto" name="id_producto" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio:</label>
                <input type="text" class="form-control" id="precio" name="precio" required>
            </div>
            <div class="mb-3">
                <label for="talla" class="form-label">Talla:</label>
                <input type="text" class="form-control" id="talla" name="talla" required>
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color:</label>
                <input type="text" class="form-control" id="color" name="color" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock:</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <div class="mb-3">
                <label for="proveedor_id" class="form-label">Proveedor ID:</label>
                <input type="text" class="form-control" id="proveedor_id" name="proveedor_id" required>
            </div>
            <div class="mb-3">
                <label for="id_categoria" class="form-label">ID Categoría:</label>
                <input type="text" class="form-control" id="id_categoria" name="id_categoria" required>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
</body>
</html>
