-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 11 Décembre 2023 à 20:37
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cv_database`
--

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

CREATE TABLE IF NOT EXISTS `cv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `apropos` varchar(255) NOT NULL,
  `competences` varchar(255) NOT NULL,
  `experience` text,
  `education` varchar(255) NOT NULL,
  `projets` varchar(255) NOT NULL,
  `recommandations` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cv_Filename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `cv`
--

INSERT INTO `cv` (`id`, `nom`, `email`, `apropos`, `competences`, `experience`, `education`, `projets`, `recommandations`, `image`, `cv_Filename`) VALUES
(1, 'CÃ©cilia Emmanuelle emma', 'boukaka.ceciliaemmanuelle@gmail.com', '', '', 'Hello, je m''appelle Boukaka CÃ©cilia Emmanuelle', '', '', '', 'OIP.jpeg', 'cv_cecilia_fr.pdf'),
(3, 'Samba', 'samba@gmail.fr', '', '', 'cccccc', '', '', '', 'youtube.png', 'cv_cecilia_ang.pdf'),
(4, 'Bikoumou', 'bik@gmail.fr', '', '', 'cccccc', '', '', '', 'a2.jpg', 'cv_cecilia_fr.pdf'),
(6, 'Sita', 'sita@gmail.com', '', '', 'J''ai 10 ans d''expÃ©rience', '', '', '', 'photo.png', 'cv_cecilia_ang.pdf'),
(11, 'op', 'pon@gmail.fr', '', '', '2', '', '', '', 'images/3.png', 'cv_cecilia.pdf'),
(12, 'gb', 'gb@gmail.fr', '', '', '3', '', '', '', 'images/a5.jpg', 'cv_cecilia_fr.pdf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
