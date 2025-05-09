-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 09 mai 2025 à 11:54
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `exemple5mvc`
--
DROP DATABASE IF EXISTS `exemple5mvc`;
CREATE DATABASE IF NOT EXISTS `exemple5mvc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `exemple5mvc`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
                                         `idarticle` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                         `articletitle` varchar(160) NOT NULL,
    `articletext` text NOT NULL,
    `articledate` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'on create : CURRENT_TIMESTAMP',
    `user_iduser` int UNSIGNED NOT NULL,
    PRIMARY KEY (`idarticle`),
    KEY `fk_article_user_idx` (`user_iduser`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
                                      `iduser` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'clef primaire',
                                      `userlogin` varchar(60) NOT NULL COMMENT 'on se connecte avec ce login unique',
    `userpwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'le mot de passe est en binaire pour accepter les majuscules / minuscules',
    `username` varchar(150) NOT NULL COMMENT 'nom d''affichage',
    PRIMARY KEY (`iduser`),
    UNIQUE KEY `userlogin_UNIQUE` (`userlogin`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`iduser`, `userlogin`, `userpwd`, `username`) VALUES
                                                                      (1, 'admin', '$2y$10$mJukcYSXrqE5kHq8MVTNU.1hxIPUHTTk/1bdodOXAW7OwUrJyy7FW', 'Pitz Michaël'),
                                                                      (2, 'modo', '$2y$10$U8Ae89vi4acYlUM.6npNbOqbyM9MacsWv2WAhO/ybhLtSfwpOCK4S', 'Sandron Pierre'),
                                                                      (3, 'user', '$2y$10$LqlwQ9CblCTS4QLD6boGy.ydv7SsURUcJlAYM64T.tY16JIUzmrlW', 'Sall Magib');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
    ADD CONSTRAINT `fk_article_user` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
