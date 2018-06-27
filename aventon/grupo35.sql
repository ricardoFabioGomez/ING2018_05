-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2018 a las 06:55:48
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
-- Estructura de tabla para la tabla `aventon_calificar`
--

CREATE TABLE `aventon_calificar` (
  `id` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `id_calificador` int(11) NOT NULL,
  `comentario` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aventon_calificar`
--

INSERT INTO `aventon_calificar` (`id`, `calificacion`, `id_usuario`, `id_viaje`, `id_calificador`, `comentario`) VALUES
(2, 5, 17, 58, 6, 'Muy copado, un buen viaje!'),
(3, 0, 5, 62, 0, ''),
(4, 0, 5, 63, 0, ''),
(5, 0, 5, 65, 0, ''),
(6, 0, 5, 78, 0, ''),
(7, 0, 5, 75, 0, ''),
(8, 0, 5, 73, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aventon_comentario`
--

CREATE TABLE `aventon_comentario` (
  `id_comentario` int(11) NOT NULL,
  `string` text,
  `id_usuario` int(11) NOT NULL,
  `id_respuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 0, 0, 0, 0, 0, 0, '0000-00-00', 5, 68),
(0, 1, 0, 0, 0, 0, 0, '0000-00-00', 6, 69),
(0, 0, 1, 0, 0, 0, 0, '0000-00-00', 7, 70),
(0, 0, 0, 0, 0, 0, 1, '0000-00-00', 8, 71),
(0, 1, 0, 0, 0, 0, 0, '0000-00-00', 9, 73),
(1, 0, 0, 0, 0, 0, 0, '0000-00-00', 10, 74),
(0, 0, 1, 0, 0, 0, 0, '0000-00-00', 11, 75),
(1, 1, 1, 1, 1, 0, 0, '0000-00-00', 12, 76),
(0, 0, 0, 1, 0, 0, 0, '0000-00-00', 13, 77),
(0, 0, 0, 1, 0, 0, 0, '0000-00-00', 14, 78),
(0, 1, 0, 0, 0, 0, 0, '0000-00-00', 15, 79);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aventon_respuesta`
--

CREATE TABLE `aventon_respuesta` (
  `id_respuesta` int(11) NOT NULL,
  `str` text,
  `id_comentario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(5, 'hugo1', 'hugo1', 'hugo', 'hugp', '1990-07-11', '9878897', '898998', 'uiouioiu', '23', 'hugo@unlp.com.ar'),
(6, 'carla1', 'carla1', 'carla', 'carla', '1991-05-11', '', '', '', '', 'carla@unlp.com.ar'),
(10, 'test03', 'test03', 'nuevo', 'nuevo', '0000-00-00', '0989080909', '878998789', 'direccion', '', 'algo@unlp.com.ar'),
(11, 'test04', 'test04', 'nuevo', 'nuevo', '0000-00-00', '0989080909', '878998789', 'direccion', '', 'algo4@unlp.com.ar'),
(12, 'test05', 'test05', 'nuevo', 'nuevo', '0000-00-00', '0989080909', '878998789', 'direccion', '', 'algo4@unlp.com.ar'),
(13, 'test06', 'nuevo', 'nuevo', 'nuevo', '0000-00-00', '0989080909', '878998789', 'direccion', '', 'algo4@unlp.com.ar'),
(14, 'test09', 'nuevo', 'nuevo', 'nuevo', '2018-05-24', '0989080909', '878998789', 'direccion', '', 'algo5@unlp.com.ar'),
(15, 'hugo10', 'hugo10', 'hugo', 'contrera', '2018-05-02', '12345678', '2216224812', 'Calle 511, 2115', '', 'ricardogomez2115@gmail.com'),
(16, 'rick07', 'rico07', 'ricardo', 'gomez', '2001-06-15', '3554645645', '2343242342', 'Calle 511, 2115', 'jlkjlkjkds', 'ricardo@unlp.com.ar'),
(17, 'rick08', 'rick08', 'ricardo Fabio', 'Gomez', '1990-06-11', '123456789', '32432432', 'Calle 511, 2115', '122', 'ricardogomez2113@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aventon_usuario_viaje`
--

CREATE TABLE `aventon_usuario_viaje` (
  `id` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `is_acepted` tinyint(1) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aventon_usuario_viaje`
--

INSERT INTO `aventon_usuario_viaje` (`id`, `id_viaje`, `id_usuario`, `is_acepted`, `fecha`) VALUES
(23, 76, 17, 0, '2018-06-25'),
(24, 76, 1, 1, '2018-06-25'),
(25, 76, 4, 2, '2018-06-27'),
(26, 74, 4, 1, '0000-00-00'),
(27, 73, 4, 0, '2018-06-26'),
(28, 76, 17, 1, '2018-06-29'),
(29, 76, 1, 1, '2018-06-29'),
(30, 68, 1, 0, '0000-00-00'),
(31, 69, 1, 1, '0000-00-00'),
(32, 73, 1, 1, '2018-07-03'),
(33, 78, 1, 0, '0000-00-00'),
(34, 78, 17, 1, '0000-00-00'),
(35, 79, 14, 0, '2018-06-26'),
(36, 79, 17, 1, '2018-06-26'),
(37, 77, 17, 2, '0000-00-00'),
(38, 79, 17, 1, '2018-07-03'),
(39, 79, 1, 0, '2018-07-10'),
(40, 79, 1, 0, '2018-07-17');

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
  `id_usuario` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aventon_vehiculo`
--

INSERT INTO `aventon_vehiculo` (`id`, `patente`, `modelo`, `marca`, `cant_pasajeros`, `id_usuario`, `is_delete`) VALUES
(47, 'GHN771', 'modelo', 'nuevo', 4, 5, 1),
(48, 'GHN771', 'modelo', 'marca', 4, 5, 0),
(49, 'GHN772', 'modelo', 'marca', 4, 5, 0),
(50, 'HUG345', 'modelo', 'marca', 1, 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aventon_viaje`
--

CREATE TABLE `aventon_viaje` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `origen` varchar(30) NOT NULL,
  `destino` varchar(30) NOT NULL,
  `tipo_viaje` text NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `costo` double NOT NULL,
  `tiempo_estimado` int(11) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aventon_viaje`
--

INSERT INTO `aventon_viaje` (`id`, `codigo`, `fecha`, `hora`, `origen`, `destino`, `tipo_viaje`, `id_vehiculo`, `id_usuario`, `costo`, `tiempo_estimado`, `fecha_alta`) VALUES
(68, 0, '2018-06-25', '17:20:00', 'FLorecio Varela', 'Moreno', '0', 48, 5, 100, 4, '2018-06-24 01:02:03'),
(69, 0, '2018-06-26', '21:20:00', 'FLorecio Varela', 'Moreno', '0', 48, 5, 100, 4, '2018-06-24 01:02:18'),
(70, 0, '2018-06-27', '09:00:00', 'FLorecio Varela', 'Moreno', '0', 48, 5, 100, 4, '2018-06-24 01:02:41'),
(74, 0, '2018-06-25', '09:00:00', 'FLorecio Varela', 'Capital Federal', '0', 48, 5, 100, 4, '2018-06-24 15:44:45'),
(76, 0, '0000-00-00', '09:00:00', 'FLorecio Varela', 'Capital Federal', '1', 49, 5, 20, 4, '2018-06-24 20:02:32'),
(77, 0, '2018-06-28', '09:00:00', 'FLorecio Varela', 'Capital Federal', '0', 48, 5, 100, 4, '2018-06-25 04:48:01'),
(79, 0, '0000-00-00', '21:20:00', 'FLorecio Varela', 'Capital Federal', '1', 50, 5, 100, 4, '2018-06-26 02:23:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aventon_calificar`
--
ALTER TABLE `aventon_calificar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aventon_comentario`
--
ALTER TABLE `aventon_comentario`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `aventon_dias_recurrente`
--
ALTER TABLE `aventon_dias_recurrente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aventon_respuesta`
--
ALTER TABLE `aventon_respuesta`
  ADD PRIMARY KEY (`id_respuesta`);

--
-- Indices de la tabla `aventon_usuario`
--
ALTER TABLE `aventon_usuario`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `aventon_usuario_viaje`
--
ALTER TABLE `aventon_usuario_viaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aventon_vehiculo`
--
ALTER TABLE `aventon_vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aventon_viaje`
--
ALTER TABLE `aventon_viaje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aventon_calificar`
--
ALTER TABLE `aventon_calificar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `aventon_comentario`
--
ALTER TABLE `aventon_comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aventon_dias_recurrente`
--
ALTER TABLE `aventon_dias_recurrente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `aventon_respuesta`
--
ALTER TABLE `aventon_respuesta`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aventon_usuario`
--
ALTER TABLE `aventon_usuario`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clave primaria de usuario', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `aventon_usuario_viaje`
--
ALTER TABLE `aventon_usuario_viaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `aventon_vehiculo`
--
ALTER TABLE `aventon_vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `aventon_viaje`
--
ALTER TABLE `aventon_viaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
