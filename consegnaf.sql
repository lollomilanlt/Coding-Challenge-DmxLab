-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 02, 2021 alle 23:12
-- Versione del server: 10.4.17-MariaDB
-- Versione PHP: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consegnaf`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`) VALUES
(2, 'bucato', 'lava i panni'),
(3, 'lavapiatti', 'lava i piatti'),
(7, 'Guida', 'patente'),
(8, 'programmazione', 'java');

-- --------------------------------------------------------

--
-- Struttura della tabella `requests`
--

CREATE TABLE `requests` (
  `users_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `requests`
--

INSERT INTO `requests` (`users_id`, `id`, `status`) VALUES
(9, 1, 'accepted'),
(10, 2, 'refused'),
(25, 20, 'accepted');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `birthDate` date NOT NULL,
  `accountYear` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `shareholder` tinyint(4) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `birthDate`, `accountYear`, `admin`, `shareholder`, `username`, `password`) VALUES
(9, 'ciccio', 'pizzo', 'ciao@gmail.com', '2020-12-27', 2020, 0, 1, 'ciaone', '$2y$10$.U0Ok5N/mhZZ4SDideNXzubu00wgUIkdccrI/vpiCvEAJgMfGaxAW'),
(10, 'Lorenzo', 'Ceglia', 'ceglia.lorenzo@gmail.com', '2015-03-27', 2020, 0, 0, 'lorenzo', '$2y$10$XNBrA.eIAHDY/kTKNE3Vb./zgNr0TWwrQEz9hJ.QpBLvwIedroz3i'),
(13, 'admin', 'admin', 'admin@gnail.com', '2020-12-28', 2020, 1, 0, 'admin', '$2y$10$zYiOtAY6uGSx3a2KH2gpJOrYxUN9YywHbIsdoT0TkRb8uwMDDT4Xe'),
(14, 'share', 'holder', 'share@ciao.it', '2020-12-28', 2020, 0, 1, 'share', '$2y$10$QkUgu9SehBOtGLNyvrtt/O9O11e50AZFJmC1t/kGoNlCgCp4WZ.aa'),
(25, 'boot', 'strap', 'boot@gmail.com', '2005-01-01', 2021, 0, 1, 'bootstrap', '$2y$10$F3rGs3KFT5U9R2/mptG9OuoN7VO7YknTXnLYcwLwThs0N.XN2lTli');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`) USING BTREE;

--
-- Indici per le tabelle `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_id_UNIQUE` (`users_id`),
  ADD KEY `fk_Requests_users_idx` (`users_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `fk_Requests_Users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
