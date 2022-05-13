-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-05-2022 a las 09:20:20
-- Versión del servidor: 5.6.34
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mapalocales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE `locales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `coordenadas` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `poblacion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id`, `nombre`, `coordenadas`, `poblacion`, `tipo`) VALUES
(1, 'Bar Paco', '{ lat: 40.195813, lng: -3.804213 }', 'Torrejón de la calzada', 'Bar'),
(2, 'Asador Numberto', '{ lat: 40.233431, lng: -3.766508 }', 'Parla', 'Restaurante'),
(3, 'Agua pa´ la seca', '{ lat: 40.241917, lng: -3.704241 }', 'Pinto', 'Discoteca'),
(4, 'Caña y tapas', '{ lat: 40.188137, lng: -3.778102 }', 'Torrejón de la velasco', 'Bar'),
(5, 'Salseo y pringue', '{ lat: 40.225689, lng: -3.762761 }', 'Parla', 'Discoteca');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
