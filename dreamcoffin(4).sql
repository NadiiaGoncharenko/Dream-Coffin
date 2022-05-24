-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Mai 2022 um 20:06
-- Server-Version: 10.4.19-MariaDB
-- PHP-Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `dreamcoffin`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product`
--

CREATE TABLE `product` (
  `product_name` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `preis` float NOT NULL,
  `kategory` int(1) NOT NULL,
  `beschreibung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`product_name`, `id`, `img`, `preis`, `kategory`, `beschreibung`) VALUES
('coffin', 1, '', 0, 0, NULL),
('urn', 2, '', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `userID` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `plz` varchar(10) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `salutation` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `ort` varchar(255) NOT NULL,
  `roleID` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `email`, `plz`, `adresse`, `salutation`, `lname`, `fname`, `ort`, `roleID`) VALUES
(6, 'hz4', 'mhgf', 'vqv@i.ua', '', '', '', '', '', '', 3),
(7, 'io', 'mnbv', 'vqv@i.ua', '', '', '', '', '', '', 3),
(9, 'wi20b048', 'a', 'vqv@i.ua', 'a', 'a', '1111', 'jg', 'lili', 'a', 3),
(10, 'admin', 'admin', 'admin@gmail.com', '1100', 'Rothgasse 10/1', 'Frau', 'Slava', 'Ukraini', 'Kyiv', 3),
(11, 'n', 'n', 'n', 'Mrs.', 'n', '1', 'n', 'n', 'n', 3),
(12, 'n', 'n', 'n', '1', 'n', 'Mrs.', 'n', 'n', 'n', 3),
(13, 'n', 'n', 'n', '1', 'n', 'Mrs.', 'n', 'n', 'n', 3),
(14, 'n', 'n', 'n', '1', 'n', 'Mrs.', 'n', 'n', 'n', 3),
(15, 'm', 'm', 'm', '1', 'm', 'Mrs.', 'm', 'm', 'm', 3),
(16, 'k', '$2y$10$i78yy0tojA1EnhQG4gWd7ewRT5VNsex0W6mczTHAf1lc42SWFbX0O', 'k', '2', 'k', 'Mrs.', 'k', 'k', 'k', 3);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
