-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 04:52 PM
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
-- Database: `online_prodaja`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresa_dostave`
--

CREATE TABLE `adresa_dostave` (
  `id_adresa_dostave` int(11) NOT NULL,
  `postanski_broj` int(11) NOT NULL,
  `mjesto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id_kategorija` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_proizvod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_korisnik` int(11) NOT NULL,
  `korisnicko_ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_adresa_dostave` int(11) NOT NULL,
  `uloga` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `narudzba`
--

CREATE TABLE `narudzba` (
  `id_narudzbe` int(11) NOT NULL,
  `id_korisnik` int(11) NOT NULL,
  `nacin_placanja` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `iznos` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `id_proizvod` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cijena` float NOT NULL,
  `vrsta` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_stavka_narudzbe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stavka_narudzbe`
--

CREATE TABLE `stavka_narudzbe` (
  `id_stavka_narudzbe` int(11) NOT NULL,
  `id_narudzbe` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresa_dostave`
--
ALTER TABLE `adresa_dostave`
  ADD PRIMARY KEY (`id_adresa_dostave`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id_kategorija`),
  ADD KEY `id_proizvod` (`id_proizvod`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD UNIQUE KEY `lozinka` (`lozinka`),
  ADD KEY `adresa_dostave_id` (`id_adresa_dostave`);

--
-- Indexes for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD PRIMARY KEY (`id_narudzbe`),
  ADD KEY `id_korisnik` (`id_korisnik`),
  ADD KEY `id_korisnik_2` (`id_korisnik`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`id_proizvod`),
  ADD KEY `id_stavka_narudzbe` (`id_stavka_narudzbe`);

--
-- Indexes for table `stavka_narudzbe`
--
ALTER TABLE `stavka_narudzbe`
  ADD PRIMARY KEY (`id_stavka_narudzbe`),
  ADD KEY `id_narudzbe` (`id_narudzbe`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD CONSTRAINT `kategorija_ibfk_1` FOREIGN KEY (`id_proizvod`) REFERENCES `proizvod` (`id_proizvod`) ON UPDATE CASCADE;

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`id_adresa_dostave`) REFERENCES `adresa_dostave` (`id_adresa_dostave`);

--
-- Constraints for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD CONSTRAINT `narudzba_ibfk_1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON UPDATE CASCADE;

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `proizvod_ibfk_1` FOREIGN KEY (`id_stavka_narudzbe`) REFERENCES `stavka_narudzbe` (`id_stavka_narudzbe`) ON UPDATE CASCADE;

--
-- Constraints for table `stavka_narudzbe`
--
ALTER TABLE `stavka_narudzbe`
  ADD CONSTRAINT `stavka_narudzbe_ibfk_1` FOREIGN KEY (`id_narudzbe`) REFERENCES `narudzba` (`id_narudzbe`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
