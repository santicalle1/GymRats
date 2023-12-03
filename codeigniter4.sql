-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2023 a las 21:19:50
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
(24, 'Escuela', 28),
(25, 'Escuela', 29),
(26, 'Fabrica', 30),
(27, 'Palermo', 31),
(28, 'g', 32),
(29, 'escuela', 33),
(30, 'Escuela', 34),
(31, 'ff', 35),
(32, 'jk', 36);

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
(28, 'San Miguel'),
(29, 'San Miguel'),
(30, 'Bs as'),
(31, 'Av. Corrientes'),
(32, 'g'),
(33, 'san miguel'),
(34, 'San Miguel'),
(35, 'ff'),
(36, 'lk');

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
(165, 18, 46, 2, '2023-12-02 21:46:04');

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
(27, 22, 'y', 'y'),
(28, 23, 'Rio Tercero', '5850'),
(29, 24, 'Rio Tercero', '5850'),
(30, 25, 'Rio Tercero', '5850'),
(31, 26, 'CABA', '1000'),
(32, 27, 'g', 'g'),
(33, 28, 'rio tercero', '5850'),
(34, 29, 'Rio Tercero', '5850'),
(35, 30, 'fff', 'f'),
(36, 31, 'ytd', '265');

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
  `codigo_postal` varchar(10) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `id_ciudad` int(11) DEFAULT NULL,
  `id_calle` int(11) DEFAULT NULL,
  `numero_calle` int(11) DEFAULT NULL,
  `id_barrio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `email`, `contrasena`, `usuario`, `codigo_postal`, `telefono`, `tipo`, `id_ciudad`, `id_calle`, `numero_calle`, `id_barrio`) VALUES
(3, 'Santiago', 'Moni@gmail.com', '$2y$10$KM3r4TPHTsjP803st5VaFejNxYDttsJJ0g6DDGUkYzMPdxr69ctpK', 'Santiago', '0', '', 1, 0, 0, 0, 0),
(18, 'Tadeo', 'tadeo270148@gmail.com', '$2y$10$w7jZBAS66Xmu0yHCXCZlLun0GoETIZ4J6rW7W0C2TFV7t0uDrpr36', 'Tadeo', '0', '', 1, 0, 0, 0, 0),
(21, 'Claudia', 'claudia@gmail.com', '$2y$10$Clxo2GQxXIu64SkKpKhyOeJtcTpjPxma9cmtisAzyN1n7HAGkNyEG', 'Clauditaxs', '5850', '+54 3571 565913', 0, 0, 0, 0, 0),
(22, 'Daniela', 'gomzdaniela.edfisica@gmail.com', '$2y$10$IMMzO3CC9lgTu9VZ4qqO8uWxKYWIoBxeutMocLqWPk9OpVx5CrHDW', 'DaniGym', '5850', '+54 3571 312601', 0, 0, 0, 0, 0),
(23, 'Rodrigo', 'rodolfito@alumnos.itr3.edu.ar', '$2y$10$TkzLEh.5Q4ryg9sOzYNPbe9Kv1XoCTYAGbxuGb8H/hch5/mIvVm9e', 'rodolfito', '5850', '+54 3571 773450', 0, 0, 0, 0, 0),
(29, 'profesor', 'profe@gmail.com', '$2y$10$rOn8PR2go3PqKZwEKrWVH.ezbDu9v/wR2zdfISLWG.bHZqpjc4902', 'profesor', '5846', '56651', 2, NULL, NULL, NULL, NULL),
(30, 'profesor1', 'profe1@gmail.com', '$2y$10$khVEYu9748rXl0nqGSCCpeO21vYxpkqI9mVv7uOfw.cZKWdRY3aF.', 'profesor1', 'gthge56', '62065102', 2, NULL, NULL, NULL, NULL),
(31, 'profesor', 'profe1@gmail.com', '$2y$10$lY6sJ0p6grvQrfT5jBFf0u6DoGvMBri/Slb1MTNJ.9IKvlWKa0fha', 'profesor1', '56454', '556651', 2, NULL, NULL, NULL, NULL),
(32, 'profesor', 'profe1@gmail.com', '$2y$10$4lfPHzQRFEdv.FVQGYJ5POX3QyWRKq0g8s6NkP.xukJYYIZWW5.ny', 'profesor1', '4545', '5165', 2, NULL, NULL, NULL, NULL),
(33, 'profesor', 'profe2@gmail.com', '$2y$10$kguDpFVdu2e6ttLlpfQxAeGggwcMlQ/th.uVWPUR3yPgOYMnh8ze2', 'profe2', '549685', '656+1', 2, NULL, NULL, NULL, NULL),
(34, 'santi', 'santi@gmail.com', '$2y$10$d59/mGR1snMCHTnb.USieOoLdYNmpJhwLP6cFlHlQSzTVR2FAC5nm', 'santi', '5656', '161', 2, NULL, NULL, NULL, NULL),
(35, 'profesor', '911@gmail.com', '$2y$10$/j5Xp5xQYfV7JMkdhsEGTOl7.srqUmN.69IFDtGROTvgVMhk6YHU6', 'santip', '5165', '5156', 2, NULL, NULL, NULL, NULL),
(36, 'profesor', 'sanetiaguitocallegari@gmail.com', '$2y$10$XSdyRAMLBAltcDNGRNLPouLbnwbSZydXxdcpwgPmM3xxIj0TUePvO', 'profesor', 'asc', '5626', 2, NULL, NULL, NULL, NULL),
(37, 'profesor', 'santi@gmail.com', '$2y$10$h84EAzAY9D/VtZsPKx32gOYY9ckcQDJYyqScgO.29TLeHEN8hOqWe', 'santi', '5619', '15511515', 2, NULL, NULL, NULL, NULL),
(38, 'hvgvhg', 'santig@gmail.com', '$2y$10$Hq1R39SCtWXjx/pwrENQCeg7.wwl8mznzG3hPeftor1UL4UQwGENa', 'sasa', '1065', '51651615', 2, NULL, NULL, NULL, NULL),
(39, 'profesor', 'profe@gmail.com', '$2y$10$.LRnRVmFjvH.BLf1bYV8BezDNb.5qyOdvyLVwx2.ZMNjULLI.gSBS', 'jojo', '256', '56456465', 2, NULL, NULL, NULL, NULL);

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

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `fecha`, `total`, `id_metodo_pago`, `id`, `estado`, `id_envio`, `id_calle`, `id_ciudad`, `numero_calle`) VALUES
(10, '2023-11-23 01:11:19', 98000.00, 1, 18, 1, 53, 28, 28, '269'),
(11, '2023-11-23 01:11:31', 98000.00, 1, 18, 1, 54, 29, 29, '269'),
(12, '2023-11-25 23:43:20', 130675.00, 1, 18, 1, 55, 30, 30, '567'),
(13, '2023-11-26 01:23:26', 49000.00, 1, 18, 1, 56, 31, 31, '269'),
(14, '2023-11-28 21:50:03', 10837.50, 1, 18, 1, 57, 33, 33, '456'),
(15, '2023-11-30 00:21:41', 30000.00, 1, 21, 1, 58, 34, 34, '835'),
(16, '2023-11-30 00:24:54', 15000.00, 1, 21, 1, 59, 35, 35, 'ff'),
(17, '2023-12-03 20:15:30', 32512.50, 1, 23, 1, 60, 36, 36, '2652');

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
(37, 'Moni@gmail.com', 'f', 'f'),
(38, 'sanetiaguitocallegari@gmail.com', 'lkn', 'jl');

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

--
-- Volcado de datos para la tabla `detalledecompra`
--

INSERT INTO `detalledecompra` (`id_detalle`, `id_producto`, `id_compra`, `id`, `cantidad`, `precio_unitario`) VALUES
(9, 1, 11, 18, 2, 1),
(10, 46, 12, 18, 1, 70000),
(11, 47, 12, 18, 2, 12750),
(12, 49, 12, 18, 1, 60000),
(13, 46, 13, 18, 1, 70000),
(14, 47, 14, 18, 1, 12750),
(15, 52, 15, 21, 2, 15000),
(16, 52, 16, 21, 1, 15000),
(17, 47, 17, 23, 3, 12750);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_rutina`
--

CREATE TABLE `detalle_rutina` (
  `id_detalle_rutina` int(11) NOT NULL,
  `id_rutina` int(11) NOT NULL,
  `ejercicios` varchar(255) NOT NULL,
  `repeticiones` varchar(255) NOT NULL,
  `series` varchar(255) NOT NULL,
  `peso` varchar(255) NOT NULL
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

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id_envio`, `id`, `id_ciudad`, `id_calle`, `numero_calle`, `codigo_postal`, `id_barrio`, `descripcion_casa`) VALUES
(53, 18, 28, 28, '269', '5850', 24, 'entre savio y mosconi'),
(54, 18, 29, 29, '269', '5850', 25, 'entre savio y mosconi'),
(55, 18, 30, 30, '567', '5850', 26, 'rejas y color naranja'),
(56, 18, 31, 31, '269', '1000', 27, 'Roja'),
(57, 18, 33, 33, '456', '5850', 29, 'roja'),
(58, 21, 34, 34, '835', '5850', 30, 'entre savio y mosconi'),
(59, 21, 35, 35, 'ff', 'f', 31, 'f'),
(60, 23, 36, 36, '2652', '265', 32, 'nonii');

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
(46, 'Bicicleta Estatica', 70000.00, 2, 'uploads/1700665431_2c8ca5eb792987611881.jpg', 'es rapida', 'oferta', 30.00),
(47, 'Straps Negros', 12750.00, 0, 'uploads/1700665496_4702b6f42b00c66ac9ec.webp', 'son comodos', 'oferta', 15.00),
(48, 'Creatina Sabor Vainilla', 11000.00, 6, 'uploads/1700665596_eeeb78f96d11191061ce.webp', '1,5 kg para genio en esta disiplina', 'suplementos', 0.00),
(49, 'Polea ', 60000.00, 4, 'uploads/1700665673_107a658b6e93fd5fd818.png', 'es espacioso, recomendable tener espacio', 'gimnasio', 0.00),
(50, '2 Mancuernas 10 kg', 10000.00, 6, 'uploads/1700665762_b55339b39bd6f571cb51.jpg', 'recomendable', 'gimnasio', 0.00),
(51, 'Remera Hombre Crema', 10000.00, 10, 'uploads/1700665827_cc26390758513f4b9d88.webp', 'es comoda', 'merchandising', 0.00),
(52, 'Remera Mujer Marron', 15000.00, 9, 'uploads/1700665887_9a42805c2ae1c609e6bd.webp', 'chica pero amoldable', 'merchandising', 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id_profesor` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `especialidad` varchar(255) NOT NULL,
  `fecha_de_contrato` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `titulos` varchar(255) NOT NULL,
  `horarios` time NOT NULL,
  `coste` int(11) NOT NULL,
  `dificultad` varchar(40) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `nombre`, `especialidad`, `fecha_de_contrato`, `titulos`, `horarios`, `coste`, `dificultad`, `imagen`, `id`) VALUES
(1, 'h', 'h', '2023-11-23 03:00:00', 'h', '00:00:00', 0, '', 'uploads/1701300878_eb241b5248ad99213fff.webp', NULL),
(2, 'Tadeo', 'Yoga', '2023-11-16 03:00:00', 'ggg', '00:00:00', 100002, 'ezzzzzzzz', 'uploads/1701301071_47bc2e0abe41cc0b32f3.jpg', NULL),
(4, 'Kaka', 'comer', '2023-11-29 03:00:00', 'vvvvvvv', '00:00:00', 565, 'hard', '', NULL),
(5, 'profesor', 'sxcs', '1998-02-12 03:00:00', 'ds', '00:00:56', 10, 'Intermedio', 'uploads/1701418390_6cb080ec65c8dcd49a52.jpg', NULL),
(6, 'profesor', '5156', '0000-00-00 00:00:00', '515', '00:16:51', 465, 'Intermedio', 'uploads/1701418518_3062d7c1a166f16c9aa7.jpg', NULL),
(7, 'profesor', 's', '0000-00-00 00:00:00', 'd', '00:00:00', 10000, 'Intermedio', 'uploads/1701418687_3ae8a083ede9da74dce8.jpg', NULL),
(8, 'profesor', 's', '0000-00-00 00:00:00', 'ss', '00:00:45', 100, 'Intermedio', 'uploads/1701419014_fc290d6c03bf689b3d23.jpg', NULL),
(9, 'profesor', '1', '0000-00-00 00:00:00', '5615', '01:56:15', 10, 'Dificil', 'uploads/1701458256_5e6fe5b1a029ad5de3ad.jpg', NULL),
(10, 'santi', '10', '0000-00-00 00:00:00', '5615', '00:00:00', 56, 'Intermedio', 'uploads/1701458776_af33b6d66855cc0f4bc8.jpg', 34),
(11, 'profesor', '00', '2000-02-20 03:00:00', '56', '00:00:00', 1, 'Facil', 'uploads/1701459068_68de9611d0cca29633f2.jpg', 35),
(12, 'profesor', 'd', '2022-12-30 03:00:00', 'd', '00:00:00', 0, 'Intermedio', 'uploads/1701550466_a9adf932c3728a04923b.jpg', 36),
(13, 'profesor', 'ciclismo', '0000-00-00 00:00:00', '56165', '00:01:51', 10, 'Intermedio', 'uploads/1701632619_11c64f7c7d970738827d.jpg', 37),
(14, 'hvgvhg', 'gt', '2023-02-20 03:00:00', 'kjhj', '00:00:00', 2, 'dificil', '', 38),
(15, 'profesor', '215', '0000-00-00 00:00:00', '56156', '00:56:15', 2, 'Intermedio', 'uploads/1701634663_73f5ca78ef7b0c6d8757.jpg', 39);

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
(22, 'y'),
(23, 'Cordoba'),
(24, 'Cordoba'),
(25, 'Cordoba'),
(26, 'Buenos Aires'),
(27, 'g'),
(28, 'cordoba'),
(29, 'Cordoba'),
(30, 'ff'),
(31, 'lkj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas`
--

CREATE TABLE `rutinas` (
  `id_rutina` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `nombre_rutina` varchar(255) DEFAULT NULL,
  `duracion` varchar(255) DEFAULT NULL,
  `dificultad` varchar(255) DEFAULT NULL,
  `descargas` int(11) DEFAULT 0,
  `id` int(11) NOT NULL,
  `id_profesor` varchar(30) DEFAULT NULL,
  `tipo_rutina` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rutinas`
--

INSERT INTO `rutinas` (`id_rutina`, `descripcion`, `nombre_rutina`, `duracion`, `dificultad`, `descargas`, `id`, `id_profesor`, `tipo_rutina`) VALUES
(12, 'ffffffffffffffffffff', 'Fafa', 'Corta', 'Intermedio', 0, 18, NULL, 0),
(13, 'Corta', 'gg', 'Corta', 'hard', 1, 3, NULL, 0),
(14, '', NULL, NULL, NULL, 0, 18, '9', 0),
(16, '', NULL, NULL, NULL, 0, 23, '4', 1),
(26, '', NULL, NULL, NULL, 0, 23, '9', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_rutina`
--

CREATE TABLE `tipo_rutina` (
  `id_tipo_rutina` int(11) NOT NULL,
  `tipo_rutina` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_rutina`
--

INSERT INTO `tipo_rutina` (`id_tipo_rutina`, `tipo_rutina`) VALUES
(1, 0),
(2, 1);

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
-- Indices de la tabla `detalle_rutina`
--
ALTER TABLE `detalle_rutina`
  ADD PRIMARY KEY (`id_detalle_rutina`);

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
  ADD PRIMARY KEY (`id_profesor`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indices de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  ADD PRIMARY KEY (`id_rutina`);

--
-- Indices de la tabla `tipo_rutina`
--
ALTER TABLE `tipo_rutina`
  ADD PRIMARY KEY (`id_tipo_rutina`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barrio`
--
ALTER TABLE `barrio`
  MODIFY `id_barrio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `calle`
--
ALTER TABLE `calle`
  MODIFY `id_calle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `detalledecompra`
--
ALTER TABLE `detalledecompra`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id_envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id_metodo_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  MODIFY `id_rutina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`id`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
