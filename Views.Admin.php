<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/Admin.css">
    <script src="js/Admin.js"></script>
    <?php include('php/Const.Admin.php'); ?>
</head>
<body>
    <header>
        <h1>Productos</h1>
    </header>
    <nav>
        <a href="proveedores.php">Proveedores</a>
        <a href="empleados.php">Empleados</a>
        <a href="clientes.php">Clientes</a>
        <a href="inicio.php">Inicio</a>
    </nav>
    <div class="container mt-5">
        <a href="agregar_produc.php" class="btn btn-primary mb-3">Agregar Producto</a>
        <h1>Listado de Productos</h1>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Talla</th>
                    <th>Color</th>
                    <th>Stock</th>
                    <th>Proveedor ID</th>
                    <th>Id Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) { ?>
                    <tr>
                        <td><?php echo $producto['id_producto']; ?></td>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['precio']; ?></td>
                        <td><?php echo $producto['talla']; ?></td>
                        <td><?php echo $producto['color']; ?></td>
                        <td><?php echo $producto['stock']; ?></td>
                        <td><?php echo $producto['proveedor_id']; ?></td>
                        <td><?php echo $producto['id_categoria']; ?></td>
                        <td>
                            <a href="editar_produc.php?id_producto=<?php echo $producto['id_producto']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminar_produc.php?id_producto=<?php echo $producto['id_producto']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>