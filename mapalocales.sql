-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2022 a las 18:34:09
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

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
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `coordenadas` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `poblacion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id`, `nombre`, `coordenadas`, `poblacion`, `tipo`) VALUES
(1, 'Bar Paco', '{ lat: 40.294103, lng: -3.749820 }', 'Getafe', 'Bar'),
(2, 'Asador Numberto', '{ lat: 40.233431, lng: -3.766508 }', 'Parla', 'Restaurante'),
(3, 'Agua pa´ la seca', '{ lat: 40.241917, lng: -3.704241 }', 'Pinto', 'Discoteca'),
(4, 'Caña y tapas', '{ lat: 40.295870, lng: -3.743477 }', 'Getafe', 'Bar'),
(5, 'Salseo y pringue', '{ lat: 40.225689, lng: -3.762761 }', 'Parla', 'Discoteca'),
(6, 'Agua', '{lat: 40.244369, lng: -3.758111}', 'Parla', 'Bar'),
(8, 'Casa Dani', '{lat: 40.245466, lng: -3.770351}', 'Parla', 'Bar'),
(9, 'Cafes', '{lat: 40.243175, lng: -3.775034}', 'Parla', 'Bar'),
(10, 'Cirilo', '{lat: 40.244018, lng: -3.770807}', 'Parla', 'Bar');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
