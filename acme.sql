-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2021 a las 19:33:11
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `acme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ciudad`
--

CREATE TABLE `tbl_ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_ciudad`
--

INSERT INTO `tbl_ciudad` (`id_ciudad`, `ciudad`) VALUES
(1, 'Cartagena'),
(2, 'Bogotá'),
(5, 'Medellin'),
(6, 'Barranquilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_class_personal`
--

CREATE TABLE `tbl_class_personal` (
  `id_casspersonal` int(11) NOT NULL,
  `classpersonal` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_class_personal`
--

INSERT INTO `tbl_class_personal` (`id_casspersonal`, `classpersonal`) VALUES
(1, 'Conductor'),
(2, 'Auxiliar Ruta'),
(3, 'Propietario'),
(4, 'Jefe Bodega'),
(5, 'Coordinador Proyecto'),
(6, 'Jefe Personal'),
(7, 'Jefe Patio'),
(8, 'Analista Inventario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_color`
--

CREATE TABLE `tbl_color` (
  `id_color` int(11) NOT NULL,
  `color` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_color`
--

INSERT INTO `tbl_color` (`id_color`, `color`) VALUES
(1, 'Blanco'),
(2, 'Negro'),
(3, 'Rojo'),
(4, 'Azul');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marca`
--

CREATE TABLE `tbl_marca` (
  `id_marca` int(11) NOT NULL,
  `marca` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_marca`
--

INSERT INTO `tbl_marca` (`id_marca`, `marca`) VALUES
(1, 'Chevrolet'),
(2, 'Volkswagen'),
(3, 'DODGE'),
(4, 'MITSUBISHI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_personal`
--

CREATE TABLE `tbl_personal` (
  `id_conductor` int(11) NOT NULL,
  `numcedula` int(11) NOT NULL,
  `nomcond1` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nomcond2` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellcond1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellcond2` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dircond` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telcond` int(10) DEFAULT NULL,
  `id_sub_ciudad` int(11) NOT NULL,
  `id_sub_clasificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_personal`
--

INSERT INTO `tbl_personal` (`id_conductor`, `numcedula`, `nomcond1`, `nomcond2`, `apellcond1`, `apellcond2`, `dircond`, `telcond`, `id_sub_ciudad`, `id_sub_clasificacion`) VALUES
(1, 731234, 'Oscar', '', 'Bocanegra', 'Omeara', 'Mz 24 L 14 Apto 2 ', NULL, 1, 1),
(6, 2, 'dry', 'Oscar', 'Omeara', 'bbb', 'Urb Ciudadela 11 de Noviembre Mz 24 L14', 17, 6, 3),
(9, 23456, 'raul', '', 'perez', 'quesada', 'Mz 24 L 14 Apto 2 ', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipocarga`
--

CREATE TABLE `tbl_tipocarga` (
  `id_carga` tinyint(4) NOT NULL,
  `tipocarga` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_tipocarga`
--

INSERT INTO `tbl_tipocarga` (`id_carga`, `tipocarga`) VALUES
(1, 'Seca'),
(2, 'Refrigerada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipovehiculo`
--

CREATE TABLE `tbl_tipovehiculo` (
  `id_tipo` tinyint(4) NOT NULL,
  `tipovehiculo` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_tipovehiculo`
--

INSERT INTO `tbl_tipovehiculo` (`id_tipo`, `tipovehiculo`) VALUES
(1, 'Particular'),
(2, 'Publico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_vehiculo`
--

CREATE TABLE `tbl_vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `placa` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `id_sub_color` int(11) NOT NULL,
  `id_sub_marca` int(11) NOT NULL,
  `id_sub_tipovehiculo` tinyint(4) NOT NULL,
  `peso` decimal(3,1) NOT NULL,
  `id_sub_carga` tinyint(4) NOT NULL,
  `id_sub_conductor` int(11) NOT NULL,
  `id_sub_propietario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_vehiculo`
--

INSERT INTO `tbl_vehiculo` (`id_vehiculo`, `placa`, `id_sub_color`, `id_sub_marca`, `id_sub_tipovehiculo`, `peso`, `id_sub_carga`, `id_sub_conductor`, `id_sub_propietario`) VALUES
(2, 'CSX360', 1, 1, 1, '10.5', 1, 1, 1),
(3, 'JLK550', 4, 3, 2, '5.0', 2, 6, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_ciudad`
--
ALTER TABLE `tbl_ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `tbl_class_personal`
--
ALTER TABLE `tbl_class_personal`
  ADD PRIMARY KEY (`id_casspersonal`);

--
-- Indices de la tabla `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `tbl_marca`
--
ALTER TABLE `tbl_marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `tbl_personal`
--
ALTER TABLE `tbl_personal`
  ADD PRIMARY KEY (`id_conductor`),
  ADD UNIQUE KEY `numcedula` (`numcedula`),
  ADD KEY `id_sub_ciudad` (`id_sub_ciudad`),
  ADD KEY `id_sub_clasificacion` (`id_sub_clasificacion`);

--
-- Indices de la tabla `tbl_tipocarga`
--
ALTER TABLE `tbl_tipocarga`
  ADD PRIMARY KEY (`id_carga`);

--
-- Indices de la tabla `tbl_tipovehiculo`
--
ALTER TABLE `tbl_tipovehiculo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `tbl_vehiculo`
--
ALTER TABLE `tbl_vehiculo`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD UNIQUE KEY `placa` (`placa`),
  ADD KEY `fkidcolor` (`id_sub_color`) COMMENT 'Muchos Tbl_colors',
  ADD KEY `fkidmarca` (`id_sub_marca`) COMMENT 'mucho de tabla marca',
  ADD KEY `id_sub_conductor` (`id_sub_conductor`),
  ADD KEY `id_sub_propietario` (`id_sub_propietario`),
  ADD KEY `tipovehiculo` (`id_sub_tipovehiculo`),
  ADD KEY `id_sub_carga` (`id_sub_carga`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_ciudad`
--
ALTER TABLE `tbl_ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_class_personal`
--
ALTER TABLE `tbl_class_personal`
  MODIFY `id_casspersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_marca`
--
ALTER TABLE `tbl_marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_personal`
--
ALTER TABLE `tbl_personal`
  MODIFY `id_conductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_tipocarga`
--
ALTER TABLE `tbl_tipocarga`
  MODIFY `id_carga` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_tipovehiculo`
--
ALTER TABLE `tbl_tipovehiculo`
  MODIFY `id_tipo` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_vehiculo`
--
ALTER TABLE `tbl_vehiculo`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_personal`
--
ALTER TABLE `tbl_personal`
  ADD CONSTRAINT `fk_ciudad` FOREIGN KEY (`id_sub_ciudad`) REFERENCES `tbl_ciudad` (`id_ciudad`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_clasificacion` FOREIGN KEY (`id_sub_clasificacion`) REFERENCES `tbl_class_personal` (`id_casspersonal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_vehiculo`
--
ALTER TABLE `tbl_vehiculo`
  ADD CONSTRAINT `fk_color` FOREIGN KEY (`id_sub_color`) REFERENCES `tbl_color` (`id_color`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_conductor` FOREIGN KEY (`id_sub_conductor`) REFERENCES `tbl_personal` (`id_conductor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_marca` FOREIGN KEY (`id_sub_marca`) REFERENCES `tbl_marca` (`id_marca`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_propietario` FOREIGN KEY (`id_sub_propietario`) REFERENCES `tbl_personal` (`id_conductor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipocarga` FOREIGN KEY (`id_sub_carga`) REFERENCES `tbl_tipocarga` (`id_carga`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipovehiculo` FOREIGN KEY (`id_sub_tipovehiculo`) REFERENCES `tbl_tipovehiculo` (`id_tipo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
