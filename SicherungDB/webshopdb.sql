-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Jan 2024 um 14:23
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `webshopdb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id_product`, `product_name`, `price`) VALUES
(1, 'Controller for PS', 200),
(2, 'Controller for Xbox', 200),
(3, 'Headset', 100);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `telephone_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `firstname`, `lastname`, `telephone_number`) VALUES
(1, 'Daemon', 'riccardomirabito03@gmail.com', '$2y$10$ZG1Wh/hVt60zOaDt8HHT/esngseDKotJySDevsNsY25fy/wi77QvO', 'Riccardo', 'Mirabito', '06643232326'),
(2, 'Lilith', 'MiotheLilithCat23@cmail.cat', '$2y$10$p646AbN.x6kMjTOSxtHBm.HRjwYjn6.Rx1hptq6YKXLTZmiKUlwD6', 'Mio', 'Cat', '99977700654'),
(3, 'RicoMio', 'Ricomio@mio.cat', '$2y$10$2oqbHmf9XklwZTXjlSeMO.UIHP5ih.1ZsADhtYSNNPBgrDyg1prnu', 'Rico', 'Mio', '0666999584'),
(4, 'testin', 'test@test.tst', '$2y$10$iJg/HROXpsmLTPIMoRkfSezavR4l4BnPqUjet1Fx5uIZ3nivU5.eS', 'test', 'test', '0123456789'),
(5, 'test', 'test@test.test', '$2y$10$KiTcbv4G/7zq60YhA62Sp.TN3qw9/ibhQ8Tym93brswq8rNAVAG7C', 'test1', 'test2', '0000666677777'),
(6, 'Daemon', 'riky.sephirot666@hotmail.it', '$2y$10$eGQ9U.Wo6Ldafo2OZVknNOWc0sOZm6PAk4Y950Dwz37XoqHXN3gUy', 'Riccardo', 'Mirabito', '06643298666');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
