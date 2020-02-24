-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 01:51 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosmetic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`id`, `user`, `pass`) VALUES
(4, 'helena', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `lozinka` varchar(50) CHARACTER SET latin2 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `mobitel` varchar(15) CHARACTER SET latin2 NOT NULL,
  `ime` varchar(50) CHARACTER SET latin2 NOT NULL,
  `prezime` varchar(50) CHARACTER SET latin2 NOT NULL,
  `user_type` varchar(50) CHARACTER SET latin2 NOT NULL,
  `status` enum('1','0') CHARACTER SET latin2 NOT NULL,
  `adresa` varchar(50) CHARACTER SET latin2 NOT NULL,
  `created` datetime(6) NOT NULL,
  `modified` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `lozinka`, `email`, `mobitel`, `ime`, `prezime`, `user_type`, `status`, `adresa`, `created`, `modified`) VALUES
(1, '12345', 'helenazeko@live.com', '0', 'helena', 'aaa', 'admin', '', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, '1234', 'helenazeko@live.com', '0', 'helena', 'aaa', '', '', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, '11111', 'hell@gmail.com', '0', 'hell', 'ttt', '', '', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, '12345', 'helenazeko@live.com', '0', 'helenazeko@live.com', 'aaa', '', '', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(5, 'ananovakovic', 'ana2novakovic@gmail.com', '', 'Ana', 'Novakovic', '', '1', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(6, '11111', 'hell@gmail.com', '', 'helena', 'zeko', '', '1', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(7, '', 'hel@gmail.com', '4535456', 'helena', 'zeko', '', '1', 'Trnovaca', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(8, '', 'helenazeko@live.com', '4535456', 'helena', 'zeko', '', '1', 'Trnovaca', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(9, 'tomo', 'tom@gmail.com', '', 'tomo', 'zeko', '', '1', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `narudzba`
--

CREATE TABLE `narudzba` (
  `id` int(11) NOT NULL,
  `status` enum('u tijeku','zavrseno','otkazano','') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime(6) NOT NULL,
  `kupac_id` int(11) NOT NULL,
  `grand_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `narudzba`
--

INSERT INTO `narudzba` (`id`, `status`, `created`, `kupac_id`, `grand_total`) VALUES
(1, 'u tijeku', '2020-02-15 15:09:43.000000', 7, 20),
(2, 'u tijeku', '2020-02-15 15:32:12.000000', 8, 40);

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) CHARACTER SET latin2 NOT NULL,
  `opis` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cijena` float NOT NULL,
  `slika` varchar(255) NOT NULL,
  `kolicina` int(50) NOT NULL,
  `created` datetime(6) NOT NULL,
  `modified` datetime(6) NOT NULL,
  `status` enum('1','0') CHARACTER SET latin2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`id`, `naziv`, `opis`, `cijena`, `slika`, `kolicina`, `created`, `modified`, `status`) VALUES
(1, 'Golden Facial Tonic', 'Poboljšava tonus kože. Pomaže pri umanjenju podo?n', 20, 'slika1.jpeg', 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0'),
(2, 'Dnevna krema za lice', '30ml, prirodno i bez štetnih sastojaka . Zdrava i ', 37, 'slika2.jpeg', 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0'),
(3, 'Noćna krema za lice', '30ml, pomaže u prevenciji bora, pomla?uje kožu.', 40, 'slika3.jpeg', 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `stavka_narudzbe`
--

CREATE TABLE `stavka_narudzbe` (
  `id` int(11) NOT NULL,
  `proizvod_id` int(11) NOT NULL,
  `narudzba_id` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stavka_narudzbe`
--

INSERT INTO `stavka_narudzbe` (`id`, `proizvod_id`, `narudzba_id`, `kolicina`) VALUES
(1, 1, 1, 1),
(2, 3, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kupac_id` (`kupac_id`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stavka_narudzbe`
--
ALTER TABLE `stavka_narudzbe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `narudzba_id` (`narudzba_id`),
  ADD KEY `narudzba_id_2` (`narudzba_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `narudzba`
--
ALTER TABLE `narudzba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stavka_narudzbe`
--
ALTER TABLE `stavka_narudzbe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admintable`
--
ALTER TABLE `admintable`
  ADD CONSTRAINT `admintable_ibfk_1` FOREIGN KEY (`id`) REFERENCES `korisnik` (`id`);

--
-- Constraints for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD CONSTRAINT `narudzba_ibfk_1` FOREIGN KEY (`kupac_id`) REFERENCES `korisnik` (`id`);

--
-- Constraints for table `stavka_narudzbe`
--
ALTER TABLE `stavka_narudzbe`
  ADD CONSTRAINT `stavka_narudzbe_ibfk_1` FOREIGN KEY (`narudzba_id`) REFERENCES `narudzba` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
