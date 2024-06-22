-- MySQL Script generated by MySQL Workbench
-- Fri Jun 14 21:51:02 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_prova_bd_2mod_etec
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `db_prova_bd_2mod_etec` ;

-- -----------------------------------------------------
-- Schema db_prova_bd_2mod_etec
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_prova_bd_2mod_etec` DEFAULT CHARACTER SET utf8mb4 ;
USE `db_prova_bd_2mod_etec` ;

-- -----------------------------------------------------
-- Table `db_prova_bd_2mod_etec`.`tb_categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_prova_bd_2mod_etec`.`tb_categoria` ;

CREATE TABLE IF NOT EXISTS `db_prova_bd_2mod_etec`.`tb_categoria` (
  `cd_categoria` INT NOT NULL AUTO_INCREMENT,
  `nm_categoria` VARCHAR(60) NOT NULL,
  `st_categoria` CHAR(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`cd_categoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_prova_bd_2mod_etec`.`tb_filme`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_prova_bd_2mod_etec`.`tb_filme` ;

CREATE TABLE IF NOT EXISTS `db_prova_bd_2mod_etec`.`tb_filme` (
  `cd_filme` INT NOT NULL AUTO_INCREMENT,
  `nm_filme` VARCHAR(80) NOT NULL,
  `ds_filme` LONGTEXT NOT NULL,
  `vl_filme` DECIMAL(6,2) NOT NULL,
  `id_categoria` INT NOT NULL,
  `st_filme` CHAR(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`cd_filme`),
  INDEX `fk_tb_filme_tb_categoria1_idx` (`id_categoria` ASC) ,
  CONSTRAINT `fk_tb_filme_tb_categoria1`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `db_prova_bd_2mod_etec`.`tb_categoria` (`cd_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_prova_bd_2mod_etec`.`tb_loja`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_prova_bd_2mod_etec`.`tb_loja` ;

CREATE TABLE IF NOT EXISTS `db_prova_bd_2mod_etec`.`tb_loja` (
  `cd_loja` INT NOT NULL AUTO_INCREMENT,
  `nm_endereco` VARCHAR(60) NOT NULL,
  `nm_bairro` VARCHAR(60) NOT NULL,
  `nm_cidade` VARCHAR(60) NOT NULL,
  `cd_estado` CHAR(2) NOT NULL,
  `st_loja` CHAR(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`cd_loja`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_prova_bd_2mod_etec`.`tb_inventario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_prova_bd_2mod_etec`.`tb_inventario` ;

CREATE TABLE IF NOT EXISTS `db_prova_bd_2mod_etec`.`tb_inventario` (
  `cd_inventario` INT NOT NULL AUTO_INCREMENT,
  `id_filme` INT NOT NULL,
  `id_loja` INT NOT NULL,
  `qt_filme` INT NOT NULL,
  PRIMARY KEY (`cd_inventario`),
  INDEX `fk_tb_inventario_tb_filme1_idx` (`id_filme` ASC) ,
  INDEX `fk_tb_inventario_tb_loja1_idx` (`id_loja` ASC) ,
  CONSTRAINT `fk_tb_inventario_tb_filme1`
    FOREIGN KEY (`id_filme`)
    REFERENCES `db_prova_bd_2mod_etec`.`tb_filme` (`cd_filme`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_inventario_tb_loja1`
    FOREIGN KEY (`id_loja`)
    REFERENCES `db_prova_bd_2mod_etec`.`tb_loja` (`cd_loja`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
