-- MySQL Script generated by MySQL Workbench
-- Wed Dec 16 16:25:15 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema dirislim_voto_online
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dirislim_voto_online
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dirislim_voto_online` DEFAULT CHARACTER SET utf8 ;
USE `dirislim_voto_online` ;

-- -----------------------------------------------------
-- Table `dirislim_voto_online`.`tap_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_voto_online`.`tap_roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` TEXT NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dirislim_voto_online`.`tap_empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_voto_online`.`tap_empleado` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idroles` INT NOT NULL,
  `datos_completos` TEXT NOT NULL,
  `dni` TEXT NOT NULL,
  `oficina` TEXT NOT NULL,
  `cargo` TEXT NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tap_empleado_tap_roles_idx` (`idroles` ASC),
  CONSTRAINT `fk_tap_empleado_tap_roles`
    FOREIGN KEY (`idroles`)
    REFERENCES `dirislim_voto_online`.`tap_roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dirislim_voto_online`.`tap_lista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_voto_online`.`tap_lista` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` TEXT NOT NULL,
  `descripcion` TEXT NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dirislim_voto_online`.`tap_cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_voto_online`.`tap_cargo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` TEXT NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dirislim_voto_online`.`tap_detalle_lista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_voto_online`.`tap_detalle_lista` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idempleado` INT NOT NULL,
  `idlista` INT NOT NULL,
  `idcargo` INT NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tap_detalle_lista_tap_empleado1_idx` (`idempleado` ASC),
  INDEX `fk_tap_detalle_lista_tap_lista1_idx` (`idlista` ASC) ,
  INDEX `fk_tap_detalle_lista_tap_cargo1_idx` (`idcargo` ASC) ,
  CONSTRAINT `fk_tap_detalle_lista_tap_empleado1`
    FOREIGN KEY (`idempleado`)
    REFERENCES `dirislim_voto_online`.`tap_empleado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tap_detalle_lista_tap_lista1`
    FOREIGN KEY (`idlista`)
    REFERENCES `dirislim_voto_online`.`tap_lista` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tap_detalle_lista_tap_cargo1`
    FOREIGN KEY (`idcargo`)
    REFERENCES `dirislim_voto_online`.`tap_cargo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dirislim_voto_online`.`tap_votos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_voto_online`.`tap_votos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `codigo` TEXT NOT NULL,
  `valor` TEXT NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dirislim_voto_online`.`tap_control`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_voto_online`.`tap_control` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `codigo` TEXT NOT NULL,
  `idempleado` INT NOT NULL,
  `fecha_registro` DATE NOT NULL,
  `ip` TEXT NOT NULL,
  `valor` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;