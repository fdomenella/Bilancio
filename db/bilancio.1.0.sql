-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 13, 2017 alle 18:34
-- Versione del server: 5.7.14
-- Versione PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bilancio`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `budget`
--

CREATE TABLE `budget` (
  `anno` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `importo` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `budget`
--

INSERT INTO `budget` (`anno`, `id_cat`, `importo`) VALUES
(2017, 1, '5000.00'),
(2017, 5, '1000.00'),
(2017, 9, '300.00'),
(2017, 2, '0.00'),
(2017, 3, '2000.00'),
(2017, 4, '1000.00'),
(2017, 6, '130.00'),
(2017, 7, '700.00'),
(2017, 8, '300.00'),
(2017, 10, '500.00'),
(2017, 11, '1100.00'),
(2017, 12, '600.00'),
(2017, 13, '600.00'),
(2017, 14, '1000.00'),
(2017, 15, '700.00'),
(2017, 16, '550.00'),
(2017, 17, '1000.00'),
(2017, 18, '100.00'),
(2017, 19, '200.00'),
(2017, 20, '475.00'),
(2017, 21, '1200.00'),
(2017, 22, '100.00'),
(2017, 23, '2000.00'),
(2017, 24, '400.00'),
(2017, 25, '7400.00'),
(2017, 26, '1500.00'),
(2017, 27, '500.00'),
(2017, 28, '720.00'),
(2017, 29, '4500.00'),
(2017, 30, '8600.00');

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Cibo-spesa'),
(2, 'cibo-fuori'),
(3, 'divertimenti'),
(4, 'varie'),
(5, 'casa'),
(6, 'lavanderia'),
(7, 'salute'),
(8, 'capelli'),
(9, 'estetista'),
(10, 'sigarette dany'),
(11, 'sigarette fra'),
(12, 'abbigliamento dany'),
(13, 'abbigliamento fra'),
(14, 'auto dany'),
(15, 'auto fra'),
(16, 'susi'),
(17, 'acquiario'),
(18, 'regali'),
(19, 'telefono'),
(20, 'assicurazione dany'),
(21, 'assicurazione fra'),
(22, 'caffe'),
(23, 'sara'),
(24, 'pannolini'),
(25, 'finanziamenti banca'),
(26, 'lenti a contatto'),
(27, 'tassa casa dany'),
(28, 'sky'),
(29, 'investimenti'),
(30, 'finanziamento auto fra');

-- --------------------------------------------------------

--
-- Struttura della tabella `entrate`
--

CREATE TABLE `entrate` (
  `id` int(11) NOT NULL,
  `data` int(11) NOT NULL,
  `importo` float NOT NULL,
  `nota` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `entrate`
--

INSERT INTO `entrate` (`id`, `data`, `importo`, `nota`) VALUES
(1, 1484002800, 1800, 'stipendio fra');

-- --------------------------------------------------------

--
-- Struttura della tabella `uscite`
--

CREATE TABLE `uscite` (
  `id` int(11) NOT NULL,
  `data` int(11) NOT NULL,
  `importo` decimal(10,2) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nota` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `uscite`
--

INSERT INTO `uscite` (`id`, `data`, `importo`, `id_categoria`, `nota`) VALUES
(1, 1481410800, '120.00', 1, 'simply'),
(2, 1481497200, '120.01', 21, 'assicuraizone'),
(3, 1482188400, '120.22', 16, 'asd'),
(4, 1481410800, '1254.15', 21, 'ba ba'),
(5, 1475359200, '23.00', 1, 'bla bla'),
(6, 1475359200, '23.00', 1, 'bla bla'),
(7, 1475359200, '23.00', 1, 'bla bla'),
(8, 1484002800, '45.00', 1, 'spesa comet'),
(9, 1476136800, '22222.00', 1, ''),
(10, 1483916400, '111111.00', 1, ''),
(11, 1507672800, '4444.00', 1, ''),
(12, 1484521200, '10.00', 4, ''),
(13, 1483916400, '33.00', 6, ''),
(14, 1484002800, '10.00', 6, ''),
(15, 1487804400, '234.00', 1, '');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`anno`,`id_cat`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `entrate`
--
ALTER TABLE `entrate`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `uscite`
--
ALTER TABLE `uscite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `data` (`data`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT per la tabella `entrate`
--
ALTER TABLE `entrate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `uscite`
--
ALTER TABLE `uscite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
