<<<<<<< HEAD
-- Volcado de datos para la tabla `cliente`
INSERT INTO `cliente` (`id`, `es_preferencial`, `rol_id`) VALUES

(1, 1, 2),
(2, 0, 2),
(3, 1, 2),
(4, 0, 2);


-- Volcado de datos para la tabla `empleado`
INSERT INTO `empleado` (`id`, `puesto`, `salario`, `fecha_contratacion`, `persona_id`) VALUES
(1, 'Vendedor', 1200.00, '2022-06-01', 5),
(2, 'Cajero', 1100.00, '2023-01-15', 6),
(3, 'Gerente', 1500.00, '2021-11-20', 7);

-- Volcado de datos para la tabla `pedido`
INSERT INTO `pedido` (`id`, `cliente_id`, `fecha`, `precio_sin_iva`) VALUES
(1, 1, '2024-09-10', 19.99),
(2, 2, '2024-09-11', 39.99),
(3, 3, '2024-09-12', 59.99),
(4, 4, '2024-09-13', 99.99);

-- Volcado de datos para la tabla `pedido_producto`
INSERT INTO `pedido_producto` (`pedido_id`, `producto_id`, `cantidad`) VALUES

(1, 1, 2),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1);


-- Volcado de datos para la tabla `persona`
INSERT INTO `persona` (`id`, `nombre`, `apellido`, `direccion`, `telefono`, `email`, `password_hash`, `rol_id`) VALUES
(1, 'Juan', 'Pérez', 'Calle 123', '3001234567', 'juan.perez@gmail.com', 'hashed_password_1', 2),
(2, 'María', 'Gómez', 'Avenida 456', '3109876543', 'maria.gomez@gmail.com', 'hashed_password_2', 3),
(3, 'Carlos', 'Rodríguez', 'Carrera 789', '3206549870', 'carlos.rodriguez@gmail.com', 'hashed_password_3', 1),
(4, 'Ana', 'Martínez', 'Diagonal 101', '3112223333', 'ana.martinez@gmail.com', 'hashed_password_4', 4),
(5, 'Pedro', 'Suarez', 'Calle 999', '3118889999', 'pedro.suarez@gmail.com', 'hashed_password_5', 2),
(6, 'Laura', 'Ramirez', 'Calle 555', '3008882222', 'laura.ramirez@gmail.com', 'hashed_password_6', 2),
(7, 'Andrés', 'Díaz', 'Calle 777', '3006661111', 'andres.diaz@gmail.com', 'hashed_password_7', 1),
(8, 'Diana', 'Lopez', 'Carrera 100', '3101115555', 'diana.lopez@gmail.com', 'hashed_password_8', 1),
(9, 'Jorge', 'Castro', 'Carrera 33', '3109876541', 'jorge.castro@gmail.com', 'hashed_password_9', 3),
(10, 'Marta', 'García', 'Avenida 12', '3206543210', 'marta.garcia@gmail.com', 'hashed_password_10', 4),
(11, 'Pedro', 'López', 'Calle 101', '3009998888', 'pedro.lopez@gmail.com', 'hashed_password_9', 1),
(12, 'Luis', 'Mendoza', 'Avenida 202', '3113334444', 'luis.mendoza@gmail.com', 'hashed_password_10', 1),
(13, 'Sara', 'Ríos', 'Carrera 303', '3205556666', 'sara.rios@gmail.com', 'hashed_password_11', 1);

-- Volcado de datos para la tabla `persona_rol`
INSERT INTO `persona_rol` (`persona_id`, `rol_id`) VALUES

(2, 3),
(3, 1),
(8, 1),
(9, 3),
(10, 4);


-- Volcado de datos para la tabla `producto`
INSERT INTO `producto` (`id`, `nombre`, `precio`, `talla`, `color`, `stock`, `proveedor_id`) VALUES
(1, 'Camiseta Básica', 19.99, 'M', 'Rojo', 50, 1),
(2, 'Pantalón Jeans', 39.99, 'L', 'Azul', 30, 2),
(3, 'Chaqueta Casual', 59.99, 'S', 'Negro', 20, 1),
(4, 'Zapatos Deportivos', 89.99, '42', 'Blanco', 15, 2),
(5, 'Gorra Estilo', 14.99, 'Única', 'Negro', 40, 1),
(6, 'Vestido de Noche', 99.99, 'M', 'Rojo', 10, 3),
(7, 'Polo Deportivo', 29.99, 'L', 'Azul', 25, 2),
(8, 'Bolso de Cuero', 149.99, 'Única', 'Marrón', 8, 3),
(9, 'Pantalones Cortos', 24.99, 'M', 'Beige', 35, 1),
(10, 'Sudadera Casual', 49.99, 'L', 'Gris', 28, 3),
(11, 'Camiseta Estilo', 19.99, 'M', 'Azul', 100, 1),
(12, 'Pantalón Cargo', 49.99, 'L', 'Verde', 50, 2),
(13, 'Chaqueta Invierno', 79.99, 'L', 'Negro', 30, 3),
(14, 'Zapatos Casual', 89.99, '42', 'Marrón', 40, 1);

-- Volcado de datos para la tabla `proveedor`
INSERT INTO `proveedor` (`id`, `nombre`) VALUES
(1, 'Proveedor Uno'),
(2, 'Proveedor Dos'),
(3, 'Proveedor Tres');

-- Volcado de datos para la tabla `rol`
INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'Empleado'),
(2, 'Cliente'),
(3, 'Administrador'),
(4, 'Proveedor'),
(5, 'Empleado'),
(6, 'Cliente'),
(7, 'Administrador'),
(8, 'Proveedor');

                        