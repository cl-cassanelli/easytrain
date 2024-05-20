-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 20, 2024 alle 18:22
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easytrain`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `anno_produzione` year(4) DEFAULT NULL,
  `genere` varchar(50) DEFAULT NULL,
  `attori_principali` text DEFAULT NULL,
  `trama` varchar(255) NOT NULL,
  `durata` int(10) NOT NULL,
  `cover_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `films`
--

INSERT INTO `films` (`id`, `titolo`, `anno_produzione`, `genere`, `attori_principali`, `trama`, `durata`, `cover_image`) VALUES
(3, 'Interstellar', '2014', 'Fantascienza', 'Matthew McConaughey, Anne Hathaway, Jessica Chastain', 'In un futuro non troppo lontano, l\'umanità cerca una nuova casa nel cosmo a causa della diminuzione delle risorse sulla Terra. Un gruppo di astronauti viene inviato nello spazio per esplorare nuovi pianeti abitabili.', 169, 'https://imgur.com/rq6NjI2'),
(4, 'Inception', '2010', 'Azione', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page', 'Dom Cobb è un esperto di estrazione, un ladro che ruba segreti preziosi dal profondo dell\'inconscio durante il sogno. La sua abilità unica lo ha reso un giocatore ambito nel mondo dello spionaggio industriale, ma gli ha costato tutto ciò che ha mai amato.', 148, 'https://imgur.com/fs3GwMy'),
(5, 'The Shawshank Redemption', '1994', 'Drammatico', 'Tim Robbins, Morgan Freeman, Bob Gunton', 'Racconta la storia di Andy Dufresne, un banchiere che viene condannato all\'ergastolo nella prigione di Shawshank per l\'omicidio della moglie e del suo amante, anche se egli dichiara la sua innocenza.', 142, 'https://imgur.com/vJWAQsY');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(1, 'giuseppecassanelli10@gmail.com', 'cl_cassanelli', 'Test1234'),
(2, 'mail@gmail.com', 'CiaoUser', 'Pino'),
(3, 'fabrizio@hotmail.it', 'fabrizioM', 'Fabrizio');

-- --------------------------------------------------------

--
-- Struttura della tabella `visualizzazioni`
--

CREATE TABLE `visualizzazioni` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `visualizzazioni`
--

INSERT INTO `visualizzazioni` (`id`, `user_id`, `film_id`) VALUES
(1, 1, 3),
(2, 3, 4);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `visualizzazioni`
--
ALTER TABLE `visualizzazioni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `film_id` (`film_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `visualizzazioni`
--
ALTER TABLE `visualizzazioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `visualizzazioni`
--
ALTER TABLE `visualizzazioni`
  ADD CONSTRAINT `visualizzazioni_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `visualizzazioni_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
