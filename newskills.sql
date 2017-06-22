-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 jun 2017 om 13:17
-- Serverversie: 10.1.22-MariaDB
-- PHP-versie: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newskills`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `auteur`
--

CREATE TABLE `auteur` (
  `auteurID` int(2) NOT NULL,
  `naam` varchar(20) NOT NULL,
  `achternaam` varchar(20) NOT NULL,
  `leeftijd` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `auteur`
--

INSERT INTO `auteur` (`auteurID`, `naam`, `achternaam`, `leeftijd`) VALUES
(1, 'Ryan', 'de Echte', 25),
(2, 'Tim', 'Eleveld', 23),
(3, 'Dennis', 'Kraaijkamp', 34);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL,
  `auteurID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `post`
--

INSERT INTO `post` (`postID`, `title`, `message`, `auteurID`) VALUES
(1, 'Mijn eerste blog', 'Dit is mijn boodschap', 1),
(2, 'Mijn tweede blog', 'Dit is er weer een', 1),
(3, 'De Blog van Dennis', 'Dit gaat over mijn leven', 3);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`auteurID`);

--
-- Indexen voor tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `FK_AuteurID` (`auteurID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `auteur`
--
ALTER TABLE `auteur`
  MODIFY `auteurID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_AuteurID` FOREIGN KEY (`auteurID`) REFERENCES `auteur` (`auteurID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
