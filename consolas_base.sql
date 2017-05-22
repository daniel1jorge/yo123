-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2017 a las 23:41:19
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consolas_base`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcat` int(11) NOT NULL COMMENT 'Identificador de categoría.',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre de categoría.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de categorías.';

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcat`, `nombre`) VALUES
(1, 'Juegos Fisicos'),
(2, 'Juegos Digitales'),
(3, 'Repuestos'),
(4, 'Herramientas'),
(5, 'Consolas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `iddetalle` int(11) NOT NULL COMMENT 'Identificador del detalle.',
  `idventa` int(11) NOT NULL COMMENT 'Identificador de venta.',
  `idprod` int(11) NOT NULL COMMENT 'Identificador de producto.',
  `cant` decimal(10,0) NOT NULL COMMENT 'Cantidad vendida.',
  `precio` decimal(10,2) NOT NULL COMMENT 'Precio de venta.',
  `subtotal` decimal(10,2) DEFAULT NULL COMMENT 'Subtotal de la venta.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de detalle de ventas.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `idpago` int(11) NOT NULL COMMENT 'Identificador del pago.',
  `idventa` int(11) NOT NULL COMMENT 'Identificador de venta.',
  `idtipo` int(11) NOT NULL COMMENT 'Identificador del tipo de pago.',
  `detalle` varchar(100) NOT NULL COMMENT 'Descripción del pago.',
  `importe` decimal(10,2) NOT NULL COMMENT 'Importe del pago.',
  `obs` varchar(1000) NOT NULL COMMENT 'Campo para comentarios adicionales.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de pagos.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idprod` int(11) NOT NULL COMMENT 'Identificador de producto.',
  `idcat` int(11) NOT NULL COMMENT 'Identificador de categoría.',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre de producto.',
  `imagen` varchar(35) NOT NULL,
  `precio` decimal(10,2) NOT NULL COMMENT 'Precio del producto.',
  `stock` int(11) NOT NULL COMMENT 'Stock del producto.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de productos.';

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idprod`, `idcat`, `nombre`, `imagen`, `precio`, `stock`) VALUES
(1, 1, 'GTA', '', '900.00', 456),
(2, 5, 'PS3', '', '150.00', 4567),
(3, 1, 'pes 2017', '', '1300.00', 690);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `idtipo` int(11) NOT NULL COMMENT 'Identificador del tipo de pago.',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre del tipo de pago.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de tipos de pago.';

--
-- Volcado de datos para la tabla `tipo_pago`
--

INSERT INTO `tipo_pago` (`idtipo`, `nombre`) VALUES
(1, 'EFECTIVO'),
(2, 'TARJETA CREDITO'),
(3, 'TARJETA DE DEBITO'),
(4, 'CHEQUE'),
(5, 'NOTA DE CREDITO'),
(6, 'BONO EFECTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL COMMENT 'id .',
  `email` varchar(30) NOT NULL COMMENT 'Cuenta de usuario.',
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `clave` varchar(40) NOT NULL COMMENT 'Clave del usuario.',
  `estado` int(11) NOT NULL COMMENT 'Estado del usuario: 1 - Activo 0 - Inactivo',
  `categoria` int(1) NOT NULL COMMENT 'categoria del  usuario: 1 - administrador 0 - usuario'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de usuarios.';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre`, `apellido`, `clave`, `estado`, `categoria`) VALUES
(1, 'yo@123.com', 'jorge', 'silva', 'eW8=', 1, 2),
(2, 'usuario@123.com', 'nombre', 'apellido', 'eW8=', 1, 1),
(3, 'yo2@123.com', 'nombre', 'apellido', 'MTI=', 1, 1),
(4, 'yo3@123.com', 'yo', 'dos', 'MTIz', 1, 1),
(5, 'yo4@123.com', 'yo', 'dos', 'MTIz', 1, 1),
(6, 'yo5@123.com', 'aa', 'aa', 'MTIz', 1, 1),
(7, 'yo6@123.com', 'aa', 'aa', 'MTIz', 1, 1),
(8, 'yo7@123.com', 'juan', 'perez', 'MTIz', 1, 1),
(9, 'yo8@123.com', 'erica', 'ramirez', 'MTIz', 1, 1),
(10, 'yo9@123.com', 'ramon', 'ramirez', 'MTIz', 1, 1),
(11, 'yo@123.com', '111', '22', 'MjI=', 1, 1),
(12, 'yo@123.com', 'nombre', 'apellido', 'MTIz', 1, 1),
(13, 'yo@123.com', '111', '222', 'MjIy', 1, 1),
(14, 'yo@123.com', '111', '111', 'MTIz', 1, 1),
(15, 'yo@123.com', '111', '111', 'MjIy', 1, 1),
(16, 'yo@123.com', '111', '111', 'MjIy', 1, 1),
(17, 'yo@123.com', '111', '111', 'MjIy', 1, 2),
(18, 'yo@123.com', '111', '111', 'MjI=', 1, 1),
(19, 'yo@123.com', '111', '22', 'MTE=', 1, 1),
(20, 'yo@123.com', '111', '111', 'MTEx', 1, 1),
(21, 'yo@123.com', '111', '22', 'MTE=', 1, 1),
(22, 'yo@123.com', '111', '111', 'MTEx', 1, 1),
(23, 'yo@123.com', '111', '111', 'MTEx', 1, 1),
(24, 'jorge1daniel@gmail.com', 'jorge daniel', 'silva', 'MTIz', 1, 1),
(25, 'jorge1daniel@hotmail.com', '123', '123', 'Z29s', 1, 1),
(26, 'jorge1daniel@1gmail.com', 'rambo', 'muere al final', 'MTIz', 1, 1),
(27, 'hola@gol.com', 'gol', 'de boca', 'MTIz', 1, 1),
(28, 'termineitor@gmail.com', '123', '123', 'MTIz', 1, 1),
(29, 'hola@g1ol.com', '111', '111', 'MTEx', 1, 1),
(30, 'correo@prueba.com', 'nombre', 'apellido', 'MTIz', 1, 1),
(31, 'correo2@prueba.com', 'nombre', 'apellido', 'MTE=', 1, 1),
(32, 'estef@gmail.com', 'este', 'fierrote', 'MTEx', 1, 1),
(33, 'dado@gmal.for', 'gosster', 'man', 'MTEx', 1, 1),
(34, 'ramona@yo.gol', 'ramona', 'loquita', 'MTEx', 1, 1),
(35, 'carlitosl@gmail.com', 'carlos', 'tocarlos', 'Z29s', 1, 1),
(36, 'romanovich@hotmail.com', 'carla', 'romanovich', 'MTIz', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL COMMENT 'Identificador de venta.',
  `cliente` varchar(100) NOT NULL COMMENT 'Nombre del cliente.',
  `fecha` date NOT NULL COMMENT 'Fecha de venta.',
  `importe` decimal(10,2) NOT NULL COMMENT 'Importe de la venta.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de ventas.';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcat`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`iddetalle`),
  ADD UNIQUE KEY `U_DETALLE` (`idventa`,`idprod`),
  ADD KEY `FK_DETALLE_PRODUCTO` (`idprod`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idpago`),
  ADD KEY `FK_PAGO_VENTA` (`idventa`),
  ADD KEY `FK_PAGO_TIPO_PAGO` (`idtipo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idprod`),
  ADD KEY `FK_PRODUCTO_CATEGORIA` (`idcat`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`idtipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `iddetalle` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del detalle.';
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idpago` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del pago.';
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idprod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de producto.', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id .', AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de venta.';
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `FK_DETALLE_PRODUCTO` FOREIGN KEY (`idprod`) REFERENCES `producto` (`idprod`),
  ADD CONSTRAINT `FK_DETALLE_VENTA` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `FK_PAGO_TIPO_PAGO` FOREIGN KEY (`idtipo`) REFERENCES `tipo_pago` (`idtipo`),
  ADD CONSTRAINT `FK_PAGO_VENTA` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_PRODUCTO_CATEGORIA` FOREIGN KEY (`idcat`) REFERENCES `categoria` (`idcat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
