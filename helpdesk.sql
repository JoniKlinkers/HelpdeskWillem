﻿
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
  `SubCategorie` text NOT NULL,
  PRIMARY KEY (`CategorieId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tblcategorie`
--

INSERT INTO `tblcategorie` (`CategorieId`, `CategorieNaam`, `SubCategorie`) VALUES
(1, 'Administratief', 'Login/Passwoord probleem'),
(2, 'Administratief', 'Upload probleem'),
(3, 'Administratief', 'Other'),
(4, 'Technisch', 'Hardware probleem'),
(5, 'Technisch', 'Printer'),
(6, 'Technisch', 'Other'),
(7, 'Netwerk', 'Firewall'),
(8, 'Netwerk', 'LAN'),
(9, 'Netwerk', 'Wireless'),
(10, 'Netwerk', 'Other');
COMMIT;

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
  `Online` int(11) NOT NULL DEFAULT '0',
  `hashpassword` text NOT NULL,
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


