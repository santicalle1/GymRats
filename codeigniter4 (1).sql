-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2023 a las 00:47:44
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

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
-- Estructura de tabla para la tabla `barrio`
--

CREATE TABLE `barrio` (
  `id_barrio` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `id_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `barrio`
--

INSERT INTO `barrio` (`id_barrio`, `nombre`, `id_ciudad`) VALUES
(1, 'Palermo', 1),
(2, 'Recoleta', 1),
(3, 'Nueva Córdoba', 3),
(4, 'General Paz', 3),
(5, 'Fisherton', 5),
(6, 'Centro', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calle`
--

CREATE TABLE `calle` (
  `id_calle` int(11) NOT NULL,
  `calle` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calle`
--

INSERT INTO `calle` (`id_calle`, `calle`) VALUES
(1, 'Av. Rivadavia'),
(2, 'Av. Corrientes'),
(3, 'Av. Maipú'),
(4, 'Av. San Martín'),
(5, 'Calle 9 de Julio'),
(6, 'Calle Belgrano'),
(7, 'Av. España'),
(8, 'Av. Italia'),
(9, 'Calle Las Heras'),
(10, 'Av. Aconquija');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `fecha_agregado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `id`, `id_producto`, `cantidad`, `fecha_agregado`) VALUES
(118, 18, 45, 2, '2023-11-20 02:04:43');

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

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `id_provincia`, `ciudad`, `codigo_postal`) VALUES
(1, 1, 'CABA', '1000'),
(2, 1, 'La Plata', '1900'),
(3, 2, 'Córdoba Capital', '5000'),
(4, 2, 'Villa María', '5900'),
(5, 3, 'Rosario', '2000'),
(6, 3, 'Santa Fe', '3000'),
(7, 4, 'Mendoza Capital', '5500'),
(8, 4, 'San Rafael', '5600'),
(9, 5, 'San Miguel de Tucumán', '4000'),
(10, 5, 'Yerba Buena', '4107');

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
(23, 'Rodrigo', 'rodolfito@alumnos.itr3.edu.ar', '$2y$10$TkzLEh.5Q4ryg9sOzYNPbe9Kv1XoCTYAGbxuGb8H/hch5/mIvVm9e', 'rodolfito', 'Las Heras 346', '5850', '+54 3571 773450', 0),
(25, 'Nahuel', 'nahuel@gmail.com', '$2y$10$9uGDA3kis483yY.Ho/5K0usTtVXYu57xaXBelHSW3cJUpExs92NZe', 'Nahuel', 'Suipacha 504', '5850', '3571 111111', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_metodo_pago` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `id_envio` int(11) NOT NULL,
  `id_calle` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `numero_calle` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `mensaje` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `email`, `motivo`, `mensaje`) VALUES
(31, 'tadeoboglione@alumnos.itr3.edu.ar', 'ass', 'fef'),
(32, 'Moni@gmail.com', 'ass', 'dd'),
(33, 'Rodrigo@gmail.com', 'v', 'v'),
(34, 'tadeoboglione@alumnos.itr3.edu.ar', 'fefe', 'f'),
(35, 'Moni1@gmail.com', 'ass', '3d'),
(36, 'Moni@gmail.com', 'f', 'eee'),
(37, 'Moni@gmail.com', 'f', 'f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalledecompra`
--

CREATE TABLE `detalledecompra` (
  `id_detalle` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id_envio` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `id_calle` int(11) NOT NULL,
  `numero_calle` varchar(10) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL,
  `id_barrio` int(11) NOT NULL,
  `descripcion_casa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id_metodo_pago` int(11) NOT NULL,
  `metodo_pago` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`id_metodo_pago`, `metodo_pago`) VALUES
(1, 'Paypal');

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
(44, 'Tadeo', 33333.00, 33, 'uploads/1699392170_25c3e55336a05bc1a67e.png', 'gferg', 'gimnasio', 0.00),
(45, 'creatina', 12000.00, 3, 'uploads/1699996106_3c4e8fbb72a2507acf48.avif', 'jjj', 'oferta', 40.00);

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
(10, 'Tadeo', 'Profe', '2023-11-23 00:00:00', 'h', '00:00:00', '+54 3571 678321', 'tadeo@gmail.com', 0, 0.03, 'ezz', 'uploads/1699307128_13070999a33a6db6d63c.jpg'),
(11, 'Franco', 'Profe', '2023-11-30 00:00:00', 'f', '00:00:00', '+54 3571 773450', 'tadeo@gmail.com', 0, 0.06, 'ezz', 'uploads/1699307180_6216d2c2c469a8d0f062.avif'),
(12, 'Franco', 'Profe', '2023-11-16 00:00:00', 'g', '00:00:00', '+54 3571 773450', 'tadeo@gmail.com', 0, 33.03, 'ff', 'uploads/1699385261_0207838ef8af7905b6ac.avif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_comprado`
--

CREATE TABLE `profesor_comprado` (
  `id_profesor_comprado` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `coste` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL,
  `provincia` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `provincia`) VALUES
(1, 'Buenos Aires'),
(2, 'Córdoba'),
(3, 'Santa Fe'),
(4, 'Mendoza'),
(5, 'Tucumán');

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
-- Indices de la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD PRIMARY KEY (`id_barrio`);

--
-- Indices de la tabla `calle`
--
ALTER TABLE `calle`
  ADD PRIMARY KEY (`id_calle`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `detalledecompra`
--
ALTER TABLE `detalledecompra`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `fk_detalledecompra_producto` (`id_producto`),
  ADD KEY `fk_detalledecompra_compra` (`id_compra`),
  ADD KEY `fk_detalledecompra_cliente` (`id`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id_envio`);

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
-- Indices de la tabla `profesor_comprado`
--
ALTER TABLE `profesor_comprado`
  ADD PRIMARY KEY (`id_profesor_comprado`);

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
  ADD PRIMARY KEY (`id_usuario_profesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barrio`
--
ALTER TABLE `barrio`
  MODIFY `id_barrio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `calle`
--
ALTER TABLE `calle`
  MODIFY `id_calle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `detalledecompra`
--
ALTER TABLE `detalledecompra`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id_envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id_metodo_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `profesor_comprado`
--
ALTER TABLE `profesor_comprado`
  MODIFY `id_profesor_comprado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario_profesor`
--
ALTER TABLE `usuario_profesor`
  MODIFY `id_usuario_profesor` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `barrio`
--
-- ALTER TABLE `barrio`
--   ADD CONSTRAINT `barrio_ibfk_1` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`),
--   ADD CONSTRAINT `fk_barrio_ciudad` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`);

-- --
-- -- Filtros para la tabla `carrito`
-- --
-- ALTER TABLE `carrito`
--   ADD CONSTRAINT `fk_carrito_cliente` FOREIGN KEY (`id`) REFERENCES `clientes` (`id`),
--   ADD CONSTRAINT `fk_carrito_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

-- --
-- -- Filtros para la tabla `ciudad`
-- --
-- ALTER TABLE `ciudad`
--   ADD CONSTRAINT `fk_ciudad_provincia` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_provincia`);

-- --
-- -- Filtros para la tabla `detalledecompra`
-- --
-- ALTER TABLE `detalledecompra`
--   ADD CONSTRAINT `fk_detalledecompra_cliente` FOREIGN KEY (`id`) REFERENCES `clientes` (`id`),
--   ADD CONSTRAINT `fk_detalledecompra_compra` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`),
--   ADD CONSTRAINT `fk_detalledecompra_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
--   ADD CONSTRAINT `fk_profesor_comprado_clientes` FOREIGN KEY (`id`) REFERENCES `clientes` (`id`),
--   ADD CONSTRAINT `fk_profesor_comprado_compra` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`),
--   ADD CONSTRAINT `fk_profesor_comprado_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

-- --
-- -- Filtros para la tabla `profesor_comprado`
-- --
-- ALTER TABLE `profesor_comprado`
--   ADD CONSTRAINT `fk_profesor_comprado_cliente` FOREIGN KEY (`id`) REFERENCES `clientes` (`id`),
--   ADD CONSTRAINT `fk_profesor_comprado_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`);

-- --
-- -- Filtros para la tabla `usuario_profesor`
-- --
-- ALTER TABLE `usuario_profesor`
--   ADD CONSTRAINT `fk_usuario_profesor_cliente` FOREIGN KEY (`id`) REFERENCES `clientes` (`id`),
--   ADD CONSTRAINT `fk_usuario_profesor_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`);
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
