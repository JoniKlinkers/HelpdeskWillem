-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 07 sep 2018 om 13:11
-- Serverversie: 5.7.21
-- PHP-versie: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblbericht`
--

DROP TABLE IF EXISTS `tblbericht`;
CREATE TABLE IF NOT EXISTS `tblbericht` (
  `BerichtId` int(11) NOT NULL AUTO_INCREMENT,
  `GebruikerId` int(11) NOT NULL,
  `TicketId` int(11) NOT NULL,
  `BerichtInhoud` text NOT NULL,
  `BerichtDatum` date NOT NULL,
  PRIMARY KEY (`BerichtId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblbijlagen`
--

DROP TABLE IF EXISTS `tblbijlagen`;
CREATE TABLE IF NOT EXISTS `tblbijlagen` (
  `BijlageId` int(11) NOT NULL AUTO_INCREMENT,
  `BerichtId` int(11) NOT NULL,
  `BijlageURL` text NOT NULL,
  PRIMARY KEY (`BijlageId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblcategorie`
--

DROP TABLE IF EXISTS `tblcategorie`;
CREATE TABLE IF NOT EXISTS `tblcategorie` (
  `CategorieId` int(11) NOT NULL AUTO_INCREMENT,
  `CategorieNaam` text NOT NULL,
  PRIMARY KEY (`CategorieId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblfaq`
--

DROP TABLE IF EXISTS `tblfaq`;
CREATE TABLE IF NOT EXISTS `tblfaq` (
  `FAQId` int(11) NOT NULL AUTO_INCREMENT,
  `FAQVraag` text NOT NULL,
  `FAQAntwoord` text NOT NULL,
  PRIMARY KEY (`FAQId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblgebruikers`
--

DROP TABLE IF EXISTS `tblgebruikers`;
CREATE TABLE IF NOT EXISTS `tblgebruikers` (
  `GebruikerId` int(11) NOT NULL AUTO_INCREMENT,
  `GebruikerEmail` text NOT NULL,
  `GebruikerNaam` text NOT NULL,
  `GebruikerWW` text NOT NULL,
  `GebruikerType` int(11) NOT NULL DEFAULT '0',
  `GebruikerPrestatie` int(11) NOT NULL DEFAULT '0',
  `GebruikerAvatar` text NOT NULL,
  `Online` int(11) NOT NULL,
  PRIMARY KEY (`GebruikerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblticket`
--

DROP TABLE IF EXISTS `tblticket`;
CREATE TABLE IF NOT EXISTS `tblticket` (
  `TicketId` int(11) NOT NULL AUTO_INCREMENT,
  `GebruikerId` int(11) NOT NULL,
  `CategorieId` int(11) NOT NULL,
  `Vraag` text NOT NULL,
  `TicketDatum` date NOT NULL,
  `Status` text NOT NULL,
  `Prioriteit` int(11) NOT NULL,
  `Moeilijk` int(11) NOT NULL,
  `Feedback` text NOT NULL,
  PRIMARY KEY (`TicketId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
