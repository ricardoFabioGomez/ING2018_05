-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2018 a las 03:58:26
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupo35`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aventon_vehiculo`
--

CREATE TABLE `aventon_vehiculo` (
  `id` int(11) NOT NULL,
  `patente` varchar(10) NOT NULL,
  `modelo` varchar(10) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `cant_pasajeros` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aventon_vehiculo`
--

INSERT INTO `aventon_vehiculo` (`id`, `patente`, `modelo`, `marca`, `cant_pasajeros`, `id_usuario`) VALUES
(2, 'GHN771', 'clio', 'renault', 4, 1),
(3, 'GHN771', 'clio', 'renault', 4, 1),
(4, 'GHN772', 'clio', 'renault', 4, 1),
(5, 'GHN773', 'clio', 'renault', 4, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aventon_vehiculo`
--
ALTER TABLE `aventon_vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aventon_vehiculo`
--
ALTER TABLE `aventon_vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
