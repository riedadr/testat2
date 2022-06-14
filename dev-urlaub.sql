-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 15. Jun 2022 um 04:46
-- Server-Version: 5.7.37-log
-- PHP-Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `dev-urlaub`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `urlaub-table`
--

CREATE TABLE `urlaub-table` (
  `id` int(4) UNSIGNED NOT NULL,
  `user` varchar(20) NOT NULL,
  `frage1` tinyint(1) NOT NULL COMMENT 'Warst du bereits in Italien?',
  `frage2` int(3) NOT NULL COMMENT 'Wie viele verschieden Länder hast du bereits besucht?',
  `frage3` set('Bus','Zug','Flugzeug','Auto','Schiff') NOT NULL COMMENT 'Welche Verkehrsmittel hast du bisher benutzt, um an deinen Urlaubsort zu kommen?',
  `frage4` enum('Berge','Meer','Stadt','Land','See') NOT NULL COMMENT 'Wo machst du am liebsten Urlaub?',
  `frage5` varchar(25) NOT NULL COMMENT 'Wo hat es dir bisher am besten gefallen?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `urlaub-table`
--

INSERT INTO `urlaub-table` (`id`, `user`, `frage1`, `frage2`, `frage3`, `frage4`, `frage5`) VALUES
(1, 'Jochen', 1, 3, 'Auto', 'Meer', 'Italien'),
(2, 'Barbara', 0, 5, 'Flugzeug', 'Berge', 'Spanien'),
(3, 'Günther', 1, 2, 'Zug,Auto', 'See', 'Italien'),
(4, 'Heinz', 1, 8, 'Bus,Flugzeug,Auto', 'Land', 'Ungarn'),
(5, 'Ingrid', 1, 7, 'Bus,Zug,Flugzeug,Auto', 'Meer', 'Malta'),
(6, 'Annegreth', 0, 4, 'Bus,Zug,Schiff', 'Stadt', 'Schweiz');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `urlaub-table`
--
ALTER TABLE `urlaub-table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `urlaub-table`
--
ALTER TABLE `urlaub-table`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
