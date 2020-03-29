-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Mrz 2020 um 19:08
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_patrick_petadoption`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `adopt`
--

CREATE TABLE `adopt` (
  `id_a` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `location` text DEFAULT NULL,
  `img` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `descr` text NOT NULL,
  `website` varchar(30) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `status` enum('Available','Not available','','') NOT NULL,
  `hobbies` text DEFAULT NULL,
  `senior` enum('yes','no','','') NOT NULL,
  `date` date DEFAULT NULL,
  `size` enum('small','big','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `animals`
--

INSERT INTO `animals` (`id`, `location`, `img`, `name`, `descr`, `website`, `age`, `status`, `hobbies`, `senior`, `date`, `size`) VALUES
(1, '48.181982, 16.302548', 'https://southerntimesafrica.com/uploads/elephants2', 'Benjamin', 'Grey, big, large trunk', NULL, 15, 'Available', 'Playing with mud', 'yes', '2020-03-30', 'big'),
(4, '48.231524, 16.356211', 'https://i.imgur.com/4AiXzf8.jpg', 'Lucy', 'Likes cash money', 'http://www.imgur.com', 3, 'Available', '', 'no', '0000-00-00', 'small'),
(5, '31.776574, 35.227652', 'https://i.imgur.com/H37kxPH.jpg', 'Jack', 'Brave soldier. Defending the holy land.', 'http://www.imgur.com', 8, 'Available', '', 'yes', '2020-04-01', 'small'),
(6, '43.659418, 14.624548', 'https://i.imgur.com/Pv4FV6b.jpg', 'Flipper', 'Likes it wet.', 'http://www.imgur.com', 1, 'Available', '', 'no', '0000-00-00', 'small'),
(7, '48.489128, 16.469864', 'https://i.imgur.com/AKspq6C.jpg', 'Charlie', 'Fury Scottish Highland Cow', '', 2, 'Available', 'Eating grass and running around', 'no', '0000-00-00', 'big'),
(8, '29.169394, 31.178211', 'https://i.imgur.com/NZpzV.jpg', 'Hippo ', 'Better have a lot of space.', '', 10, 'Available', 'Swimming, relaxing and killing things.', 'yes', '2020-04-01', 'big'),
(9, '48.256070, 16.400679', 'https://i.imgur.com/8cjpZrq.jpg', 'Deathbringer', 'Scary looking horse', '', 10000, 'Available', 'Bringer of misfortune', 'yes', '2099-12-31', 'big'),
(10, '-33.685815, 150.591371', 'https://i.imgur.com/9pkJCN8.jpg', 'Raymond', 'The cutest baby koala alive', 'http://www.imgur.com', 1, 'Available', '', 'no', '0000-00-00', 'small');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `name` varchar(50) NOT NULL,
  `joined` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_role` enum('User','Admin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `joined`, `user_role`) VALUES
(5, 'test', 'test@test.de', '$2y$10$rSm7ML6CjOfdxFJHRQyrReBC1zPPIklbxqb/jgXJNaaUe0QnZ.u4a', 'Hans Wurst', '2020-03-29 12:01:03', 'User'),
(6, 'Admin', 'admin@test.com', '$2y$10$I1fpB8Ak8G.jWnopRpXRM.Z0/Navk7Aki1pbX2hkqkAAIqm0J1YFO', 'Administrator', '2020-03-29 17:06:59', 'Admin');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `adopt`
--
ALTER TABLE `adopt`
  ADD PRIMARY KEY (`id_a`);

--
-- Indizes für die Tabelle `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `adopt`
--
ALTER TABLE `adopt`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
