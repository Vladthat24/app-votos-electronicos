-- MySQL Script generated by MySQL Workbench
-- Wed Dec 16 16:42:35 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema dirislim_vonline
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dirislim_vonline
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dirislim_vonline` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema dirislim_votoonline
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dirislim_votoonline
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dirislim_votoonline` DEFAULT CHARACTER SET utf8mb4 ;
USE `dirislim_vonline` ;

-- -----------------------------------------------------
-- Table `dirislim_vonline`.`tap_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_vonline`.`tap_roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` TEXT NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dirislim_vonline`.`tap_empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_vonline`.`tap_empleado` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idroles` INT NOT NULL,
  `datos_completos` TEXT NOT NULL,
  `dni` TEXT NOT NULL,
  `oficina` TEXT NOT NULL,
  `cargo` TEXT NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tap_empleado_tap_roles_idx` (`idroles` ASC) ,
  CONSTRAINT `fk_tap_empleado_tap_roles`
    FOREIGN KEY (`idroles`)
    REFERENCES `dirislim_vonline`.`tap_roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dirislim_vonline`.`tap_lista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_vonline`.`tap_lista` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` TEXT NOT NULL,
  `descripcion` TEXT NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dirislim_vonline`.`tap_cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_vonline`.`tap_cargo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` TEXT NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dirislim_vonline`.`tap_detalle_lista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_vonline`.`tap_detalle_lista` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idempleado` INT NOT NULL,
  `idlista` INT NOT NULL,
  `idcargo` INT NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tap_detalle_lista_tap_empleado1_idx` (`idempleado` ASC) ,
  INDEX `fk_tap_detalle_lista_tap_lista1_idx` (`idlista` ASC) ,
  INDEX `fk_tap_detalle_lista_tap_cargo1_idx` (`idcargo` ASC) ,
  CONSTRAINT `fk_tap_detalle_lista_tap_empleado1`
    FOREIGN KEY (`idempleado`)
    REFERENCES `dirislim_vonline`.`tap_empleado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tap_detalle_lista_tap_lista1`
    FOREIGN KEY (`idlista`)
    REFERENCES `dirislim_vonline`.`tap_lista` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tap_detalle_lista_tap_cargo1`
    FOREIGN KEY (`idcargo`)
    REFERENCES `dirislim_vonline`.`tap_cargo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dirislim_vonline`.`tap_votos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_vonline`.`tap_votos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `codigo` TEXT NOT NULL,
  `valor` TEXT NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dirislim_vonline`.`tap_control`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_vonline`.`tap_control` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `codigo` TEXT NOT NULL,
  `idempleado` INT NOT NULL,
  `fecha_registro` DATE NOT NULL,
  `ip` TEXT NOT NULL,
  `valor` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

USE `dirislim_votoonline` ;

-- -----------------------------------------------------
-- Table `dirislim_votoonline`.`tap_cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_votoonline`.`tap_cargo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` TEXT NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `dirislim_votoonline`.`tap_control`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_votoonline`.`tap_control` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `codigo` TEXT NOT NULL,
  `idempleado` INT(11) NOT NULL,
  `fecha_registro` DATE NOT NULL,
  `ip` TEXT NOT NULL,
  `valor` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `dirislim_votoonline`.`tap_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_votoonline`.`tap_roles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` TEXT NOT NULL,
  `fecha_registro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `dirislim_votoonline`.`tap_empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_votoonline`.`tap_empleado` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `datos_completos` TEXT NOT NULL,
  `dni` TEXT NOT NULL,
  `oficina` TEXT NOT NULL,
  `cargo` TEXT NOT NULL,
  `foto` TEXT NOT NULL,
  `idroles` INT(11) NOT NULL,
  `usuario` TEXT NOT NULL,
  `password` TEXT NOT NULL,
  `estado` INT(11) NOT NULL,
  `ultimo_login` DATETIME NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tap_empleado_tap_roles_id` (`idroles` ASC) ,
  CONSTRAINT `fk_tap_empleado_tap_roles`
    FOREIGN KEY (`idroles`)
    REFERENCES `dirislim_votoonline`.`tap_roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `dirislim_votoonline`.`tap_lista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_votoonline`.`tap_lista` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` TEXT NOT NULL,
  `descripcion` TEXT NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 23
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `dirislim_votoonline`.`tap_detalle_lista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_votoonline`.`tap_detalle_lista` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idempleado` INT(11) NOT NULL,
  `idlista` INT(11) NOT NULL,
  `idcargo` INT(11) NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tap_detalle_lista_tap_empleado1_id` (`idempleado` ASC) ,
  INDEX `fk_tap_detalle_lista_tap_lista1_id` (`idlista` ASC) ,
  INDEX `fk_tap_detalle_lista_tap_cargo1_idx` (`idcargo` ASC) ,
  CONSTRAINT `fk_tap_detalle_lista_tap_empleado1`
    FOREIGN KEY (`idempleado`)
    REFERENCES `dirislim_votoonline`.`tap_empleado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tap_detalle_lista_tap_lista1`
    FOREIGN KEY (`idlista`)
    REFERENCES `dirislim_votoonline`.`tap_lista` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tap_detalle_lista_tap_cargo1`
    FOREIGN KEY (`idcargo`)
    REFERENCES `dirislim_votoonline`.`tap_cargo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `dirislim_votoonline`.`tap_votos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dirislim_votoonline`.`tap_votos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `codigo` TEXT NOT NULL,
  `valor` TEXT NOT NULL,
  `fecha_registro` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
