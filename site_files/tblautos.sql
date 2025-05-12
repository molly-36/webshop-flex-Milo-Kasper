-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 mei 2025 om 12:17
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblautos`
--

CREATE TABLE `tblautos` (
  `autoNaam` text NOT NULL,
  `context` text NOT NULL,
  `prijs` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `nummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblautos`
--

INSERT INTO `tblautos` (`autoNaam`, `context`, `prijs`, `image`, `nummer`) VALUES
('opel', 'dikke auto', 500000, 'afbeelding.png', 1),
('kaka', 'aizhdpahzpidh', 24309, 'afbeelding.png', 2),
('maybach s680', 'beste auto', 320000, 'downloads (1).jpg', 3),
('mayb', 'dem', 234, 'downloads (1).jpg', 4);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `tblautos`
--
ALTER TABLE `tblautos`
  ADD PRIMARY KEY (`nummer`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tblautos`
--
ALTER TABLE `tblautos`
  MODIFY `nummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
