 -- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.32 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
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
CREATE DATABASE IF NOT EXISTS `sistema_inventario` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sistema_inventario`;

-- Volcando estructura para tabla sistema_inventario.ciudades
CREATE TABLE IF NOT EXISTS `ciudades` (
  `id_ciudad` bigint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ciudad`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.ciudades: ~4 rows (aproximadamente)
DELETE FROM `ciudades`;
INSERT INTO `ciudades` (`id_ciudad`, `nombre`) VALUES
	(1, 'SAN JOSE DEL GUAVIARE'),
	(2, 'ANTIOQUIA'),
	(3, 'VAUPES'),
	(5, 'AMAZONAS');

-- Volcando estructura para tabla sistema_inventario.estado_productos
CREATE TABLE IF NOT EXISTS `estado_productos` (
  `id_estado_producto` bigint NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.estado_productos: ~2 rows (aproximadamente)
DELETE FROM `estado_productos`;
INSERT INTO `estado_productos` (`id_estado_producto`, `estado`) VALUES
	(1, 'PENDIENTE'),
	(2, 'NO PENDIENTE');

-- Volcando estructura para tabla sistema_inventario.facturas
CREATE TABLE IF NOT EXISTS `facturas` (
  `id_factura` bigint NOT NULL AUTO_INCREMENT,
  `id_persona` bigint NOT NULL,
  `id_servicio` bigint NOT NULL,
  `fecha` date NOT NULL,
  `total` double NOT NULL,
  `id_tipo_dispositivo` bigint NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `fk_id_factura_id_persona_idx` (`id_persona`),
  KEY `fk_factura_id_servicio_idx` (`id_servicio`),
  KEY `id_tipo_dispositivo` (`id_tipo_dispositivo`),
  CONSTRAINT `fk_factura_id_servicio` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`),
  CONSTRAINT `FK_facturas_tipo_dispositivos` FOREIGN KEY (`id_tipo_dispositivo`) REFERENCES `tipo_dispositivos` (`id_tipo_dispositivo`),
  CONSTRAINT `fk_id_factura_id_persona` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.facturas: ~0 rows (aproximadamente)
DELETE FROM `facturas`;

-- Volcando estructura para tabla sistema_inventario.marcas
CREATE TABLE IF NOT EXISTS `marcas` (
  `id_marca` bigint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.marcas: ~4 rows (aproximadamente)
DELETE FROM `marcas`;
INSERT INTO `marcas` (`id_marca`, `nombre`) VALUES
	(1, 'SAMSUNG'),
	(2, 'HAWEI'),
	(3, 'HP'),
	(14, 'YAHOO');

-- Volcando estructura para tabla sistema_inventario.personas
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
  UNIQUE KEY `numero_documento` (`numero_documento`),
  UNIQUE KEY `telefono` (`telefono`),
  UNIQUE KEY `numero_documento_telefono_correo` (`numero_documento`,`telefono`,`correo`),
  UNIQUE KEY `correo` (`correo`),
  KEY `fk_id_persona_id_rol_idx` (`id_rol`),
  KEY `fk_id_persona_id_tipo_documento_idx` (`id_tipo_documento`),
  KEY `fk_id_persona_id_ciudad_idx` (`id_ciudad`),
  KEY `FK_personas_sexo` (`id_sexo`),
  CONSTRAINT `fk_id_persona_id_ciudad` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudades` (`id_ciudad`),
  CONSTRAINT `fk_id_persona_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  CONSTRAINT `fk_id_persona_id_tipo_documento` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documentos` (`id_tipo_documento`),
  CONSTRAINT `FK_personas_sexo` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.personas: ~4 rows (aproximadamente)
DELETE FROM `personas`;
INSERT INTO `personas` (`id_persona`, `id_rol`, `id_tipo_documento`, `id_ciudad`, `numero_documento`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `direccion`, `telefono`, `id_sexo`, `correo`, `estado`) VALUES
	(1, 2, 1, 3, '1120564623', 'JHON', '', 'RODRIGUEZ', '', 'CALLE FALSA 123', '3182825959', 1, 'JHHRODRIGUEZP@SENA.EDU.CO', 1),
	(2, 2, 1, 2, '1234567890', 'JUAN', 'ANDRES', 'ZARAGOZA', 'DENTIR', 'calller nordeste ', '3151185185', 1, 'andres@gmail.com', 0),
	(4, 2, 1, 2, '1234567892', 'CARLOS', '', 'SANCHEZ', '', 'calle 12a centro providencia', '3223452134', 1, 'carlos23@gmail.com', 0),
	(5, 2, 2, 1, '1234567893', 'BRENDA', '', 'SALAZAR', '', 'corredor las venecias', '2332441221', 4, 'formato@gmail.com', 0),
	(9, 2, 3, 1, '1345685838', 'CARLOS', 'MANUEL', 'DARTE', 'LOZADA', 'CALLE LA VENECIA 23-34', '3234767547', 1, 'CARLOS34GUIRT@GMAIL.COM', 0);

-- Volcando estructura para tabla sistema_inventario.roles
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
CREATE TABLE IF NOT EXISTS `servicios` (
  `id_servicio` bigint NOT NULL AUTO_INCREMENT,
  `id_persona` bigint NOT NULL,
  `id_tipo_dispositivo` bigint NOT NULL,
  `id_marca` bigint NOT NULL,
  `id_tipo_servicio` bigint NOT NULL,
  `codigo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id_estado_producto` bigint NOT NULL,
  `fecha` date NOT NULL,
  `falla` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id_servicio`),
  KEY `fk_id_servicio_id_marca_idx` (`id_marca`),
  KEY `fk_id_servicio_id_tipo_dispositivo_idx` (`id_tipo_dispositivo`),
  KEY `fk_id_servicio_id_persona_idx` (`id_persona`),
  KEY `fk_id_servicio_id_estado_producto_idx` (`id_tipo_servicio`),
  KEY `fk_id_servicio_id_estado_producto` (`id_estado_producto`),
  CONSTRAINT `fk_id_servicio_id_estado_producto` FOREIGN KEY (`id_estado_producto`) REFERENCES `estado_productos` (`id_estado_producto`),
  CONSTRAINT `fk_id_servicio_id_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`),
  CONSTRAINT `fk_id_servicio_id_persona` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`),
  CONSTRAINT `fk_id_servicio_id_tipo_dispositivo` FOREIGN KEY (`id_tipo_dispositivo`) REFERENCES `tipo_dispositivos` (`id_tipo_dispositivo`),
  CONSTRAINT `fk_id_servicio_id_tipo_servicio` FOREIGN KEY (`id_tipo_servicio`) REFERENCES `tipo_servicios` (`id_tipo_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.servicios: ~4 rows (aproximadamente)
DELETE FROM `servicios`;
INSERT INTO `servicios` (`id_servicio`, `id_persona`, `id_tipo_dispositivo`, `id_marca`, `id_tipo_servicio`, `codigo`, `id_estado_producto`, `fecha`, `falla`) VALUES
	(1, 1, 1, 3, 1, '8687793', 1, '2023-06-01', '  LA TARJETA GRÁFICA NO ENFRÍA '),
	(4, 4, 2, 2, 3, '8615655', 1, '2023-06-01', '  fallas en placa 2ty'),
	(5, 2, 3, 2, 4, '4317251', 2, '2023-06-01', '  fallas en los cables de tension de cuerdas'),
	(6, 2, 3, 2, 1, '1687611', 2, '2023-06-09', ' frecuente falla en los arpensores');

-- Volcando estructura para tabla sistema_inventario.sexo
CREATE TABLE IF NOT EXISTS `sexo` (
  `id_sexo` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sexo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.sexo: ~2 rows (aproximadamente)
DELETE FROM `sexo`;
INSERT INTO `sexo` (`id_sexo`, `nombre`) VALUES
	(1, 'MASCULINO'),
	(4, 'FEMENINO');

-- Volcando estructura para tabla sistema_inventario.tipo_dispositivos
CREATE TABLE IF NOT EXISTS `tipo_dispositivos` (
  `id_tipo_dispositivo` bigint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_dispositivo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.tipo_dispositivos: ~2 rows (aproximadamente)
DELETE FROM `tipo_dispositivos`;
INSERT INTO `tipo_dispositivos` (`id_tipo_dispositivo`, `nombre`) VALUES
	(1, 'TV'),
	(2, 'CELULAR'),
	(3, 'ROUTER');

-- Volcando estructura para tabla sistema_inventario.tipo_documentos
CREATE TABLE IF NOT EXISTS `tipo_documentos` (
  `id_tipo_documento` bigint NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.tipo_documentos: ~3 rows (aproximadamente)
DELETE FROM `tipo_documentos`;
INSERT INTO `tipo_documentos` (`id_tipo_documento`, `tipo`) VALUES
	(1, 'CC'),
	(2, 'TI'),
	(3, 'CE');

-- Volcando estructura para tabla sistema_inventario.tipo_servicios
CREATE TABLE IF NOT EXISTS `tipo_servicios` (
  `id_tipo_servicio` bigint NOT NULL AUTO_INCREMENT,
  `servicio` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla sistema_inventario.tipo_servicios: ~4 rows (aproximadamente)
DELETE FROM `tipo_servicios`;
INSERT INTO `tipo_servicios` (`id_tipo_servicio`, `servicio`) VALUES
	(1, 'MANTENIMIENTO'),
	(2, 'SOPORTE TECNICO'),
	(3, 'CONECTIVIDAD'),
	(4, 'SERVICIO DE PERSONALIZACION');

-- Volcando estructura para tabla sistema_inventario.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_persona` bigint NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `password` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_usuarios_personas` (`id_persona`),
  CONSTRAINT `FK_usuarios_personas` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COMMENT='En esta tabla se van a ingresar todos los usuarios del sistema';

-- Volcando datos para la tabla sistema_inventario.usuarios: ~0 rows (aproximadamente)
DELETE FROM `usuarios`;
INSERT INTO `usuarios` (`id`, `id_persona`, `correo`, `password`, `estado`) VALUES
	(1, 10, NULL, '123456', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
