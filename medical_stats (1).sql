-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2024 a las 01:33:39
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
-- Base de datos: `medical_stats`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `numero_quirofano` int(1) NOT NULL,
  `Localidad` text NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `procedimiento` text NOT NULL,
  `cirujano` varchar(50) NOT NULL,
  `1_Ayudante` varchar(50) NOT NULL,
  `2_Ayudante` varchar(50) NOT NULL,
  `anestesista` varchar(50) NOT NULL,
  `instrumentador` varchar(50) NOT NULL,
  `tipo_anestesia` varchar(100) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `dni` int(8) DEFAULT NULL,
  `urgencia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `fecha`, `numero_quirofano`, `Localidad`, `nombre`, `procedimiento`, `cirujano`, `1_Ayudante`, `2_Ayudante`, `anestesista`, `instrumentador`, `tipo_anestesia`, `edad`, `dni`, `urgencia`) VALUES
(1, '2024-08-25 23:38:34', 1, '', 'Carlos Ramirez', 'colonoscopia', 'Milagros Alegrette', 'Horacio Cabrera', 'Omar Vizquel', 'Geral Jimenez', 'Francisco Butto', 'General', NULL, NULL, 0),
(2, '2024-08-26 23:03:07', 3, '', 'Camela Benito', 'Apex', 'Araujo', 'Ramirez', '-', 'Sabatini', 'Perez', 'General', NULL, NULL, 0),
(3, '2024-08-27 00:04:19', 4, '', 'Soteldo Jefferson', 'Artroscopia', 'Borja', 'Rodriguez', 'Dominguez', 'Borja', 'Valencia', 'Raquidea', NULL, NULL, 0),
(4, '2024-08-20 23:07:07', 2, '', 'Rodriguez James', 'CEM Tibia Izq', 'Araujo', 'Rodriguez', 'Dominguez', 'Borja', 'Valencia', 'Raquidea', NULL, NULL, 0),
(5, '2024-08-08 23:11:53', 2, '', 'Armani Franco', 'Osteodesis Muñeca der.', 'Martinez', 'Musso', '-', 'Brey', 'Fariñez', 'Bloqueo', NULL, NULL, 0),
(6, '2024-08-26 23:17:11', 3, '', 'Tagliafico Nicolas', 'Colecistectomia x Videolaparoscopia', 'Araujo', 'Ramirez', '-', 'Borja', 'Fariñez', 'General', NULL, NULL, 0),
(7, '2024-09-18 22:14:22', 9, '', 'Camela Benita', 'general', 'Borja', 'Musso', 'max', 'Borja', 'Fariñez', 'general', NULL, NULL, 0),
(8, '2024-08-28 23:57:25', 9, 'villa', 'Robeto Blanco', 'Colecistectomia por videolaparoscopia', 'Ariel', 'Yonel', 'Caro', 'Yei', 'Carlos', 'General', 51, 451762784, 0),
(9, '2024-09-16 22:23:15', 5, '', 'araujo', 'Colecistectomia por videolaparoscopia', 'Ramon', 'ronaldo', 'Caro', 'Yei', 'Carlos', 'General', NULL, NULL, 0),
(10, '2024-10-07 23:33:29', 2, 'ecuador', 'martin rodriguez', 'postioplastia', 'valverde', 'jimenez', 'araujo', 'bentacourt', 'bielsa', 'raquidea', 23, 2147483647, 0),
(11, '2024-10-07 23:16:22', 7, 'SN', 'Juan ', 'postioplastia', 'valverde', 'jimenez', 'araujoDA', 'CAR', '0', 'General', 23, 12345678, 0),
(13, NULL, 3, 'sn', 'Pato Elsa', 'Apex', 'Ramon', 'jimenez', 'araujo', 'Yei', 'bielsa', 'General', 23, 43234567, 0),
(14, NULL, 1, 'SN', 'Baigorria Federico', 'Apex', 'Sweisteiger', 'jimenez', 'Muller', 'Neuer', 'Lahm', 'General', 51, 20345678, 0),
(15, '2030-01-20 03:00:00', 2, '20', '20', '20', '20', '20', '20', '20', 'on', '20', 2, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `nombre` varchar(30) NOT NULL,
  `vencimiento` date DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`nombre`, `vencimiento`, `cantidad`, `id`) VALUES
('Ibuprofeno', '2025-01-10', 28, 1),
('paracetamol', '2030-10-10', 17, 3),
('Migrant', '2032-08-20', 10, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `dni` int(11) DEFAULT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `contrasena` varchar(10) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `usuario`, `contrasena`, `nombre`) VALUES
(1, 12345678, 'admin', 'admin', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
