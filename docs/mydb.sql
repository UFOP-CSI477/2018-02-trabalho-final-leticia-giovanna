-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema fit
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema fit
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `fit` DEFAULT CHARACTER SET utf8 ;
USE `fit` ;

-- -----------------------------------------------------
-- Table `fit`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fit`.`usuario` (
  `idusuario` INT AUTO_INCREMENT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `idade` DATE NOT NULL,
  `peso` DOUBLE NOT NULL,
  `altura` DOUBLE NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` CHAR(8) NOT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fit`.`registro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fit`.`registro` (
  `idregistro` INT NOT NULL,
  `kcal` DOUBLE NULL,
  `agua` DOUBLE NULL,
  `atvfisica` DOUBLE NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idregistro`),
  INDEX `fk_registro_usuario_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_registro_usuario`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `fit`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
