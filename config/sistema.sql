 -- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema sistema_inventario
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sistema_inventario
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sistema_inventario` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema new_schema1
-- -----------------------------------------------------
USE `sistema_inventario` ;

-- -----------------------------------------------------
-- Table `sistema_inventario`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_inventario`.`roles` (
  `id_rol` BIGINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL,
  PRIMARY KEY (`id_rol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_inventario`.`tipo_documentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_inventario`.`tipo_documentos` (
  `id_tipo_documento` BIGINT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_tipo_documento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_inventario`.`ciudades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_inventario`.`ciudades` (
  `id_ciudad` BIGINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_ciudad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_inventario`.`personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_inventario`.`personas` (
  `id_persona` BIGINT NOT NULL AUTO_INCREMENT,
  `id_rol` BIGINT NULL,
  `id_tipo_documento` BIGINT NOT NULL,
  `id_ciudad` BIGINT NOT NULL,
  `numero_documento` VARCHAR(10) NOT NULL,
  `primer_nombre` VARCHAR(50) NOT NULL,
  `segundo_nombre` VARCHAR(50) NULL,
  `primer_apellido` VARCHAR(50) NOT NULL,
  `segundo_apellido` VARCHAR(50) NULL,
  `direccion` VARCHAR(50) NOT NULL,
  `telefono` VARCHAR(50) NOT NULL,
  `password` VARCHAR(20) NULL,
  `sexo` VARCHAR(50) NOT NULL,
  `e-mail` VARCHAR(100) NULL,
  PRIMARY KEY (`id_persona`),
  INDEX `fk_id_persona_id_rol_idx` (`id_rol` ASC) VISIBLE,
  INDEX `fk_id_persona_id_tipo_documento_idx` (`id_tipo_documento` ASC) VISIBLE,
  INDEX `fk_id_persona_id_ciudad_idx` (`id_ciudad` ASC) VISIBLE,
  CONSTRAINT `fk_id_persona_id_rol`
    FOREIGN KEY (`id_rol`)
    REFERENCES `sistema_inventario`.`roles` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_persona_id_tipo_documento`
    FOREIGN KEY (`id_tipo_documento`)
    REFERENCES `sistema_inventario`.`tipo_documentos` (`id_tipo_documento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_persona_id_ciudad`
    FOREIGN KEY (`id_ciudad`)
    REFERENCES `sistema_inventario`.`ciudades` (`id_ciudad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_inventario`.`codigos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_inventario`.`codigos` (
  `id_codigo` BIGINT NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id_codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_inventario`.`marcas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_inventario`.`marcas` (
  `id_marca` BIGINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_marca`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_inventario`.`tipo_dispositivos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_inventario`.`tipo_dispositivos` (
  `id_tipo_dispositivo` BIGINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_tipo_dispositivo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_inventario`.`estado_productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_inventario`.`estado_productos` (
  `id_estado_producto` BIGINT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_estado_producto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_inventario`.`tipo_servicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_inventario`.`tipo_servicios` (
  `id_tipo_servicio` BIGINT NOT NULL AUTO_INCREMENT,
  `servicio` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_tipo_servicio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_inventario`.`servicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_inventario`.`servicios` (
  `id_servicio` BIGINT NOT NULL AUTO_INCREMENT,
  `id_persona` BIGINT NOT NULL,
  `id_tipo_dispositivo` BIGINT NOT NULL,
  `id_marca` BIGINT NOT NULL,
  `id_tipo_servicio` BIGINT NOT NULL,
  `id_codigo` BIGINT NOT NULL,
  `id_estado_producto` BIGINT NOT NULL,
  `falla` TEXT(500) NOT NULL,
  `fecha` DATE NOT NULL,
  PRIMARY KEY (`id_servicio`),
  INDEX `fk_id_servicio_id_codigo_idx` (`id_codigo` ASC) VISIBLE,
  INDEX `fk_id_servicio_id_marca_idx` (`id_marca` ASC) VISIBLE,
  INDEX `fk_id_servicio_id_tipo_dispositivo_idx` (`id_tipo_dispositivo` ASC) VISIBLE,
  INDEX `fk_id_servicio_id_persona_idx` (`id_persona` ASC) VISIBLE,
  INDEX `fk_id_servicio_id_estado_producto_idx` (`id_tipo_servicio` ASC) VISIBLE,
  CONSTRAINT `fk_id_servicio_id_codigo`
    FOREIGN KEY (`id_codigo`)
    REFERENCES `sistema_inventario`.`codigos` (`id_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_servicio_id_marca`
    FOREIGN KEY (`id_marca`)
    REFERENCES `sistema_inventario`.`marcas` (`id_marca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_servicio_id_tipo_dispositivo`
    FOREIGN KEY (`id_tipo_dispositivo`)
    REFERENCES `sistema_inventario`.`tipo_dispositivos` (`id_tipo_dispositivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_servicio_id_estado_producto`
    FOREIGN KEY (`id_tipo_servicio`)
    REFERENCES `sistema_inventario`.`estado_productos` (`id_estado_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_servicio_id_tipo_servicio`
    FOREIGN KEY (`id_tipo_servicio`)
    REFERENCES `sistema_inventario`.`tipo_servicios` (`id_tipo_servicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_servicio_id_persona`
    FOREIGN KEY (`id_persona`)
    REFERENCES `sistema_inventario`.`personas` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_inventario`.`facturas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_inventario`.`facturas` (
  `id_factura` BIGINT NOT NULL AUTO_INCREMENT,
  `id_persona` BIGINT NOT NULL,
  `id_servicio` BIGINT NOT NULL,
  `fecha` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `precio` FLOAT NOT NULL,
  `total` DOUBLE NOT NULL,
  PRIMARY KEY (`id_factura`),
  INDEX `fk_id_factura_id_persona_idx` (`id_persona` ASC) VISIBLE,
  INDEX `fk_factura_id_servicio_idx` (`id_servicio` ASC) VISIBLE,
  CONSTRAINT `fk_id_factura_id_persona`
    FOREIGN KEY (`id_persona`)
    REFERENCES `sistema_inventario`.`personas` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_factura_id_servicio`
    FOREIGN KEY (`id_servicio`)
    REFERENCES `sistema_inventario`.`servicios` (`id_servicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
