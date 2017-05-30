-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         10.1.21-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para consolas_base
CREATE DATABASE IF NOT EXISTS `consolas_base` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `consolas_base`;

-- Volcando estructura para tabla consolas_base.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `categoria_id` int(11) NOT NULL COMMENT 'Identificador de categoría.',
  `categoria` varchar(50) NOT NULL COMMENT 'Nombre de categoría.',
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de categorías.';

-- Volcando datos para la tabla consolas_base.categorias: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`categoria_id`, `categoria`) VALUES
	(1, 'Juegos Fisicos'),
	(2, 'Juegos Digitales'),
	(3, 'Repuestos'),
	(4, 'Herramientas'),
	(5, 'Consolas');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla consolas_base.consultas
CREATE TABLE IF NOT EXISTS `consultas` (
  `consulta_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `descripcion` text CHARACTER SET utf8 NOT NULL,
  `prioridad` tinyint(1) NOT NULL,
  `visto` int(1) NOT NULL,
  PRIMARY KEY (`consulta_id`),
  KEY `FK_consultas_usuarios` (`usuario_id`),
  CONSTRAINT `FK_consultas_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla consolas_base.consultas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;

-- Volcando estructura para tabla consolas_base.detalles
CREATE TABLE IF NOT EXISTS `detalles` (
  `detalle_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del detalle.',
  `venta_id` int(11) NOT NULL COMMENT 'Identificador de venta.',
  `prod_id` int(11) NOT NULL COMMENT 'Identificador de producto.',
  `cant` decimal(10,0) NOT NULL COMMENT 'Cantidad vendida.',
  `precio` decimal(10,2) NOT NULL COMMENT 'Precio de venta.',
  `subtotal` decimal(10,2) DEFAULT NULL COMMENT 'Subtotal de la venta.',
  PRIMARY KEY (`detalle_id`),
  UNIQUE KEY `U_DETALLE` (`venta_id`,`prod_id`),
  KEY `FK_DETALLE_PRODUCTO` (`prod_id`),
  CONSTRAINT `FK_DETALLE_PRODUCTO` FOREIGN KEY (`prod_id`) REFERENCES `productos` (`producto_id`),
  CONSTRAINT `FK_DETALLE_VENTA` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`venta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de detalle de ventas.';

-- Volcando datos para la tabla consolas_base.detalles: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalles` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalles` ENABLE KEYS */;

-- Volcando estructura para tabla consolas_base.pagos
CREATE TABLE IF NOT EXISTS `pagos` (
  `pago_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del pago.',
  `idventa` int(11) NOT NULL COMMENT 'Identificador de venta.',
  `idtipo` int(11) NOT NULL COMMENT 'Identificador del tipo de pago.',
  `detalle` varchar(100) NOT NULL COMMENT 'Descripción del pago.',
  `importe` decimal(10,2) NOT NULL COMMENT 'Importe del pago.',
  `obs` varchar(1000) NOT NULL COMMENT 'Campo para comentarios adicionales.',
  PRIMARY KEY (`pago_id`),
  KEY `FK_PAGO_VENTA` (`idventa`),
  KEY `FK_PAGO_TIPO_PAGO` (`idtipo`),
  CONSTRAINT `FK_PAGO_TIPO_PAGO` FOREIGN KEY (`idtipo`) REFERENCES `tipo_pagos` (`tipo_id`),
  CONSTRAINT `FK_PAGO_VENTA` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`venta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de pagos.';

-- Volcando datos para la tabla consolas_base.pagos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;

-- Volcando estructura para tabla consolas_base.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `producto_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de producto.',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre de producto.',
  `categoria_id` int(11) NOT NULL COMMENT 'Identificador de categoría.',
  `imagen` varchar(35) NOT NULL,
  `precio` decimal(10,2) NOT NULL COMMENT 'Precio del producto.',
  `stock` int(11) NOT NULL COMMENT 'Stock del producto.',
  `activo` int(11) DEFAULT '1',
  PRIMARY KEY (`producto_id`),
  KEY `FK_PRODUCTO_CATEGORIA` (`categoria_id`),
  CONSTRAINT `FK_PRODUCTO_CATEGORIA` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Tabla de productos.';

-- Volcando datos para la tabla consolas_base.productos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`producto_id`, `nombre`, `categoria_id`, `imagen`, `precio`, `stock`, `activo`) VALUES
	(1, 'GTA', 1, 'img', 900.00, 456, NULL),
	(2, 'PS3', 5, 'img.jpg', 150.00, 567, NULL),
	(3, 'pes 2017', 1, 'imagen', 1300.00, 690, NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla consolas_base.tipo_pagos
CREATE TABLE IF NOT EXISTS `tipo_pagos` (
  `tipo_id` int(11) NOT NULL COMMENT 'Identificador del tipo de pago.',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre del tipo de pago.',
  PRIMARY KEY (`tipo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de tipos de pago.';

-- Volcando datos para la tabla consolas_base.tipo_pagos: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_pagos` DISABLE KEYS */;
INSERT INTO `tipo_pagos` (`tipo_id`, `nombre`) VALUES
	(1, 'EFECTIVO'),
	(2, 'TARJETA CREDITO'),
	(3, 'TARJETA DE DEBITO'),
	(4, 'CHEQUE'),
	(5, 'NOTA DE CREDITO'),
	(6, 'BONO EFECTIVO');
/*!40000 ALTER TABLE `tipo_pagos` ENABLE KEYS */;

-- Volcando estructura para tabla consolas_base.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id .',
  `email` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT 'Cuenta de usuario.',
  `nombre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8 NOT NULL,
  `clave` varchar(40) CHARACTER SET utf8 NOT NULL COMMENT 'Clave del usuario.',
  `estado` int(11) NOT NULL COMMENT 'Estado del usuario: 1 - Activo 0 - Inactivo',
  `categoria` int(1) NOT NULL COMMENT 'categoria del  usuario: 1 - administrador 0 - usuario',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla de usuarios.';

-- Volcando datos para la tabla consolas_base.usuarios: ~54 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `email`, `nombre`, `apellido`, `clave`, `estado`, `categoria`) VALUES
	(1, 'yo@123.com', 'jorge', 'silva', 'eW8=', 1, 2),
	(2, 'usuario@123.com', 'nombre', 'apellido', 'eW8=', 1, 1),
	(3, 'yo2@123.com', 'nombre', 'apellido', 'MTI=', 1, 1),
	(4, 'yo3@123.com', 'yo', 'dos', 'MTIz', 1, 1),
	(5, 'yo4@123.com', 'claudia', 'gimenez', 'MTIz', 1, 2),
	(6, 'yo5@123.com', 'aa', 'aa', 'MTIz', 1, 1),
	(7, 'yo6@123.com', 'aa', 'aa', 'MTIz', 1, 1),
	(8, 'yo7@123.com', 'juan', 'perez', 'MTIz', 1, 1),
	(9, 'yo8@123.com', 'erica', 'ramirez', 'MTIz', 1, 1),
	(10, 'yo9@123.com', 'ramon', 'ramirez', 'MTIz', 1, 1),
	(11, 'yo@123.com', '111', '22', 'MjI=', 1, 1),
	(12, 'yo333@123.com', 'nombre', 'apellido', 'MTIz', 1, 1),
	(13, 'yo@123.com', '111', '222', 'MjIy', 1, 1),
	(14, 'yo@123.com', '111', '111', 'MTIz', 1, 1),
	(15, 'yo@123.com', '111', '111', 'MjIy', 1, 1),
	(16, 'yo@123.com', '111', '111', 'MjIy', 1, 1),
	(17, 'yowewe@123.com', '333', '333', 'MTE=', 1, 1),
	(18, 'yo@123.com', 'maria', 'suarez', 'MTIz', 1, 1),
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
	(36, 'romanovich@hotmail.com', 'carla', 'romanovich', 'MTIz', 1, 1),
	(37, 'prueba@123.com', 'yaqui', 'chan', 'cHJ1ZWJh', 1, 1),
	(38, 'terminator@gol.com', 'joaquin', 'almeida', 'MTIz', 1, 1),
	(39, 'nuevo@yop.com', 'nuevo nombre', 'nuevo apellido', 'MTIz', 1, 1),
	(40, 'nuevo@yop2.com', 'estefania', 'mungol', 'MTE=', 1, 1),
	(41, 'compras@123.com', 'compras', 'compras', 'Y29tcHJhcw==', 0, 0),
	(42, 'holaq@123.com', 'hola', 'hola', 'MTIz', 0, 0),
	(43, 'daniel1jorge@hotmail.com', '111', '111', 'MTE=', 0, 0),
	(44, 'privado@gol.com', 'David', 'martinez la red', 'MTIz', 1, 1),
	(45, '123a@pru.com', 'alexander', 'monaco', 'MTE=', 1, 1),
	(46, 'ramiro1@prueba.com', 'ramiro', 'locura', 'MTEx', 1, 2),
	(47, 'ssdsdlksd@lsd.dda', 'ramon', 'don', 'MTEx', 1, 2),
	(48, 'estomago@bmail.com', 'homero', 'simpson', 'MTE=', 1, 1),
	(49, 'usuario@1233.com', 'lisa', 'simpson', 'MTEx', 1, 1),
	(50, 'nuevo@nuevo.com', 'ramiro', 'estelar', 'MTE=', 1, 2),
	(51, 'daniel1jorge@hotmail2.com', 'jorge daniel', 'silva', 'eW8=', 2, 2),
	(52, 'yo@1234.com', '1234', '5678', 'MTEx', 1, 2),
	(53, 'fabian@123.com', 'fabian', 'vergara', 'OTk=', 1, 2),
	(54, 'admin@acceso.com', 'admin', 'admin', 'MTI=', 1, 2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla consolas_base.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `venta_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de venta.',
  `cliente_id` int(10) NOT NULL COMMENT 'Nombre del cliente.',
  `fecha` date NOT NULL COMMENT 'Fecha de venta.',
  `importe` decimal(10,2) NOT NULL COMMENT 'Importe de la venta.',
  PRIMARY KEY (`venta_id`),
  KEY `FK_venta_usuarios` (`cliente_id`),
  CONSTRAINT `FK_venta_usuarios` FOREIGN KEY (`cliente_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de ventas.';

-- Volcando datos para la tabla consolas_base.ventas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
