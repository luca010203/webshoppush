-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 19 mrt 2020 om 10:13
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(1) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'h', ''),
(5, 'fg', 'GBpBt7uSgwV@g)aLbn'),
(6, 'ssssssss', '04d1c0bd7deef97af6ddd973292d090b'),
(8, 'gdfg', '04d1c0bd7deef97af6ddd973292d090b'),
(9, 'dfg', '04d1c0bd7deef97af6ddd973292d090b'),
(10, 'l', '2db95e8e1a9267b7a1188556b2013b33');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `active`) VALUES
(1, 'tafellamp', 'Tafellampen zijn binnenlampen voor op tafel.', 1),
(2, 'buitenlamp', 'buitenlampen zijn voor buiten.', 1),
(3, 'designlamp', 'voor een leuke stijl in je huiskamer.', 1),
(4, 'bureaulamp', 'voor op je bureau.', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `gender` int(1) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `middlename` varchar(10) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `street` varchar(400) NOT NULL,
  `housenumber` int(5) NOT NULL,
  `housenumber_addon` varchar(10) NOT NULL,
  `zippcode` varchar(5) NOT NULL,
  `city` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `e-mailadres` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `newsletter_subscription` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `color` varchar(10) NOT NULL,
  `weight` int(10) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `category_id`, `price`, `color`, `weight`, `active`) VALUES
(1, 'Arstid', 'De lampenkap van textiel geeft een zacht en decoratief licht.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en je een gelijkmatig, gespreid licht wilt.\r\n<br><br>\r\nVoorzien van trekschakelaar.\r\n<br><br>\r\nDit product is CE-gecertificeerd.\r\n\r\nGoed te completeren met andere lampen uit dezelfde serie.', 1, '39.95', 'wit', 300, 1),
(2, 'buitenlamp', 'De lampenkap van textiel geeft een zacht en decoratief licht.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en je een gelijkmatig, gespreid licht wilt.\r\n<br><br>\r\nVoorzien van trekschakelaar.\r\n<br><br>\r\nDit product is CE-gecertificeerd.\r\n\r\nGoed te completeren met andere lampen uit dezelfde serie.', 2, '42.00', 'wit', 300, 1),
(3, 'gans-lamp', 'De lampenkap van textiel geeft een zacht en decoratief licht.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en je een gelijkmatig, gespreid licht wilt.\r\n<br><br>\r\nVoorzien van trekschakelaar.\r\n<br><br>\r\nDit product is CE-gecertificeerd.\r\n\r\nGoed te completeren met andere lampen uit dezelfde serie.', 3, '52.00', 'wit', 400, 1),
(4, 'hektar', 'De lampenkap van textiel geeft een zacht en decoratief licht.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en je een gelijkmatig, gespreid licht wilt.\r\n<br><br>\r\nVoorzien van trekschakelaar.\r\n<br><br>\r\nDit product is CE-gecertificeerd.\r\n\r\nGoed te completeren met andere lampen uit dezelfde serie.', 2, '25.00', 'wit', 350, 1),
(5, 'jesse', 'De lampenkap van textiel geeft een zacht en decoratief licht.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en je een gelijkmatig, gespreid licht wilt.\r\n<br><br>\r\nVoorzien van trekschakelaar.\r\n<br><br>\r\nDit product is CE-gecertificeerd.\r\n\r\nGoed te completeren met andere lampen uit dezelfde serie.', 4, '19.00', 'wit', 100, 1),
(6, 'lampje', 'De lampenkap van textiel geeft een zacht en decoratief licht.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en je een gelijkmatig, gespreid licht wilt.\r\n<br><br>\r\nVoorzien van trekschakelaar.\r\n<br><br>\r\nDit product is CE-gecertificeerd.\r\n\r\nGoed te completeren met andere lampen uit dezelfde serie.', 4, '9.00', 'wit', 99, 1),
(7, 'llahra', 'De lampenkap van textiel geeft een zacht en decoratief licht.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en je een gelijkmatig, gespreid licht wilt.\r\n<br><br>\r\nVoorzien van trekschakelaar.\r\n<br><br>\r\nDit product is CE-gecertificeerd.\r\n\r\nGoed te completeren met andere lampen uit dezelfde serie.', 3, '85.00', 'wit', 900, 1),
(8, 'struisvogel-lamp', 'De lampenkap van textiel geeft een zacht en decoratief licht.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en je een gelijkmatig, gespreid licht wilt.\r\n<br><br>\r\nVoorzien van trekschakelaar.\r\n<br><br>\r\nDit product is CE-gecertificeerd.\r\n\r\nGoed te completeren met andere lampen uit dezelfde serie.', 3, '69.00', 'wit', 850, 1),
(9, 'giraf-lamp', 'De lampenkap van textiel geeft een zacht en decoratief licht.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en je een gelijkmatig, gespreid licht wilt.\r\n<br><br>\r\nVoorzien van trekschakelaar.\r\n<br><br>\r\nDit product is CE-gecertificeerd.\r\n\r\nGoed te completeren met andere lampen uit dezelfde serie.', 2, '39.95', 'wit', 300, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_image`
--

CREATE TABLE `product_image` (
  `id` int(10) NOT NULL,
  `product_id` int(5) NOT NULL,
  `image` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`, `active`) VALUES
(1, 1, 'arstid.jpg', 1),
(2, 2, 'buitenlamp.jpg', 1),
(3, 2, 'buitenlamp2.jpg', 1),
(4, 3, 'gans.jpg', 1),
(5, 2, 'giraf.jpg', 1),
(6, 2, 'giraf2.jpg', 1),
(7, 4, 'hektar.jpg', 1),
(8, 4, 'jesse.png', 1),
(9, 4, 'lampje.jpg', 1),
(10, 3, 'llahra.png', 1),
(11, 3, 'struisvogel.jpg', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `middlename` varchar(10) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `e-mailadres` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `firstname`, `middlename`, `lastname`, `birthdate`, `e-mailadres`, `password`) VALUES
(1, 'luca', '', 'ciappa', '2003-02-01', '532732@student.glu.n', '426d8166a1cf619f353c16a24972c10c'),
(9, 'jan', 'van', 'os', '1986-05-02', 'jos@glu.nl', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `e-mailadres` (`e-mailadres`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
