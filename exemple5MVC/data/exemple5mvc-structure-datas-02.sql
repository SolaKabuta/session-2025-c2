-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema exemple5mvc
-- -----------------------------------------------------
-- nom de la base de donnée

-- -----------------------------------------------------
-- Schema exemple5mvc
--
-- nom de la base de donnée
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `exemple5mvc` DEFAULT CHARACTER SET utf8 ;
USE `exemple5mvc` ;

-- -----------------------------------------------------
-- Table `exemple5mvc`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exemple5mvc`.`user` (
  `iduser` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'clef primaire',
  `userlogin` VARCHAR(60) NOT NULL COMMENT 'on se connecte avec ce login unique',
  `userpwd` VARCHAR(255) BINARY NOT NULL COMMENT 'le mot de passe est en binaire pour accepter les majuscules / minuscules',
  `username` VARCHAR(150) NOT NULL COMMENT 'nom d\'affichage',
  PRIMARY KEY (`iduser`),
  UNIQUE INDEX `userlogin_UNIQUE` (`userlogin` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `exemple5mvc`.`article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exemple5mvc`.`article` (
  `idarticle` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `articletitle` VARCHAR(160) NOT NULL,
  `articletext` TEXT NOT NULL,
  `articledate` DATETIME NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'on create : CURRENT_TIMESTAMP',
  `user_iduser` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idarticle`),
  INDEX `fk_article_user_idx` (`user_iduser` ASC) VISIBLE,
  CONSTRAINT `fk_article_user`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `exemple5mvc`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `exemple5mvc`.`section`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exemple5mvc`.`section` (
  `idsection` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `sectiontitle` VARCHAR(60) NOT NULL,
  `sectiondesc` VARCHAR(400) NULL,
  PRIMARY KEY (`idsection`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

-- -----------------------------------------------------
-- Table `exemple5mvc`.`article_has_section`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exemple5mvc`.`article_has_section` (
  `article_idarticle` INT UNSIGNED NOT NULL,
  `section_idsection` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`article_idarticle`, `section_idsection`),
  INDEX `fk_article_has_section_section1_idx` (`section_idsection` ASC) VISIBLE,
  INDEX `fk_article_has_section_article1_idx` (`article_idarticle` ASC) VISIBLE,
  CONSTRAINT `fk_article_has_section_article1`
    FOREIGN KEY (`article_idarticle`)
    REFERENCES `exemple5mvc`.`article` (`idarticle`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_article_has_section_section1`
    FOREIGN KEY (`section_idsection`)
    REFERENCES `exemple5mvc`.`section` (`idsection`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


INSERT INTO `user` (`iduser`, `userlogin`, `userpwd`, `username`) VALUES
                                                                      (1, 'admin', '$2y$10$mJukcYSXrqE5kHq8MVTNU.1hxIPUHTTk/1bdodOXAW7OwUrJyy7FW', 'Pitz Michaël'),
                                                                      (2, 'modo', '$2y$10$U8Ae89vi4acYlUM.6npNbOqbyM9MacsWv2WAhO/ybhLtSfwpOCK4S', 'Sandron Pierre'),
                                                                      (3, 'user', '$2y$10$LqlwQ9CblCTS4QLD6boGy.ydv7SsURUcJlAYM64T.tY16JIUzmrlW', 'Sall Magib');


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
