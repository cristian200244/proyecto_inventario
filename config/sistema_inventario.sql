-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.32 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para sistema_inventario
DROP DATABASE IF EXISTS `sistema_inventario`;
CREATE DATABASE IF NOT EXISTS `sistema_inventario` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sistema_inventario`;

-- Volcando estructura para tabla sistema_inventario.ciudades
DROP TABLE IF EXISTS `ciudades`;
CREATE TABLE IF NOT EXISTS `ciudades` (
  `id_ciudad` bigint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ciudad`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.ciudades: ~4 rows (aproximadamente)
DELETE FROM `ciudades`;
INSERT INTO `ciudades` (`id_ciudad`, `nombre`) VALUES
	(1, 'MITU'),
	(2, 'SAN JOSÉ DEL GUAVIARE'),
	(3, 'TARAIRA'),
	(4, 'CALAMAR');

-- Volcando estructura para tabla sistema_inventario.codigos
DROP TABLE IF EXISTS `codigos`;
CREATE TABLE IF NOT EXISTS `codigos` (
  `id_codigo` bigint NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  PRIMARY KEY (`id_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.codigos: ~0 rows (aproximadamente)
DELETE FROM `codigos`;

-- Volcando estructura para tabla sistema_inventario.estado_productos
DROP TABLE IF EXISTS `estado_productos`;
CREATE TABLE IF NOT EXISTS `estado_productos` (
  `id_estado_producto` bigint NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.estado_productos: ~0 rows (aproximadamente)
DELETE FROM `estado_productos`;
INSERT INTO `estado_productos` (`id_estado_producto`, `estado`) VALUES
	(1, 'piohdg');

-- Volcando estructura para tabla sistema_inventario.facturas
DROP TABLE IF EXISTS `facturas`;
CREATE TABLE IF NOT EXISTS `facturas` (
  `id_factura` bigint NOT NULL AUTO_INCREMENT,
  `id_persona` bigint NOT NULL,
  `id_servicio` bigint NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `precio` float NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `fk_id_factura_id_persona_idx` (`id_persona`),
  KEY `fk_factura_id_servicio_idx` (`id_servicio`),
  CONSTRAINT `fk_factura_id_servicio` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`),
  CONSTRAINT `fk_id_factura_id_persona` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.facturas: ~0 rows (aproximadamente)
DELETE FROM `facturas`;

-- Volcando estructura para tabla sistema_inventario.marcas
DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `id_marca` bigint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.marcas: ~0 rows (aproximadamente)
DELETE FROM `marcas`;

-- Volcando estructura para tabla sistema_inventario.personas
DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `id_persona` bigint NOT NULL AUTO_INCREMENT,
  `id_rol` bigint NOT NULL DEFAULT '2',
  `id_tipo_documento` bigint NOT NULL,
  `id_ciudad` bigint NOT NULL,
  `numero_documento` varchar(10) NOT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `id_sexo` bigint unsigned NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `estado` int DEFAULT '0' COMMENT '1 = activo, 0 = inactivo',
  PRIMARY KEY (`id_persona`),
  KEY `fk_id_persona_id_rol_idx` (`id_rol`),
  KEY `fk_id_persona_id_tipo_documento_idx` (`id_tipo_documento`),
  KEY `fk_id_persona_id_ciudad_idx` (`id_ciudad`),
  KEY `FK_personas_sexo` (`id_sexo`),
  CONSTRAINT `fk_id_persona_id_ciudad` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudades` (`id_ciudad`),
  CONSTRAINT `fk_id_persona_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  CONSTRAINT `fk_id_persona_id_tipo_documento` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documentos` (`id_tipo_documento`),
  CONSTRAINT `FK_personas_sexo` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.personas: ~2 rows (aproximadamente)
DELETE FROM `personas`;
INSERT INTO `personas` (`id_persona`, `id_rol`, `id_tipo_documento`, `id_ciudad`, `numero_documento`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `direccion`, `telefono`, `id_sexo`, `correo`, `estado`) VALUES
	(10, 1, 1, 4, '1209008', 'cristian', 'angel', 'moraes', 'para', 'bello', '3224567891', 2, 'CORREO12@GMAIL.COM', 1),
	(11, 2, 1, 1, '1120564623', 'JHON', 'HADER', 'rodriguez', 'perdomo', 'CALLE FALSA 123 AV SIEMPREVIVA', '3182825959', 2, 'jhhrodriguezp@sena.edu.co', 0);

-- Volcando estructura para tabla sistema_inventario.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` bigint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.roles: ~2 rows (aproximadamente)
DELETE FROM `roles`;
INSERT INTO `roles` (`id_rol`, `nombre`) VALUES
	(1, 'Administrador'),
	(2, 'Cliente');

-- Volcando estructura para tabla sistema_inventario.servicios
DROP TABLE IF EXISTS `servicios`;
CREATE TABLE IF NOT EXISTS `servicios` (
  `id_servicio` bigint NOT NULL AUTO_INCREMENT,
  `id_persona` bigint NOT NULL,
  `id_tipo_dispositivo` bigint NOT NULL,
  `id_marca` bigint NOT NULL,
  `id_tipo_servicio` bigint NOT NULL,
  `id_codigo` bigint NOT NULL,
  `id_estado_producto` bigint NOT NULL,
  `falla` text NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_servicio`),
  KEY `fk_id_servicio_id_codigo_idx` (`id_codigo`),
  KEY `fk_id_servicio_id_marca_idx` (`id_marca`),
  KEY `fk_id_servicio_id_tipo_dispositivo_idx` (`id_tipo_dispositivo`),
  KEY `fk_id_servicio_id_persona_idx` (`id_persona`),
  KEY `fk_id_servicio_id_estado_producto_idx` (`id_tipo_servicio`),
  CONSTRAINT `fk_id_servicio_id_codigo` FOREIGN KEY (`id_codigo`) REFERENCES `codigos` (`id_codigo`),
  CONSTRAINT `fk_id_servicio_id_estado_producto` FOREIGN KEY (`id_tipo_servicio`) REFERENCES `estado_productos` (`id_estado_producto`),
  CONSTRAINT `fk_id_servicio_id_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`),
  CONSTRAINT `fk_id_servicio_id_persona` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`),
  CONSTRAINT `fk_id_servicio_id_tipo_dispositivo` FOREIGN KEY (`id_tipo_dispositivo`) REFERENCES `tipo_dispositivos` (`id_tipo_dispositivo`),
  CONSTRAINT `fk_id_servicio_id_tipo_servicio` FOREIGN KEY (`id_tipo_servicio`) REFERENCES `tipo_servicios` (`id_tipo_servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.servicios: ~0 rows (aproximadamente)
DELETE FROM `servicios`;

-- Volcando estructura para tabla sistema_inventario.sexo
DROP TABLE IF EXISTS `sexo`;
CREATE TABLE IF NOT EXISTS `sexo` (
  `id_sexo` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sexo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.sexo: ~0 rows (aproximadamente)
DELETE FROM `sexo`;
INSERT INTO `sexo` (`id_sexo`, `nombre`) VALUES
	(1, 'MASCULINO'),
	(2, 'FEMENINO');

-- Volcando estructura para tabla sistema_inventario.tipo_dispositivos
DROP TABLE IF EXISTS `tipo_dispositivos`;
CREATE TABLE IF NOT EXISTS `tipo_dispositivos` (
  `id_tipo_dispositivo` bigint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_dispositivo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.tipo_dispositivos: ~2 rows (aproximadamente)
DELETE FROM `tipo_dispositivos`;
INSERT INTO `tipo_dispositivos` (`id_tipo_dispositivo`, `nombre`) VALUES
	(1, 'ln+pdkv'),
	(2, 'televisor');

-- Volcando estructura para tabla sistema_inventario.tipo_documentos
DROP TABLE IF EXISTS `tipo_documentos`;
CREATE TABLE IF NOT EXISTS `tipo_documentos` (
  `id_tipo_documento` bigint NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.tipo_documentos: ~2 rows (aproximadamente)
DELETE FROM `tipo_documentos`;
INSERT INTO `tipo_documentos` (`id_tipo_documento`, `tipo`) VALUES
	(1, 'cc'),
	(2, 'ti'),
	(3, 'ih´df');

-- Volcando estructura para tabla sistema_inventario.tipo_servicios
DROP TABLE IF EXISTS `tipo_servicios`;
CREATE TABLE IF NOT EXISTS `tipo_servicios` (
  `id_tipo_servicio` bigint NOT NULL AUTO_INCREMENT,
  `servicio` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.tipo_servicios: ~0 rows (aproximadamente)
DELETE FROM `tipo_servicios`;

-- Volcando estructura para tabla sistema_inventario.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_persona` bigint NOT NULL,
  `password` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_usuarios_personas` (`id_persona`),
  CONSTRAINT `FK_usuarios_personas` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COMMENT='En esta tabla se van a ingresar todos los usuarios del sistema';

-- Volcando datos para la tabla sistema_inventario.usuarios: ~0 rows (aproximadamente)
DELETE FROM `usuarios`;
INSERT INTO `usuarios` (`id`, `id_persona`, `password`, `estado`) VALUES
	(1, 10, '123456', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
