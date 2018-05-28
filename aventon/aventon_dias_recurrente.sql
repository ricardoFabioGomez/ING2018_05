-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2018 a las 06:45:32
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
-- Estructura de tabla para la tabla `aventon_dias_recurrente`
--

CREATE TABLE `aventon_dias_recurrente` (
  `lunes` int(11) NOT NULL,
  `martes` int(11) NOT NULL,
  `miercoles` int(11) NOT NULL,
  `jueves` int(11) NOT NULL,
  `viernes` int(11) NOT NULL,
  `sabado` int(11) NOT NULL,
  `domingo` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `id` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aventon_dias_recurrente`
--

INSERT INTO `aventon_dias_recurrente` (`lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`, `fecha_inicio`, `id`, `id_viaje`) VALUES
(1, 1, 0, 1, 0, 1, 1, '0000-00-00', 1, 20);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aventon_dias_recurrente`
--
ALTER TABLE `aventon_dias_recurrente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aventon_dias_recurrente`
--
ALTER TABLE `aventon_dias_recurrente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
