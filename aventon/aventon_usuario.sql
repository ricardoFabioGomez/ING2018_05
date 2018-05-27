-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2018 a las 19:34:41
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
-- Estructura de tabla para la tabla `aventon_usuario`
--

CREATE TABLE `aventon_usuario` (
  `user_id` int(11) NOT NULL COMMENT 'clave primaria de usuario',
  `user` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `fecha_naci` date NOT NULL,
  `dni` varchar(10) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `depto` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aventon_usuario`
--

INSERT INTO `aventon_usuario` (`user_id`, `user`, `password`, `nombre`, `apellido`, `fecha_naci`, `dni`, `telefono`, `direccion`, `depto`, `email`) VALUES
(1, 'grupo35', 'grupo35', 'Ricardo', 'Gomez', '1990-05-01', '23456234', '1123346546', 'calle falsa 1234', '', ''),
(3, 'UserTest1', 'passtest1', 'nombre1', 'ape1', '1990-06-11', '890789678', '1109876789', 'calle falsa 1234', '122', 'usertest@unlp.com.ar'),
(4, 'test4', 'test4', 'test4', 'test4', '1990-04-11', '123456789', '112342345', 'calle falsa 1234', '122', 'test4@unlp.com.ar'),
(5, 'hugo1', 'hugo1', 'hugo', 'hugp', '1990-07-11', '9878897', '898998', 'uiouioiu', '23', 'hugo@unlp.com.ar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aventon_usuario`
--
ALTER TABLE `aventon_usuario`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aventon_usuario`
--
ALTER TABLE `aventon_usuario`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clave primaria de usuario', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
