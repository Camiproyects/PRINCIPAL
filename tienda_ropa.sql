-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2024 a las 08:54:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_ropa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `es_preferencial` tinyint(1) DEFAULT 0,
  `rol_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `es_preferencial`, `rol_id`) VALUES
(1, 1, 2),
(2, 0, 2),
(3, 1, 2),
(4, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `fecha_contratacion` date NOT NULL,
  `persona_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `puesto`, `salario`, `fecha_contratacion`, `persona_id`) VALUES
(1, 'Vendedor', 1200.00, '2022-06-01', 5),
(2, 'Cajero', 1100.00, '2023-01-15', 6),
(3, 'Gerente', 1500.00, '2021-11-20', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `precio_sin_iva` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `cliente_id`, `fecha`, `precio_sin_iva`) VALUES
(1, 1, '2024-09-10', 19.99),
(2, 2, '2024-09-11', 39.99),
(3, 3, '2024-09-12', 59.99),
(4, 4, '2024-09-13', 99.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido_producto`
--

INSERT INTO `pedido_producto` (`pedido_id`, `producto_id`, `cantidad`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

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

--
-- Volcado de datos para la tabla `persona`
--

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

CREATE TABLE `persona_rol` (
  `persona_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona_rol`
--

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

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `talla` varchar(10) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `proveedor_id` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `talla`, `color`, `stock`, `proveedor_id`, `imagen`, `id_categoria`) VALUES
(1, 'Jean Hombre', 39.99, 'M', 'Azul', 50, 1, 'jean.jpg', 1),
(2, 'Jean Mujer', 34.99, 'S', 'Negro', 40, 2, 'jean2.jpg', 2),
(3, 'Jean Unisex', 36.50, 'L', 'Gris', 60, 1, 'jean3.jpg', 8),
(4, 'Camisa Mujer 1', 29.99, 'M', 'Rojo', 25, 2, 'camisa women.jpg', 4),
(5, 'Camisa Mujer 2', 25.99, 'L', 'Blanco', 30, 2, 'camisa women2.jpg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `telefono`, `direccion`) VALUES
(1, 'Proveedor A', '3009998888', 'Calle 101'),
(2, 'Proveedor B', '3112223333', 'Avenida 202'),
(3, 'Proveedor C', '3109876541', 'Carrera 303');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
