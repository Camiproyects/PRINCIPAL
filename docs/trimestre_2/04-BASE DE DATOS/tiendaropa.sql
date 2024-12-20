-- --------------------------------------------------------
--
-- Base de datos: `tiendaropa`
--
-- --------------------------------------------------------
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `cliente`
--
-- --------------------------------------------------------

create database tienda_ropa;

USE tienda_ropa;

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `es_preferencial` tinyint(1) DEFAULT 0,
  `rol_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `cliente`
--
-- --------------------------------------------------------

INSERT INTO `cliente` (`id`, `es_preferencial`, `rol_id`) VALUES
(1, 1, 2),
(2, 0, 2),
(3, 1, 2),
(4, 0, 2);


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `empleado`
--
-- --------------------------------------------------------

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `fecha_contratacion` date NOT NULL,
  `persona_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `empleado`
--
-- --------------------------------------------------------

INSERT INTO `empleado` (`id`, `puesto`, `salario`, `fecha_contratacion`, `persona_id`) VALUES
(1, 'Vendedor', 1200.00, '2022-06-01', 5),
(2, 'Cajero', 1100.00, '2023-01-15', 6),
(3, 'Gerente', 1500.00, '2021-11-20', 7);



-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `pedido`
--
-- --------------------------------------------------------

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `precio_sin_iva` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `pedido`
--
-- --------------------------------------------------------

INSERT INTO `pedido` (`id`, `cliente_id`, `fecha`, `precio_sin_iva`) VALUES
(1, 1, '2024-09-10', 19.99),
(2, 2, '2024-09-11', 39.99),
(3, 3, '2024-09-12', 59.99),
(4, 4, '2024-09-13', 99.99);


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `pedido_producto`
--
-- --------------------------------------------------------

CREATE TABLE `pedido_producto` (
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `pedido_producto`
--
-- --------------------------------------------------------

INSERT INTO `pedido_producto` (`pedido_id`, `producto_id`, `cantidad`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1);


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `persona`
--
-- --------------------------------------------------------

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `rol_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `persona`
--
-- --------------------------------------------------------

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


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `persona_rol`
--
-- --------------------------------------------------------

CREATE TABLE `persona_rol` (
  `persona_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `persona_rol`
--
-- --------------------------------------------------------

INSERT INTO `persona_rol` (`persona_id`, `rol_id`) VALUES
(2, 3),
(3, 1),
(8, 1),
(9, 3),
(10, 4);



-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `producto`
--
-- --------------------------------------------------------

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  nombre varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `talla` varchar(10) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `proveedor_id` int(11) DEFAULT NULL,
  foto varchar (225) DEFAULT NULL,
  id_categoria int (11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




select * from producto;



DESCRIBE producto;
ALTER TABLE producto ADD COLUMN imagen VARCHAR(255);

ALTER TABLE producto drop COLUMN foto;

select * from producto;


CREATE TABLE Categoria
(
id_categoria varchar (100) NOT NULL,
nombre varchar (100) NOT NULL
);

ALTER TABLE Categoria
  ADD PRIMARY KEY (`id_categoria`);

INSERT INTO Categoria (id_categoria, nombre)VALUES
(1, 'hombre-camisa'),
(2, 'hombre-pantalon'),
(3, 'hombre-accesorio'),
(4, 'mujer-camisa'),
(5, 'mujer-pantalon'),
(6, 'mujer-accesorio'),
(7, 'niños');

insert into Categoria (id_categoria, nombre)VALUES
(8, 'Unisex');
insert into Categoria (id_categoria, nombre)VALUES
(9,'mujer -vestido');
-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `producto`
--
-- --------------------------------------------------------

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `talla`, `color`, `stock`, `proveedor_id`, foto, id_categoria ) VALUES
(1, 'Camiseta Básica ', 19.99, 'M', 'Rojo', 50, 1, '' ,  1),
(2, 'Pantalón Jeans ' , 39.99, 'L', 'Azul', 30, 2, '', 1),
(3, 'Chaqueta Casual ', 59.99, 'S', 'Negro', 20, 1, '', 1 ),
(4, 'Zapatos Deportivos ', 89.99, '42', 'Blanco', 15, 2, '', 8 ),
(5, 'Gorra Estilo ', 14.99, 'Única', 'Negro', 40, 3,'', 3),
(6, 'Vestido de Noche', 99.99, 'M', 'Rojo', 10, 3,'',9),
(7, 'Polo Deportivo', 29.99, 'L', 'Azul', 25,2,'', 1),
(8, 'Bolso de Cuero', 149.99, 'Única', 'Marrón', 8, 3, '', 6),
(9, 'Pantalones Cortos', 24.99, 'M', 'Beige', 35, 1 , '', 2),
(10, 'Sudadera Casual', 49.99, 'L', 'Gris', 28,3,'', 2),
(11, 'Camiseta Estilo', 19.99, 'M', 'Azul', 100, 1,'', 1),
(12, 'Pantalón Cargo', 49.99, 'L', 'Verde', 50, 2, '', 1),
(13, 'Chaqueta Invierno', 79.99, 'L', 'Negro', 30, 3,'', 8),
(14, 'Zapatos Casual', 89.99, '42', 'Marrón', 40, 1, '', 3);

select * from producto;


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `proveedor`
--
-- --------------------------------------------------------

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `proveedor`
--
-- --------------------------------------------------------

INSERT INTO `proveedor` (`id`, `nombre`) VALUES
(1, 'Proveedor Uno'),
(2, 'Proveedor Dos'),
(3, 'Proveedor Tres');


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `rol`
--
-- --------------------------------------------------------

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `rol`
--
-- --------------------------------------------------------

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'Empleado'),
(2, 'Cliente'),
(3, 'Administrador'),
(4, 'Proveedor'),
(5, 'Empleado'),
(6, 'Cliente'),
(7, 'Administrador'),
(8, 'Proveedor');

-- --------------------------------------------------------
--
-- Índices para tablas volcadas
--
-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- Indices de la tabla `cliente`
--
-- --------------------------------------------------------
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);


-- --------------------------------------------------------
--
-- Indices de la tabla `empleado`
--
-- --------------------------------------------------------
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`);
select * from empleado;




-- --------------------------------------------------------
--
-- Indices de la tabla `pedido`
--
-- --------------------------------------------------------
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

-- --------------------------------------------------------
--
-- Indices de la tabla `pedido_producto`
--
-- --------------------------------------------------------
ALTER TABLE `pedido_producto`
  ADD PRIMARY KEY (`pedido_id`,`producto_id`),
  ADD KEY `producto_id` (`producto_id`);

-- --------------------------------------------------------
--
-- Indices de la tabla `persona`
--
-- --------------------------------------------------------
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `rol_id` (`rol_id`);

-- --------------------------------------------------------
--
-- Indices de la tabla `persona_rol`
--
-- --------------------------------------------------------
ALTER TABLE `persona_rol`
  ADD PRIMARY KEY (`persona_id`,`rol_id`),
  ADD KEY `rol_id` (`rol_id`);

-- --------------------------------------------------------
--
-- Indices de la tabla `producto`
--
-- --------------------------------------------------------
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `proveedor_id` (`proveedor_id`);

-- --------------------------------------------------------
--
-- Indices de la tabla `proveedor`
--
-- --------------------------------------------------------
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

-- --------------------------------------------------------
--
-- Indices de la tabla `rol`
--
-- --------------------------------------------------------
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

-- --------------------------------------------------------
--
-- AUTO_INCREMENT de las tablas volcadas
--
-- --------------------------------------------------------

---- --------------------------------------------------------
-- AUTO_INCREMENT de la tabla `pedido`
---- --------------------------------------------------------
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

---- --------------------------------------------------------
-- AUTO_INCREMENT de la tabla `persona`
---- --------------------------------------------------------
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

---- --------------------------------------------------------
-- AUTO_INCREMENT de la tabla `producto`
---- --------------------------------------------------------
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

---- --------------------------------------------------------
-- AUTO_INCREMENT de la tabla `proveedor`
---- --------------------------------------------------------
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

---- --------------------------------------------------------
-- AUTO_INCREMENT de la tabla `rol`
---- --------------------------------------------------------
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

---- --------------------------------------------------------
-- Restricciones para tablas volcadas
---- --------------------------------------------------------

---- --------------------------------------------------------
-- Filtros para la tabla `cliente`
---- --------------------------------------------------------
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`);

---- --------------------------------------------------------
-- Filtros para la tabla `empleado`
---- --------------------------------------------------------
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`);

---- --------------------------------------------------------
-- Filtros para la tabla `pedido`
---- --------------------------------------------------------
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);

---- --------------------------------------------------------
-- Filtros para la tabla `pedido_producto`
---- --------------------------------------------------------
ALTER TABLE `pedido_producto`
  ADD CONSTRAINT `pedido_producto_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `pedido_producto_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`);

---- --------------------------------------------------------
-- Filtros para la tabla `persona`
---- --------------------------------------------------------
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`);

---- --------------------------------------------------------
-- Filtros para la tabla `persona_rol`
---- --------------------------------------------------------
ALTER TABLE `persona_rol`
  ADD CONSTRAINT `persona_rol_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `persona_rol_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`);

---- --------------------------------------------------------
-- Filtros para la tabla `producto`
---- --------------------------------------------------------
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`);
COMMIT;

select * from persona;

