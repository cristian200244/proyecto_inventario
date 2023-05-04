-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema inventario_data_base
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema inventario_data_base
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `inventario_data_base` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema new_schema1
-- -----------------------------------------------------
USE `inventario_data_base` ;

-- -----------------------------------------------------
-- Table `inventario_data_base`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario_data_base`.`roles` (
  `id_rol` BIGINT NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_rol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario_data_base`.`tipo_documentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario_data_base`.`tipo_documentos` (
  `id_tipo_documento` BIGINT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_tipo_documento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario_data_base`.`ciudades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario_data_base`.`ciudades` (
  `id_ciudad` BIGINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_ciudad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario_data_base`.`personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario_data_base`.`personas` (
  `id_persona` BIGINT NOT NULL AUTO_INCREMENT,
  `id_rol` BIGINT NOT NULL,
  `id_tipo_documento` BIGINT NOT NULL,
  `id_ciudad` BIGINT NOT NULL,
  `numero_documento` VARCHAR(10) NOT NULL,
  `primer_nombre` VARCHAR(50) NOT NULL,
  `segundo_nombre` VARCHAR(50) NULL,
  `primer_apellido` VARCHAR(50) NOT NULL,
  `segundo_apellido` VARCHAR(50) NULL,
  `direccion` VARCHAR(50) NOT NULL,
  `telefono` VARCHAR(50) NOT NULL,
  `password` VARCHAR(20) NOT NULL,
  `sexo` TINYINT NOT NULL,
  `e-mail` VARCHAR(100) NULL,
  PRIMARY KEY (`id_persona`),
  INDEX `fk_id_persona_id_rol_idx` (`id_rol` ASC) VISIBLE,
  INDEX `fk_id_persona_id_tipo_documento_idx` (`id_tipo_documento` ASC) VISIBLE,
  INDEX `fk_id_persona_id_ciudad_idx` (`id_ciudad` ASC) VISIBLE,
  CONSTRAINT `fk_id_persona_id_rol`
    FOREIGN KEY (`id_rol`)
    REFERENCES `inventario_data_base`.`roles` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_persona_id_tipo_documento`
    FOREIGN KEY (`id_tipo_documento`)
    REFERENCES `inventario_data_base`.`tipo_documentos` (`id_tipo_documento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_persona_id_ciudad`
    FOREIGN KEY (`id_ciudad`)
    REFERENCES `inventario_data_base`.`ciudades` (`id_ciudad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario_data_base`.`codigos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario_data_base`.`codigos` (
  `id_codigo` BIGINT NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id_codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario_data_base`.`marcas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario_data_base`.`marcas` (
  `id_marca` BIGINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_marca`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario_data_base`.`tipo_dispositivos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario_data_base`.`tipo_dispositivos` (
  `id_tipo_dispositivo` BIGINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_tipo_dispositivo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario_data_base`.`estado_productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario_data_base`.`estado_productos` (
  `id_estado_producto` BIGINT NOT NULL AUTO_INCREMENT,
  `estado` TINYINT NOT NULL,
  PRIMARY KEY (`id_estado_producto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario_data_base`.`tipo_servicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario_data_base`.`tipo_servicios` (
  `id_tipo_servicio` BIGINT NOT NULL AUTO_INCREMENT,
  `servicio` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_tipo_servicio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario_data_base`.`servicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario_data_base`.`servicios` (
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
    REFERENCES `inventario_data_base`.`codigos` (`id_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_servicio_id_marca`
    FOREIGN KEY (`id_marca`)
    REFERENCES `inventario_data_base`.`marcas` (`id_marca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_servicio_id_tipo_dispositivo`
    FOREIGN KEY (`id_tipo_dispositivo`)
    REFERENCES `inventario_data_base`.`tipo_dispositivos` (`id_tipo_dispositivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_servicio_id_estado_producto`
    FOREIGN KEY (`id_tipo_servicio`)
    REFERENCES `inventario_data_base`.`estado_productos` (`id_estado_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_servicio_id_tipo_servicio`
    FOREIGN KEY (`id_tipo_servicio`)
    REFERENCES `inventario_data_base`.`tipo_servicios` (`id_tipo_servicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_servicio_id_persona`
    FOREIGN KEY (`id_persona`)
    REFERENCES `inventario_data_base`.`personas` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario_data_base`.`sexo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario_data_base`.`sexo` (
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario_data_base`.`sexo_copy1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario_data_base`.`sexo_copy1` (
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario_data_base`.`sexo_copy2`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario_data_base`.`sexo_copy2` (
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario_data_base`.`sexo_copy3`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario_data_base`.`sexo_copy3` (
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario_data_base`.`facturas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario_data_base`.`facturas` (
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
    REFERENCES `inventario_data_base`.`personas` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_factura_id_servicio`
    FOREIGN KEY (`id_servicio`)
    REFERENCES `inventario_data_base`.`servicios` (`id_servicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
