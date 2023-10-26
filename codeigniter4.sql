-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2023 a las 22:21:12
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `codeigniter4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calle`
--

CREATE TABLE `calle` (
  `id_calle` int(11) NOT NULL,
  `calle` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `codigo_postal` varchar(10) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `tipo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `email`, `contrasena`, `usuario`, `direccion`, `codigo_postal`, `telefono`, `tipo`) VALUES
(3, 'Santiago', 'Moni@gmail.com', '$2y$10$KM3r4TPHTsjP803st5VaFejNxYDttsJJ0g6DDGUkYzMPdxr69ctpK', 'Santiago', '', '0', '', 1),
(18, 'Tadeo', 'tadeo270148@gmail.com', '$2y$10$w7jZBAS66Xmu0yHCXCZlLun0GoETIZ4J6rW7W0C2TFV7t0uDrpr36', 'Tadeo', '', '0', '', 1),
(21, 'Claudia', 'claudia@gmail.com', '$2y$10$Clxo2GQxXIu64SkKpKhyOeJtcTpjPxma9cmtisAzyN1n7HAGkNyEG', 'Clauditaxs', 'San Miguel 835', '5850', '+54 3571 565913', 0),
(22, 'Daniela', 'gomzdaniela.edfisica@gmail.com', '$2y$10$IMMzO3CC9lgTu9VZ4qqO8uWxKYWIoBxeutMocLqWPk9OpVx5CrHDW', 'DaniGym', 'Gral.Roca 566', '5850', '+54 3571 312601', 0),
(23, 'Rodrigo', 'rodolfito@alumnos.itr3.edu.ar', '$2y$10$TkzLEh.5Q4ryg9sOzYNPbe9Kv1XoCTYAGbxuGb8H/hch5/mIvVm9e', 'rodolfito', 'Las Heras 346', '5850', '+54 3571 773450', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `metodo_pago` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalledecompra`
--

CREATE TABLE `detalledecompra` (
  `id_detalle` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_metodo_pago` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id_envio` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `id_ciudad` int(11) DEFAULT NULL,
  `id_calle` int(11) DEFAULT NULL,
  `numero_calle` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id_metodo_pago` int(11) NOT NULL,
  `metodo_pago` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `categoria` varchar(20) NOT NULL,
  `descuento` decimal(5,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `stock`, `imagen`, `descripcion`, `categoria`, `descuento`) VALUES
(37, 'Creatina', 40000.00, 3, 'uploads/1697502650_6f79f2bddf5a9671ed5b.png', 'fefefeeeeeeeeeeeeeeeeeee', 'merchandising', 0.00),
(38, ' 2 Mancuernas 5kg', 6300.00, 4, 'uploads/1697571613_59891424ab9b2b38dbb9.jpg', 'es para flacos', 'oferta', 10.00),
(39, 'yyyyyyyyyyyyyyyyyyyyyyyy', 23232.00, 2, 'uploads/1697574628_b5659a3d3aac20376649.png', 'hhhhhhhhhhhhhhhhhhhhhhhhh', 'oferta', 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id_profesor` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `especialidad` varchar(255) NOT NULL,
  `fecha_de_contrato` datetime NOT NULL,
  `titulos` varchar(255) NOT NULL,
  `horarios` time NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `salario` int(11) NOT NULL,
  `coste` decimal(10,2) NOT NULL,
  `dificultad` varchar(50) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `nombre`, `especialidad`, `fecha_de_contrato`, `titulos`, `horarios`, `telefono`, `mail`, `salario`, `coste`, `dificultad`, `imagen`) VALUES
(6, 'Tadeo', 'gggggggggg', '2023-10-06 00:00:00', 'licenciado en palas', '00:00:00', '+54 3571 565913', 'tadeo270148@gmail.com', 1000, 0.55, 'ez', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL,
  `provincia` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `tipo` tinyint(1) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`tipo`, `nombre`) VALUES
(0, 'Santiago'),
(1, 'Tadeo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_profesor`
--

CREATE TABLE `usuario_profesor` (
  `id_usuario_profesor` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `id_profesor` int(11) DEFAULT NULL,
  `nombre_rutina` varchar(255) DEFAULT NULL,
  `duracion` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `dificultad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calle`
--
ALTER TABLE `calle`
  ADD PRIMARY KEY (`id_calle`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `id_provincia` (`id_provincia`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id` (`id`),
  ADD KEY `metodo_pago` (`metodo_pago`);

--
-- Indices de la tabla `detalledecompra`
--
ALTER TABLE `detalledecompra`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_compra` (`id_compra`),
  ADD KEY `id` (`id`),
  ADD KEY `id_metodo_pago` (`id_metodo_pago`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id_envio`),
  ADD KEY `id` (`id`),
  ADD KEY `id_ciudad` (`id_ciudad`),
  ADD KEY `id_calle` (`id_calle`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id_metodo_pago`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`tipo`);

--
-- Indices de la tabla `usuario_profesor`
--
ALTER TABLE `usuario_profesor`
  ADD PRIMARY KEY (`id_usuario_profesor`),
  ADD KEY `id` (`id`),
  ADD KEY `id_profesor` (`id_profesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalledecompra`
--
ALTER TABLE `detalledecompra`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario_profesor`
--
ALTER TABLE `usuario_profesor`
  MODIFY `id_usuario_profesor` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_provincia`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`metodo_pago`) REFERENCES `metodo_pago` (`id_metodo_pago`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalledecompra`
--
ALTER TABLE `detalledecompra`
  ADD CONSTRAINT `detalledecompra_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalledecompra_ibfk_2` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalledecompra_ibfk_3` FOREIGN KEY (`id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalledecompra_ibfk_4` FOREIGN KEY (`id_metodo_pago`) REFERENCES `metodo_pago` (`id_metodo_pago`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `direccion_ibfk_2` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`),
  ADD CONSTRAINT `direccion_ibfk_3` FOREIGN KEY (`id_calle`) REFERENCES `calle` (`id_calle`);

--
-- Filtros para la tabla `usuario_profesor`
--
ALTER TABLE `usuario_profesor`
  ADD CONSTRAINT `usuario_profesor_ibfk_1` FOREIGN KEY (`id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `usuario_profesor_ibfk_2` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
