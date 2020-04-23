-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 apr 2020 om 14:15
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
(5, 'fg', 'GBpBt7uSgwV@g)aLbn'),
(6, 'ssssssss', '04d1c0bd7deef97af6ddd973292d090b'),
(8, 'gdfg', '04d1c0bd7deef97af6ddd973292d090b');

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
(1, 'headsets', 'headsets', 1),
(2, 'grafische kaarten', 'set grafische kaarten', 1),
(3, 'overige elektronica', 'overige die er niet bij pastte', 1),
(4, 'extra', 'extra items', 1);

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

--
-- Gegevens worden geëxporteerd voor tabel `customer`
--

INSERT INTO `customer` (`id`, `gender`, `firstname`, `middlename`, `lastname`, `street`, `housenumber`, `housenumber_addon`, `zippcode`, `city`, `phone`, `e-mailadres`, `password`, `newsletter_subscription`) VALUES
(2, 1, 'Jordan', '', 'Bellford', 'diezesstraat', 22, '', '1234a', 'utrecht', '06123456789', 'test@gmail.com', '123', 1);

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
(1, 'jbl', 'Geniet onderweg van muziek met de JBL E65BT NC. Je verbindt de koptelefoon via bluetooth met je smartphone of tablet. Vervolgens luister je 15 uur onafgebroken naar je favoriete nummers. De actieve noise cancelling zorgt ervoor dat storende omgevingsgeluiden licht worden gedempt. Wanneer de batterij leeg is, kun je na 2 uur laden 15 uur genieten van je muziek. Ben je klaar met luisteren? Dan vouw je de hoofdtelefoon eenvoudig op en stop je hem in je tas', 1, '99.99', 'zwart', 300, 1),
(2, 'Nintendo Switch', 'Deze geüpgrade Nintendo Switch heeft een betere accuduur waardoor je langer gamet onderweg. De Switch is op 3 verschillende manieren te gebruiken. Plaats de Switch in het docking station en je speelt je games op de grote tv in de huiskamer. Gebruik je de console onderweg? Dan speel je met de controllers aan weerszijde van het scherm van 6.2 inch, vergelijkbaar met de Wii U Gamepad. Koppel de 2 joy-con controllers los en je speelt met zijn tweetjes, elk met één van de controllers. Beschik je over meer dan 2 controllers, dan speel je met maximaal 4 spelers op 1 Nintendo Switch.', 2, '400.00', 'wit', 300, 1),
(3, 'gpu', 'Speel je favoriete games in QHD of zelfs 4K met de MSI GeForce RTX 2070 Super Ventus OC. Deze krachtige videokaart heeft een turbo kloksnelheid van 1785 MHz. Hierdoor is gamen in QHD geen probleem. Sommige games, zoals Fifa of Apex speel je zelfs in 4K. Dankzij 8GB aan GDDR6 VRAM voer je meerdere grafische taken tegelijk uit. Stream bijvoorbeeld sportuitzendingen terwijl je gamet. De RTX 2070 Super chipset is NVIDIA\'s opvolger van de RTX 2070. Deze Super-versie heeft meer rekenkernen en een hogere kloksnelheid dan zijn voorganger. Deze gpu heeft 2 fans, waardoor deze minder snel heet wordt. De gekoelde backplate helpt hierbij en voorkomt verbuigingen.', 3, '150.00', 'wit', 400, 1),
(4, 'Sony', 'Met de Sony WH-1000XM3 draadloze koptelefoon geniet je 38 uur van een helder en gedetailleerd geluid. Via bluetooth verbind je het ontwerp met je smartphone of tablet. Zo luister je draadloos naar je favoriete muziek. Wanneer je de aanpasbare noise cancelling inschakelt, heb je geen last van geluiden van buitenaf. Hierdoor reis je in alle rust of elimineer je storende geluiden op kantoor. Via de app schakel je Smart Listening in. Na het detecteren van je activiteit past deze functie de sterkte van de noise cancelling aan. Door het frequentiebereik van 4 tot 40.000 Hertz geniet je van hi res audio. Hierdoor ontgaat geen enkel detail je en hoor je alle nuances van de bastonen en hoge geluiden.', 2, '400.00', 'zwart', 350, 1),
(5, 'beats', 'Kabels zijn verleden tijd met de Beats Studio3 Wireless hoofdtelefoon. De noise cancelling hoofdtelefoon maakt een bluetooth verbinding met je smartphone, tablet of laptop. Met 1 druk op de knop schakel je de actieve ruisonderdrukking in. Zo geniet je maximaal van je muziek in de trein of het vliegtuig. Dankzij de W1 chip van Apple ben je snel verbonden met meerdere Apple apparaten. Wanneer je in de trein zit, maakt de koptelefoon automatisch verbinding met je iPhone. Eenmaal aangekomen op kantoor? Dan maakt de hoofdtelefoon automatisch verbinding met de iMac waar jij op werkt. Dankzij de Fast Fuel techniek laad je de hoofdtelefoon binnen een kwartier weer op voor 3 uur luisterplezier.', 4, '290.00', 'zwart', 250, 1),
(6, 'airpods', 'Met Apple AirPods 2 Met Charging Case spreek je Siri aan, zonder dat je op de oordopjes hoeft te tikken. Dit werkt nu gewoon spraakgestuurd, net zoals bij iPhone. Apple AirPods gaan automatisch aan als je ze in je oren stopt en pauzeren wanneer je ze uitdoet. Met de Apple H1 chip is de draadloze verbinding met je apparaat stabieler en wissel je sneller tussen verschillende apparaten. De charging case laad je op met de meegeleverde lightning naar usb oplaadkabel.', 4, '160.00', 'wit', 160, 1),
(7, 'pc', 'De HP Pavilion TP01-0950nd is een pc voor het bewerken van je foto\'s, het doen van de administratie of het bijhouden van je mailbox. Via de 256 GB SSD start deze pc in enkele seconden op, waarna je meteen aan het werk gaat. Welk programma je ook installeert op de pc, binnen een paar seconden start de SSD deze voor je op. Lang wachten is dan ook verleden tijd. Voor overige data heb je een extra 1 TB harde schijf ingebouwd. Heb je behoefte aan meer opslagruimte? Gebruik dan de schroefjes en plaats een extra harde schijf erbij. Zo gebruik je deze HP over een tijdje nog steeds. En of je hem nu op of onder je bureau wil hebben, door zijn compacte formaat plaats je hem waar je maar wil zonder dat hij in de weg staat.', 3, '950.00', 'wit', 900, 1),
(8, 'smartwatch', 'Waak over je gezondheid met verbeter deze met de Garmin Vivoactive 4. Naast standaard gegevens meet het ook je fitnessleeftijd aan de hand van een VO2 max meting. Het horloge maakt sporten en gezonder leven gemakkelijk met meer dan 20 sportapps en geanimeerde workouts voor onder andere cardio, kracht en yoga. Bekijk hoe jouw lichaam zich houdt tijdens een zware training door te kijken naar je hartslag, ademhalingen per minuut en zuurstofniveau. Voor motivatie tijdens het sporten luister je naar muziek die je vooraf downloadt via Spotify, Amazon Music of Deezer. Handig, want nu laat je jouw telefoon veilig thuis. De batterij gaat tot 8 dagen mee in smartwatchmodus en 6 uur met gps en muziek aan.', 3, '270.00', 'wit', 850, 1),
(9, 'bose', 'De Bose Noise Cancelling Headphones 700 is iets voor jou wanneer je waarde hecht aan een hoge geluidskwaliteit en krachtige noise cancelling. Dankzij de actieve noise cancelling dempt deze draadloze koptelefoon omgevingsgeluiden. Hierdoor luister je ongestoord naar je favoriete muziek, waar je ook bent. Je past de noise cancelling naar eigen smaak aan dankzij de 11 niveaus. Zo schakel je per omgeving of situatie naar jouw voorkeursstand of deactiveer je de noise cancelling volledig. Je bent goed verstaanbaar door de 4', 2, '140.00', 'wit', 300, 1);

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
(1, 1, 'airpods.jpg', 1),
(2, 2, 'buitenlamp.jpg', 1),
(3, 2, 'buitenlamp2.jpg', 1),
(4, 3, 'gans.jpg', 1),
(5, 2, 'giraf.jpg', 1),
(6, 2, 'giraf2.jpg', 1),
(7, 4, 'hektar.jpg', 1),
(8, 4, 'jesse.png', 1),
(9, 4, 'lampje.jpg', 1),
(10, 3, 'llahra.png', 1),
(11, 3, 'struisvogel.jpg', 1),
(12, 11, 'img/Naamloos-1.jpg', 1),
(13, 11, 'img/Naamloos-1.jpg', 1),
(14, 12, 'img/Naamloos-1.jpg', 1),
(15, 12, 'img/Naamloos-1.jpg', 1),
(16, 12, 'img/cases.png', 1),
(17, 13, 'img/wallhaven-lq8ooq', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(100) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `street` varchar(70) NOT NULL,
  `housenumber` int(4) NOT NULL,
  `housenumber_addon` varchar(4) NOT NULL,
  `zipcode` varchar(8) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `delivery` enum('ophalen','bezorgen_thuis','bezorgen_anders','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customer_id`, `date`, `street`, `housenumber`, `housenumber_addon`, `zipcode`, `city`, `country`, `paid`, `delivery`) VALUES
(0, 1, '2020-03-30 00:00:00', 'ander aflever adres straatnaam', 123, 'bis', '1234ab', 'utrecht', 'nederland', 1, ''),
(1, 2, '0000-00-00 00:00:00', 'heuvelstraat', 50, '', '3544ER', 'Utrecht', 'Nederland', 1, 'ophalen'),
(2, 3, '2020-04-15 00:00:00', 'vogelstraat', 41, '', '6332OP', 'Groningen', 'Nederland', 1, 'bezorgen_thuis');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id` int(50) NOT NULL,
  `order_id` int(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id`, `order_id`, `product_id`, `amount`) VALUES
(1, 1, 5, 3),
(2, 1, 7, 1),
(3, 1, 6, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`) VALUES
(1, 'airpods', 'airpods.jpg', 100.00),
(2, 'beats audio', 'beats.jpg', 299.00),
(3, 'sony', 'sony.jpg', 125.00),
(4, 'jbl', 'jbl.jpg', 150.00),
(5, 'bose', 'bose.jpg', 50.00),
(6, 'nintendo', 'nintendo.jpg', 475.00),
(7, 'gpu', 'gpu.jpg', 130.00),
(8, 'smartwatch', 'smartwatch.jpg', 250.00),
(9, 'pc', 'pc.jpg', 750.00),
(10, 'iphone', 'iphone.jpg', 650.00),
(11, 'tv', 'tv.jpg', 900.00);

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
(9, 'jan', 'van', 'os', '1986-05-02', 'jos@glu.nl', '827ccb0eea8a706c4c34a16891f84e7b'),
(11, 'first', 'middle', 'last', '2020-01-01', 'test', '$2y$10$.j4pnLOoBq6Uf.I2/8yXv.TeMLE4BGO3XYSBxy3b4XaeC7Y1/NYqC'),
(12, 'first', 'middle', 'last', '2020-01-01', 'test2', '$2y$10$jRGROADiy0bTIGkEgnRPp.aQkNtWPY7OkSPu2DzOuF/pJbwMuZe9q'),
(38, 'mister', '?', '?', '2020-01-01', '', '123456'),
(39, '1234', '?', '?', '2020-01-01', '$2y$10$V51NQ2ABaT96o', '?'),
(40, 'don', 'test', 'Draper', '2020-01-01', 'Luca', '$2y$10$YOJW4bnpufM6F/5wWYx.zeXfVpIUcJ0VCg4g54Q64Efe9bpfM1XqC'),
(41, 'mike', 'erw', 'test', '2020-01-01', 'mike@gmail.com', '$2y$10$vlQ4lT2KhFSfNeprddH9..EjMapJiRJr6OATqC20bdMSHFPm9/XC2'),
(42, 'qwerty', 'qw', 'qwerty', '2020-01-01', 'qwerty@gmail.com', '$2y$10$C6syWrIUyUMtkzgkQtl0UODiWaSpi3LwIKEtheZAKNuMr9fCQpJ/C'),
(43, 'officieel', 'ja', 'nee', '2020-01-01', 'uhum@gmail.com', '$2y$10$uq70XqywZT09CwZxxOpOO.JivNVKxRthpvVEiS5lsD1956QC/NFCy'),
(44, 'lol', 'pop', 'dinges', '2020-01-01', 'glu@gmail.com', '$2y$10$Q2d8Ekx07br6uhclnYCjq.EVgy/dPw2Au4MMgvwNIb0v3Bql31El.'),
(45, 'piet', 'asdds', 'kjk', '2020-01-01', 'piet123@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e'),
(46, 'qws', 'qwa', 'sdf', '2020-01-01', 'zxcv@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(47, 'admin', 'luca', 'ciappa', '2020-01-01', 'admin@gmail.com', '426d8166a1cf619f353c16a24972c10c');

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
-- Indexen voor tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_product`
--
ALTER TABLE `tbl_product`
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
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
