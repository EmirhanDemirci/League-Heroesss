-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 16 apr 2018 om 10:17
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lol champions`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `champions`
--

CREATE TABLE `champions` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `laneid` int(11) NOT NULL,
  `url` text NOT NULL,
  `discription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `champions`
--

INSERT INTO `champions` (`id`, `name`, `laneid`, `url`, `discription`) VALUES
(1, 'Zoe', 1, 'Images/zoe.jpg', 'Deze shampion 1 shot jouw moeder zelfs bouw jij magic resist.'),
(2, 'Ekko', 1, 'Images/Ekko.jpg', 'Deze shampion heeft skill nodig voor jouw moeder'),
(3, 'Yasuo', 0, 'Images/yasuo-nightbringer.png', 'Yasuo can 1 shot enemies'),
(4, 'Ahri', 1, 'Images/ahri-classic.png', 'The Hidden Fox'),
(5, 'Syndra', 1, 'Images/syndra-star-guardian.png', 'Darkness'),
(6, 'Ziggs', 1, 'Images/ziggs-master-arcanist.png', 'Throwing Bombs'),
(7, 'GangPlank', 0, 'Images/gangplank-classic.png', 'Throwing Barrels'),
(8, 'Jayce', 0, 'Images/jayce-classic.png', '2 Weapons'),
(9, 'Malphite', 0, 'Images/malphite.png', 'ROCK ROCK ROCK'),
(10, 'Nasus', 0, 'Images/nasus-infernal.png', 'Q Q Q Q Q Q PENTHAKILL'),
(11, 'Jinx', 2, 'Images/jinx-star-guardian.png', 'GET JINXED!!'),
(12, 'Xayah', 2, 'Images/Xayah_Splash_Tile_0.jpg', 'New ADC'),
(13, 'Jhin', 2, 'Images/jhin.png', 'Sniper'),
(14, 'Caitlyn', 2, 'Images/caitlyn-pulsefire.png', 'Sniper 2.0'),
(15, 'Kog\'Maw', 2, 'Images/kogmaw-pugmaw.png', 'TUF TUF TUF'),
(16, 'LeeSin', 3, 'Images/lee-sin-god-fist.png', 'Your will My hands'),
(17, 'Rengar', 3, 'Images/rengar-night-hunter.png', '1 Shot jungler'),
(18, 'WarWick', 3, 'Images/warwick.png', 'WOOF'),
(19, 'Kha\'Zix', 3, 'Images/khazix-death-blossom.png', 'Fear is good'),
(20, 'Volibear', 3, 'Images/volibear-runeguard.png', 'Electricity'),
(21, 'Karma', 4, 'Images/karma.png', 'ap support'),
(22, 'Janna', 4, 'Images/summoner-icon-sacred-sword-janna.png', 'Janna Tornado'),
(23, 'Rakan', 4, 'Images/artworks-000217181833-x0zdig-t500x500.jpg', 'Xayah\'s Husband'),
(24, 'BlitzCrank', 4, 'Images/blitzcrank-classic.png', 'PULL'),
(25, 'Thresh', 4, 'Images/thresh-classic.png', 'Pull 2.0');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `Name` text NOT NULL,
  `rating` int(3) NOT NULL,
  `champions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `comments`
--

INSERT INTO `comments` (`id`, `comment`, `Name`, `rating`, `champions_id`) VALUES
(1, 's', 'q', 3, 1),
(2, 'dqwd', 'wdq', 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lanes`
--

CREATE TABLE `lanes` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `lanes`
--

INSERT INTO `lanes` (`id`, `name`, `url`) VALUES
(1, 'Top Lane', 'Images/Top_icon.png'),
(2, 'Mid Lane', 'Images/mid.png'),
(3, 'Bot Lane', 'Images/bot.png'),
(4, 'Jungle', 'Images/images.png'),
(5, 'Support', 'Images/supp.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `Name` text NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`Name`, `wachtwoord`) VALUES
('Nassim', 'beraad19');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `champions`
--
ALTER TABLE `champions`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `lanes`
--
ALTER TABLE `lanes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `champions`
--
ALTER TABLE `champions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `lanes`
--
ALTER TABLE `lanes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
