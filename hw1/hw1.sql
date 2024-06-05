-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 05, 2024 alle 22:37
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw1`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `birra`
--

CREATE TABLE `birra` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `prezzo` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `birra`
--

INSERT INTO `birra` (`id`, `nome`, `prezzo`) VALUES
(1, 'Birra Moretti', 2.50),
(2, 'Heineken', 3.00),
(3, 'Ichnusa', 3.50),
(4, 'Peroni', 2.20),
(5, 'Castello', 2.00),
(6, 'Dreher', 2.70),
(7, 'Cristalli di Sale', 3.20);

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `id` int(11) NOT NULL,
  `idutente` int(11) NOT NULL,
  `idprodotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `cocktail`
--

CREATE TABLE `cocktail` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `prezzo` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `cocktail`
--

INSERT INTO `cocktail` (`id`, `nome`, `prezzo`) VALUES
(1, 'ginfizz', 8.00),
(2, 'ginsour', 8.50),
(3, 'pinkgin', 10.00),
(4, 'gindaisy', 7.80),
(5, 'ginsling', 8.20);

-- --------------------------------------------------------

--
-- Struttura della tabella `panini`
--

CREATE TABLE `panini` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `prezzo` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `panini`
--

INSERT INTO `panini` (`id`, `nome`, `prezzo`) VALUES
(1, 'The Speck & Asiago burger', 8.99),
(2, 'Bacon King 3.0 Smokey', 7.49),
(3, 'The Parmiggiano Reggiano Burger', 9.99),
(4, 'Bacon King 3.0', 6.99),
(5, 'Bacon King', 5.99);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `immagine` varchar(255) NOT NULL,
  `prezzo` decimal(10,2) NOT NULL,
  `idutente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id`, `nome`, `immagine`, `prezzo`, `idutente`) VALUES
(99, 'The Parmiggiano Reggiano Burger', 'immagini/parmigiano.png', 9.99, NULL),
(100, 'The Parmiggiano Reggiano Burger', 'immagini/parmigiano.png', 9.99, NULL),
(101, 'The Parmiggiano Reggiano Burger', 'immagini/parmigiano.png', 9.99, NULL),
(102, 'The Speck & Asiago burger', 'immagini/asiago.png', 8.99, NULL),
(103, 'Bacon King 3.0 Smokey', 'immagini/baconking.png', 7.49, NULL),
(104, 'The Parmiggiano Reggiano Burger', 'immagini/parmigiano.png', 9.99, NULL),
(105, 'Bacon King 3.0 Smokey', 'immagini/baconking.png', 7.49, NULL),
(106, 'The Parmiggiano Reggiano Burger', 'immagini/parmigiano.png', 9.99, NULL),
(107, 'Bacon King 3.0', 'immagini/bacon.png', 6.99, NULL),
(108, 'The Speck & Asiago burger', 'immagini/asiago.png', 8.99, NULL),
(109, 'Bacon King 3.0 Smokey', 'immagini/baconking.png', 7.49, NULL),
(110, 'The Parmiggiano Reggiano Burger', 'immagini/parmigiano.png', 9.99, NULL),
(111, 'The Speck & Asiago burger', 'immagini/asiago.png', 8.99, NULL),
(112, 'Bacon King 3.0 Smokey', 'immagini/baconking.png', 7.49, NULL),
(127, 'gindaisy', 'immagini/gindaisy.jpg', 7.80, 4),
(128, 'gindaisy', 'immagini/gindaisy.jpg', 7.80, 4),
(144, 'The Speck & Asiago burger', 'immagini/asiago.png', 8.99, 2),
(145, 'Bacon King 3.0 Smokey', 'immagini/baconking.png', 7.49, 2),
(148, 'The Speck & Asiago burger', 'immagini/asiago.png', 8.99, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `surname`) VALUES
(2, 'pelato', '$2y$10$jUaOQA86HuqlHc0O55VA0Oe0/.8R.YoKbgk0WnjgmqnXsG/lK.MnK', 'aldo@gmail.com', 'aldo', 'baglio'),
(3, 'CR7', '$2y$10$1qaxJH62jDQxakW7nrkisOi/4xp6QyeOU6alE4GB.HFJrhKixck8m', 'cristiano@gmail.com', 'Cristiano', 'Ronaldo'),
(4, 'GUE', '$2y$10$xvi8WSkS75hrcJRCgkqEbOagRLLSLAkKUnHXt8L5o.DPoNDxPuHPW', 'cosimoney@gmail.com', 'cosimo', 'fini'),
(5, 'gabbo', '$2y$10$g5hr1IQ98AP9J4EDqVC3reunb5JXD.bJdYI6xCNCj0czOCj3DUWlG', 'gabri@gmail.com', 'Gabri', 'serra');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `birra`
--
ALTER TABLE `birra`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idutente` (`idutente`),
  ADD KEY `idprodotto` (`idprodotto`);

--
-- Indici per le tabelle `cocktail`
--
ALTER TABLE `cocktail`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `panini`
--
ALTER TABLE `panini`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idutente` (`idutente`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `birra`
--
ALTER TABLE `birra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `cocktail`
--
ALTER TABLE `cocktail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `panini`
--
ALTER TABLE `panini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`idutente`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carrello_ibfk_2` FOREIGN KEY (`idprodotto`) REFERENCES `prodotti` (`id`);

--
-- Limiti per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  ADD CONSTRAINT `fk_idutente` FOREIGN KEY (`idutente`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
