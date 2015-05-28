-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2015 a las 06:10:22
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `enginedevelop`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarSolicitud`(in cliente varchar(15), in tipo varchar(20), in descripcion text)
insert into solicitud(cliente, tipo, descripcion, fecha, hora) values ( cliente, tipo, descripcion, date, time)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor`
--

CREATE TABLE IF NOT EXISTS `asesor` (
  `cod_usuario` varchar(15) NOT NULL DEFAULT '',
  `salario` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asesor`
--

INSERT INTO `asesor` (`cod_usuario`, `salario`, `fecha`) VALUES
('1069', 1200000, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `nit` varchar(15) NOT NULL DEFAULT '',
  `nombre` varchar(50) DEFAULT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `representante` varchar(15) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`nit`, `nombre`, `telefono`, `direccion`, `representante`) VALUES
('1', 'Smart-Solutions', '3213213211', 'Cll. 12 # 12-20', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
`id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `cliente` varchar(15) DEFAULT NULL,
  `asesor` varchar(15) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `estado` varchar(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `fecha`, `hora`, `cliente`, `asesor`, `total`, `estado`) VALUES
(95, '2015-05-27', '05:11:11', '1', '1069', 10, '1'),
(96, '2015-05-28', '05:05:00', '1', NULL, 788, '1'),
(97, '2015-05-28', '05:05:00', '1', NULL, 788, '1'),
(98, '2015-05-28', '05:05:00', '1', NULL, 788, '1'),
(99, '2015-05-28', '05:05:00', '1', NULL, 100000, '1'),
(100, '2015-05-28', '05:05:00', '1', '1069', 0, '1'),
(101, '2015-05-28', '05:05:00', '1', '1069', 0, '0'),
(102, '2015-05-28', '05:05:00', '1', '1069', 0, '0'),
(103, '2015-05-28', '06:05:00', '1', '1069', 210000, '1'),
(104, '2015-05-28', '06:05:00', '1', NULL, 788, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaoferta`
--

CREATE TABLE IF NOT EXISTS `facturaoferta` (
  `id` int(11) NOT NULL DEFAULT '0',
  `oferta` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturaoferta`
--

INSERT INTO `facturaoferta` (`id`, `oferta`) VALUES
(99, 2),
(96, 3),
(97, 3),
(98, 3),
(104, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE IF NOT EXISTS `oferta` (
`id` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `descripcion` text,
  `precio` int(11) DEFAULT NULL,
  `archivo` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`id`, `nombre`, `descripcion`, `precio`, `archivo`) VALUES
(2, 'exel', 'tablas', 100000, 'imagenes/10721302_10204944182790091_63257235_n.jpg'),
(3, 'adsa', 'nhh', 788, 'imagenes/10717848_10204944237671463_74476914_n.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE IF NOT EXISTS `servicio` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(20) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `nombre`, `valor`) VALUES
(100, 'Instalacion', 10000),
(101, 'diseÃ±o', 10),
(102, 'kj', 12),
(103, 'instalacion', 10000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
`id` int(11) NOT NULL,
  `cliente` varchar(15) DEFAULT NULL,
  `tipo` varchar(20) NOT NULL,
  `descripcion` text,
  `fecha` date DEFAULT NULL,
  `hora` time NOT NULL,
  `estado` varchar(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id`, `cliente`, `tipo`, `descripcion`, `fecha`, `hora`, `estado`) VALUES
(1, '1', 'tipo', 'descripcion', '2015-05-17', '18:15:25', '1'),
(4, '1', 'software', 'asdsdaa\r\n', '2015-05-17', '18:45:23', '2'),
(5, '1', 'software', 'jkjkjkjklÃ±lÃ±iojjkjk', '2015-05-18', '18:45:47', '2'),
(6, '1', 'hardware', 'jkjk', '2015-05-27', '22:47:59', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_asesor`
--

CREATE TABLE IF NOT EXISTS `solicitud_asesor` (
  `solicitud` int(11) NOT NULL DEFAULT '0',
  `asesor` varchar(15) NOT NULL DEFAULT '',
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `respuesta` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud_asesor`
--

INSERT INTO `solicitud_asesor` (`solicitud`, `asesor`, `fecha`, `hora`, `respuesta`) VALUES
(4, '1069', '2015-12-31', '12:59:00', 'klklklklopijk'),
(5, '1069', '2015-11-30', '12:00:00', 'klklklk'),
(6, '1069', '2015-05-29', '12:00:00', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `cedula` varchar(15) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `nombre`, `apellido`, `email`, `telefono`, `rol`, `password`, `salt`) VALUES
('1', 'alex', 'hernandez', 'edixon.hernandez.c@gmail.com', '1231231231', 'empresario', 'shoAN5qc.L4Fsb5d24daa52c585fa602b2918aeab0a62', 'b5d24daa52c585fa602b2918aeab0a62'),
('1069', 'edixon', 'hernandez', 'edison9417@hotmail.com', '123', 'asesor', 'sh2mHnTaS7hW65b34cd25f04961d71fb61a55247c93c6', '5b34cd25f04961d71fb61a55247c93c6'),
('123', '123', '123', 'edis@jjk', '321', 'admin', 'shSzwBQ50jyg.781207843ad3e4ab125b9e1ff44a05d0', '781207843ad3e4ab125b9e1ff44a05d0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesor`
--
ALTER TABLE `asesor`
 ADD PRIMARY KEY (`cod_usuario`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
 ADD PRIMARY KEY (`nit`,`representante`), ADD KEY `representante` (`representante`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
 ADD PRIMARY KEY (`id`), ADD KEY `cliente` (`cliente`), ADD KEY `asesor` (`asesor`);

--
-- Indices de la tabla `facturaoferta`
--
ALTER TABLE `facturaoferta`
 ADD PRIMARY KEY (`id`,`oferta`), ADD KEY `oferta` (`oferta`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
 ADD PRIMARY KEY (`id`), ADD KEY `cliente` (`cliente`);

--
-- Indices de la tabla `solicitud_asesor`
--
ALTER TABLE `solicitud_asesor`
 ADD PRIMARY KEY (`solicitud`,`asesor`), ADD KEY `asesor` (`asesor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asesor`
--
ALTER TABLE `asesor`
ADD CONSTRAINT `asesor_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuarios` (`cedula`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`representante`) REFERENCES `usuarios` (`cedula`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `usuarios` (`cedula`),
ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`asesor`) REFERENCES `asesor` (`cod_usuario`);

--
-- Filtros para la tabla `facturaoferta`
--
ALTER TABLE `facturaoferta`
ADD CONSTRAINT `facturaoferta_ibfk_1` FOREIGN KEY (`id`) REFERENCES `factura` (`id`),
ADD CONSTRAINT `facturaoferta_ibfk_2` FOREIGN KEY (`oferta`) REFERENCES `oferta` (`id`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`id`) REFERENCES `factura` (`id`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `usuarios` (`cedula`);

--
-- Filtros para la tabla `solicitud_asesor`
--
ALTER TABLE `solicitud_asesor`
ADD CONSTRAINT `solicitud_asesor_ibfk_1` FOREIGN KEY (`solicitud`) REFERENCES `solicitud` (`id`),
ADD CONSTRAINT `solicitud_asesor_ibfk_2` FOREIGN KEY (`asesor`) REFERENCES `asesor` (`cod_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
