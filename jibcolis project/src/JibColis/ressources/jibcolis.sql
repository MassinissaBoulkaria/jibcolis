-- phpMyAdmin SQL Dump
-- version 4.0.10.17
-- https://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 14 Mai 2017 à 08:53
-- Version du serveur: 5.5.53-MariaDB-cll-lve
-- Version de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `jibcolis_jibcolis_pro`
--
CREATE DATABASE IF NOT EXISTS `jibcolis_jibcolis_pro` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jibcolis_jibcolis_pro`;

-- --------------------------------------------------------

--
-- Structure de la table `colis`
--

DROP TABLE IF EXISTS `colis`;
CREATE TABLE IF NOT EXISTS `colis` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `colis_image_url` varchar(255) DEFAULT NULL,
  `contenu` varchar(255) DEFAULT NULL,
  `dateToSend` datetime NOT NULL,
  `depth` float DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `height` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `publishDate` datetime DEFAULT NULL,
  `to_send` bit(1) NOT NULL,
  `travel_mode` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `width` float DEFAULT NULL,
  `locationFrom_id` int(11) DEFAULT NULL,
  `locationTo_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_b02auxa2sjc181hp60dpb6k6m` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `deleteToUserFrom` bit(1) DEFAULT NULL,
  `deleteToUserTo` bit(1) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `userFrom_id` bigint(20) DEFAULT NULL,
  `userTo_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_iew5a8swtmknyp3akiijtn0ko` (`userFrom_id`),
  KEY `FK_c7aoa6cprt6i4qhky8k7tiyot` (`userTo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

-- --------------------------------------------------------

--
-- Structure de la table `meta_location`
--

DROP TABLE IF EXISTS `meta_location`;
CREATE TABLE IF NOT EXISTS `meta_location` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `iso` varchar(50) DEFAULT NULL,
  `local_name` varchar(255) DEFAULT NULL,
  `type` char(2) DEFAULT NULL,
  `geo_lat` double(18,11) DEFAULT NULL,
  `geo_lng` double(18,11) DEFAULT NULL,
  `db_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112265 ;

-- --------------------------------------------------------

--
-- Structure de la table `ROLE`
--

DROP TABLE IF EXISTS `ROLE`;
CREATE TABLE IF NOT EXISTS `ROLE` (
  `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(32) NOT NULL,
  PRIMARY KEY (`ROLE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=796 ;

-- --------------------------------------------------------

--
-- Structure de la table `USER`
--

DROP TABLE IF EXISTS `USER`;
CREATE TABLE IF NOT EXISTS `USER` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ACTIVE` int(11) NOT NULL,
  `EMAIL_ID` varchar(128) DEFAULT NULL,
  `IMAGE_URL` varchar(255) DEFAULT NULL,
  `NAME` varchar(32) DEFAULT NULL,
  `PASSWORD` varchar(64) NOT NULL,
  `PHONE` varchar(255) DEFAULT NULL,
  `PROVIDER` varchar(32) NOT NULL,
  `USER_ID` varchar(255) NOT NULL,
  `FIRSTNAME` varchar(32) DEFAULT NULL,
  `LASTNAME` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_14gnfgpc99rjbsj983ixsp2p0` (`USER_ID`),
  UNIQUE KEY `UK_pwd98kubff60isq4y57k7o6bv` (`PHONE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1041 ;

-- --------------------------------------------------------

--
-- Structure de la table `USER_ROLE`
--

DROP TABLE IF EXISTS `USER_ROLE`;
CREATE TABLE IF NOT EXISTS `USER_ROLE` (
  `USER_ID` bigint(20) NOT NULL,
  `ROLE_ID` int(11) NOT NULL,
  PRIMARY KEY (`USER_ID`,`ROLE_ID`),
  KEY `FK_oqmdk7xj0ainhxpvi79fkaq3y` (`ROLE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `colis`
--
ALTER TABLE `colis`
  ADD CONSTRAINT `FK_b02auxa2sjc181hp60dpb6k6m` FOREIGN KEY (`user_id`) REFERENCES `USER` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_c7aoa6cprt6i4qhky8k7tiyot` FOREIGN KEY (`userTo_id`) REFERENCES `USER` (`id`),
  ADD CONSTRAINT `FK_iew5a8swtmknyp3akiijtn0ko` FOREIGN KEY (`userFrom_id`) REFERENCES `USER` (`id`);

--
-- Contraintes pour la table `USER_ROLE`
--
ALTER TABLE `USER_ROLE`
  ADD CONSTRAINT `FK_j2j8kpywaghe8i36swcxv8784` FOREIGN KEY (`USER_ID`) REFERENCES `USER` (`id`),
  ADD CONSTRAINT `FK_oqmdk7xj0ainhxpvi79fkaq3y` FOREIGN KEY (`ROLE_ID`) REFERENCES `ROLE` (`ROLE_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;