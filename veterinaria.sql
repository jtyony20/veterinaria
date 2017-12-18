-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-12-2017 a las 08:10:31
-- Versión del servidor: 5.7.20-0ubuntu0.17.10.1
-- Versión de PHP: 7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `appaterno` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `apmaterno` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `celular` int(10) UNSIGNED NOT NULL,
  `email` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `codigo`, `nombre`, `appaterno`, `apmaterno`, `direccion`, `celular`, `email`, `fecha_registro`) VALUES
(1, 'a001', 'yony', 'quispe', 'ramos', 'av mancocapac', 9999999, 'jtyony18@gmail.com', '2017-12-17'),
(2, 'a1142', 'omar', 'afeg', 'afafea', 'fsage', 98, 'qwery', '2017-12-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecinicio` date NOT NULL,
  `fecfin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `fecinicio`, `fecfin`) VALUES
(6, 'axel guns', '2017-12-12', '2017-12-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `title` text,
  `uid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `start`, `end`, `title`, `uid`) VALUES
(19, '2017-12-11 09:00:00', '2017-12-11 12:00:00', 'awfafawfawf', 'l6s7ikn51h06jpmaodlada44kn'),
(20, '1969-12-31 19:00:00', '1969-12-31 19:00:00', 'awfafawfawfhsrhsrh', 'l6s7ikn51h06jpmaodlada44kn'),
(21, '2017-12-15 09:00:00', '2017-12-15 12:00:00', 'srhrshsr', 'l6s7ikn51h06jpmaodlada44kn'),
(22, '2017-12-13 09:00:00', '2017-12-13 12:00:00', 'aqui', NULL),
(23, '2017-12-14 09:00:00', '2017-12-14 12:00:00', 'nose', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichaclinica`
--

CREATE TABLE `fichaclinica` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `sintomas_signos` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `peso` float NOT NULL,
  `temperatura` float NOT NULL,
  `vacunas` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `diagnostico` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `tratamiento` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `citas` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `fichaclinica`
--

INSERT INTO `fichaclinica` (`id`, `fecha`, `sintomas_signos`, `peso`, `temperatura`, `vacunas`, `diagnostico`, `tratamiento`, `citas`, `id_paciente`) VALUES
(3, '2017-12-17', 'pata rota', 12, 23, '3', 'pata roto', '3 vacunas', 'mañana', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiaclinica`
--

CREATE TABLE `historiaclinica` (
  `id_historia` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `especie` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `raza` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `edad` int(10) UNSIGNED NOT NULL,
  `sexo` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `color` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `senas` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `nombre`, `especie`, `raza`, `edad`, `sexo`, `color`, `senas`, `id_cliente`) VALUES
(1, 'tooby', 'canino', 'dropwiler', 3, 'macho', 'negro', 'pata rota', 1),
(2, 'nini', 'gatuno', 'dropwiler', 3, 'macho', 'rojo', 'patasano', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `appaterno` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `apmaterno` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `dni` varchar(8) COLLATE utf8_spanish2_ci NOT NULL,
  `celular` int(10) UNSIGNED NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `appaterno`, `apmaterno`, `dni`, `celular`, `email`, `password`) VALUES
(16, 'yony', 'quispe', 'ramos', '70744544', 987370530, 'poder@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(17, 'Micahel', 'quispe', 'ramos', '99999999', 88888881, 'quispe@poder.com', '9adcb29710e807607b683f62e555c22dc5659713');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fichaclinica`
--
ALTER TABLE `fichaclinica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ficha_paciente` (`id_paciente`);

--
-- Indices de la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  ADD PRIMARY KEY (`id_historia`),
  ADD KEY `historiaclinica_paciente_fk` (`id_paciente`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_cliente_FK` (`id_cliente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `fichaclinica`
--
ALTER TABLE `fichaclinica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  MODIFY `id_historia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fichaclinica`
--
ALTER TABLE `fichaclinica`
  ADD CONSTRAINT `fk_ficha_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`);

--
-- Filtros para la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  ADD CONSTRAINT `historiaclinica_paciente_fk` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_cliente_FK` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
