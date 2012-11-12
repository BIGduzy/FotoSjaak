-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 05 nov 2012 om 08:53
-- Serverversie: 5.5.24-log
-- PHP-versie: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `fotosjaakdb`
--
CREATE DATABASE `fotosjaakdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fotosjaakdb`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(12) NOT NULL,
  `Userrole` enum('Root','Sjaak','Customer') NOT NULL,
  `Activated` enum('Yes','No') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(10) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Tussenvoegsel` varchar(10) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Addressnumber` varchar(40) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Zipcode` varchar(10) NOT NULL,
  `Country` varchar(200) NOT NULL,
  `Tel` varchar(13) NOT NULL,
  `Mtel` varchar(13) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
