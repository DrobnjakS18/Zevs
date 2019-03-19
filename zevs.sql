-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2019 at 10:24 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zevs`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `id` int(11) NOT NULL,
  `pitanje` varchar(255) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id`, `pitanje`) VALUES
(1, 'Kako biste ocenili ovaj sajt?');

-- --------------------------------------------------------

--
-- Table structure for table `anketa_ocena`
--

CREATE TABLE `anketa_ocena` (
  `id` int(11) NOT NULL,
  `id_a` int(11) NOT NULL,
  `id_o` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `anketa_ocena`
--

INSERT INTO `anketa_ocena` (`id`, `id_a`, `id_o`) VALUES
(30, 1, 5),
(31, 1, 4),
(35, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dani`
--

CREATE TABLE `dani` (
  `id_dani` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `dani`
--

INSERT INTO `dani` (`id_dani`, `naziv`) VALUES
(1, 'Ponedeljak'),
(2, 'Utorak'),
(3, 'Sreda'),
(4, 'Cetvrtak'),
(5, 'Petak'),
(6, 'Subota'),
(7, 'Nedelja');

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

CREATE TABLE `galerija` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `slika_putanja` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `slika_naziv` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `aktivan` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`id`, `naziv`, `slika_putanja`, `slika_naziv`, `alt`, `aktivan`) VALUES
(10, 'Teretana', '../images/1548177629teretana.png', '1548177629teretana.png', 'Teretana', b'1'),
(20, 'Teretana', '../images/1549131192download (1).jpg', '1549131192download (1).jpg', 'Vencanje', b'0'),
(21, 'Traka za trcanje', '../images/15491318521548177647trake_za_trcanje.png', '15491318521548177647trake_za_trcanje.png', 'Traka za trcanje', b'1'),
(22, 'BodyStep', '../images/15491320121548177956bodystep.png', '15491320121548177956bodystep.png', 'BodyStep', b'0'),
(23, 'BodyPump', '../images/15491320901548177997bodypump.png', '15491320901548177997bodypump.png', 'BodyPump', b'0'),
(24, 'Yoga', '../images/15491321391548178065yoga.png', '15491321391548178065yoga.png', 'Yoga', b'0'),
(25, 'Cardio Box', '../images/15491321871548178102cardio_box.png', '15491321871548178102cardio_box.png', 'Cardio Box', b'1'),
(26, 'Bicikli', '../images/15491322271548178270bicikli.png', '15491322271548178270bicikli.png', 'Bicikli', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(10) COLLATE utf32_unicode_ci NOT NULL,
  `prezime` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `godine` int(2) NOT NULL,
  `telefon` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `lozinka` varchar(32) COLLATE utf32_unicode_ci NOT NULL,
  `pol_id` int(2) NOT NULL,
  `uloga_id` int(3) NOT NULL,
  `ponuda_id` int(3) NOT NULL,
  `vazi_od` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vazi_do` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aktivan` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `godine`, `telefon`, `email`, `lozinka`, `pol_id`, `uloga_id`, `ponuda_id`, `vazi_od`, `vazi_do`, `aktivan`) VALUES
(1, 'Admin', 'Admin', 25, 652010936, 'admin@gmail.com', 'b4d1a9de821ccf32107a1f3c846ec5e3', 2, 1, 1, '2019-01-20 17:02:26', '2019-01-20 17:02:26', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik_ocena`
--

CREATE TABLE `korisnik_ocena` (
  `id` int(11) NOT NULL,
  `id_k` int(11) NOT NULL,
  `id_o` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `korisnik_ocena`
--

INSERT INTO `korisnik_ocena` (`id`, `id_k`, `id_o`) VALUES
(3, 1, 5),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ocena`
--

CREATE TABLE `ocena` (
  `id` int(11) NOT NULL,
  `ocena` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `ocena`
--

INSERT INTO `ocena` (`id`, `ocena`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pocetna_tekst`
--

CREATE TABLE `pocetna_tekst` (
  `id` int(11) NOT NULL,
  `tekst` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `id_sport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `pocetna_tekst`
--

INSERT INTO `pocetna_tekst` (`id`, `tekst`, `id_sport`) VALUES
(1, 'BODYPUMP je program koji će izvajati, oblikovati i ojačati vaše celo telo veoma brzo!\r\n                        Fokus je na malim kilažama sa velikim brojem pokreta i zahvaljujući tome sagorećete kalorije,\r\n                        povećaćete snagu, brzo i ', 2),
(2, 'Cardio Boxe je kombinacija borilačkih veština, boksa i aerobika. Ono što je bitno jeste da ne postoji fizički kontakt sa drugom osobom!\r\n                        Svrha treninga je  poboljšanje kardiovaskularnog sistema. Ovaj trening spada u treninge visoko', 4),
(3, 'Tradicija vežbanja više hiljada godina, obuhvata fizičke vežbe i vežbe disanja u cilju poboljšanja kompletnog energetskog stanja čoveka.\r\n                        Praktična disciplina koja povezuje um, telo i duh na potpuno prirodan način. Vežbe deluju na ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pol`
--

CREATE TABLE `pol` (
  `id` int(11) NOT NULL,
  `naziv` varchar(10) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `pol`
--

INSERT INTO `pol` (`id`, `naziv`) VALUES
(1, 'Zenski'),
(2, 'Muski');

-- --------------------------------------------------------

--
-- Table structure for table `ponuda`
--

CREATE TABLE `ponuda` (
  `id` int(11) NOT NULL,
  `ponuda` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `cena` int(4) NOT NULL,
  `bodystep` int(2) NOT NULL,
  `bodypump` int(2) NOT NULL,
  `yoga` int(2) NOT NULL,
  `cardio_box` int(2) NOT NULL,
  `zumba` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `ponuda`
--

INSERT INTO `ponuda` (`id`, `ponuda`, `cena`, `bodystep`, `bodypump`, `yoga`, `cardio_box`, `zumba`) VALUES
(1, 'Starter', 20, 5, 5, 5, 5, 5),
(2, 'Basic', 40, 10, 10, 10, 10, 10),
(3, 'Pro', 60, 15, 15, 15, 15, 15),
(4, 'Unlimited', 80, 20, 20, 20, 20, 20),
(5, 'Starter 2', 25, 7, 7, 7, 7, 7),
(6, 'Basic 2', 45, 12, 12, 12, 12, 12),
(7, 'Pro 2', 65, 17, 17, 17, 17, 17),
(9, 'Unlimited 2', 85, 22, 22, 22, 22, 22);

-- --------------------------------------------------------

--
-- Table structure for table `raspored_dani`
--

CREATE TABLE `raspored_dani` (
  `id_rd` int(11) NOT NULL,
  `id_r` int(11) NOT NULL,
  `id_d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `raspored_dani`
--

INSERT INTO `raspored_dani` (`id_rd`, `id_r`, `id_d`) VALUES
(17, 25, 1),
(18, 26, 1),
(19, 27, 1),
(20, 28, 1),
(21, 29, 1),
(22, 30, 1),
(23, 31, 1),
(24, 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `raspored_treninga`
--

CREATE TABLE `raspored_treninga` (
  `id` int(11) NOT NULL,
  `id_vreme` int(11) NOT NULL,
  `id_sport` int(11) NOT NULL,
  `id_trener` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `raspored_treninga`
--

INSERT INTO `raspored_treninga` (`id`, `id_vreme`, `id_sport`, `id_trener`) VALUES
(25, 1, 1, 30),
(26, 2, 2, 30),
(27, 3, 3, 29),
(28, 4, 4, 30),
(29, 5, 5, 29),
(30, 6, 2, 30),
(31, 7, 1, 30),
(32, 8, 3, 29),
(33, 1, 3, 29),
(34, 2, 1, 30),
(36, 4, 5, 29),
(37, 5, 1, 30),
(39, 7, 3, 29),
(41, 1, 2, 30),
(42, 2, 1, 29),
(45, 5, 3, 29),
(47, 7, 5, 29),
(48, 8, 3, 29),
(49, 1, 2, 30),
(50, 2, 5, 29),
(51, 3, 3, 29),
(53, 5, 4, 29),
(54, 6, 1, 29),
(55, 7, 2, 30),
(56, 8, 3, 30),
(57, 2, 5, 29),
(59, 4, 2, 30),
(60, 5, 5, 29),
(62, 7, 4, 30),
(63, 8, 3, 29),
(65, 3, 2, 30),
(67, 4, 4, 30),
(68, 6, 5, 29),
(70, 7, 3, 29),
(72, 8, 1, 30),
(73, 1, 5, 29),
(76, 2, 4, 29),
(77, 3, 3, 29),
(78, 4, 1, 30),
(80, 5, 5, 29),
(98, 1, 2, 33),
(99, 1, 3, 30),
(100, 3, 5, 29),
(101, 4, 1, 33),
(102, 4, 1, 33),
(103, 3, 4, 29),
(104, 2, 1, 29),
(105, 3, 4, 30),
(106, 6, 1, 30),
(107, 4, 5, 33),
(108, 4, 3, 29),
(109, 6, 3, 29),
(110, 2, 4, 30),
(111, 6, 1, 33),
(112, 3, 2, 29),
(113, 5, 4, 30);

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `id` int(11) NOT NULL,
  `sport` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `ikonica` varchar(255) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`id`, `sport`, `ikonica`) VALUES
(1, 'BodyStep', 'exercise.svg'),
(2, 'BodyPump', 'dumbbell.svg'),
(3, 'Yoga', 'yoga-carpet.svg'),
(4, 'Cardio Box', 'two-boxing-gloves.svg'),
(5, 'Ples', 'ballet.svg');

-- --------------------------------------------------------

--
-- Table structure for table `treneri`
--

CREATE TABLE `treneri` (
  `id` int(11) NOT NULL,
  `ime` varchar(10) COLLATE utf32_unicode_ci NOT NULL,
  `prezime` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `putanja_slike` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `naziv_slike` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `ul_tr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `treneri`
--

INSERT INTO `treneri` (`id`, `ime`, `prezime`, `putanja_slike`, `naziv_slike`, `alt`, `ul_tr_id`) VALUES
(29, 'Nina', 'Ninic', '../../images/15494760191548608027nina_ninic.png', 'images/1548608027nina_ninic.png', 'Nina_Ninic', 2),
(30, 'Mika', 'Mikic', '../images/1548608052mika_mikic.png', 'images/1548608052mika_mikic.png', 'Mika_Mikic', 2),
(33, 'Pera', 'Peric', '../images/15494812561548608000pera_peric.png', 'images/1548608000pera_peric.png', 'Pera_Peric', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trener_sport`
--

CREATE TABLE `trener_sport` (
  `id` int(11) NOT NULL,
  `id_t` int(11) NOT NULL,
  `id_s` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `trener_sport`
--

INSERT INTO `trener_sport` (`id`, `id_t`, `id_s`) VALUES
(14, 30, 1),
(15, 30, 4),
(17, 29, 3),
(18, 29, 3),
(19, 33, 2);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id` int(11) NOT NULL,
  `uloga` varchar(20) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id`, `uloga`) VALUES
(1, 'admin'),
(2, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `uloga_trenera`
--

CREATE TABLE `uloga_trenera` (
  `id` int(11) NOT NULL,
  `ul_trenera` varchar(100) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `uloga_trenera`
--

INSERT INTO `uloga_trenera` (`id`, `ul_trenera`) VALUES
(1, 'Personalni Trener'),
(2, 'Fitnes Instruktor');

-- --------------------------------------------------------

--
-- Table structure for table `vreme`
--

CREATE TABLE `vreme` (
  `id` int(11) NOT NULL,
  `pocetak` varchar(5) COLLATE utf32_unicode_ci NOT NULL,
  `kraj` varchar(5) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `vreme`
--

INSERT INTO `vreme` (`id`, `pocetak`, `kraj`) VALUES
(1, '7:00', '9:00'),
(2, '9:00', '11:00'),
(3, '12:00', '13:00'),
(4, '13:00', '15:00'),
(5, '16:00', '17:00'),
(6, '18:00', '20:00'),
(7, '21:00', '22:00'),
(8, '22:00', '23:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anketa_ocena`
--
ALTER TABLE `anketa_ocena`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_a` (`id_a`),
  ADD KEY `id_o` (`id_o`);

--
-- Indexes for table `dani`
--
ALTER TABLE `dani`
  ADD PRIMARY KEY (`id_dani`);

--
-- Indexes for table `galerija`
--
ALTER TABLE `galerija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `pol_id` (`pol_id`),
  ADD KEY `uloga_id` (`uloga_id`),
  ADD KEY `ponuda_id` (`ponuda_id`);

--
-- Indexes for table `korisnik_ocena`
--
ALTER TABLE `korisnik_ocena`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_k` (`id_k`),
  ADD KEY `id_o` (`id_o`);

--
-- Indexes for table `ocena`
--
ALTER TABLE `ocena`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pocetna_tekst`
--
ALTER TABLE `pocetna_tekst`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sport` (`id_sport`);

--
-- Indexes for table `pol`
--
ALTER TABLE `pol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ponuda`
--
ALTER TABLE `ponuda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raspored_dani`
--
ALTER TABLE `raspored_dani`
  ADD PRIMARY KEY (`id_rd`),
  ADD KEY `id_r` (`id_r`),
  ADD KEY `id_d` (`id_d`);

--
-- Indexes for table `raspored_treninga`
--
ALTER TABLE `raspored_treninga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sport` (`id_sport`),
  ADD KEY `id_trener` (`id_trener`),
  ADD KEY `id_vreme` (`id_vreme`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treneri`
--
ALTER TABLE `treneri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ul_tr_id` (`ul_tr_id`);

--
-- Indexes for table `trener_sport`
--
ALTER TABLE `trener_sport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_t` (`id_t`),
  ADD KEY `id_s` (`id_s`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uloga_trenera`
--
ALTER TABLE `uloga_trenera`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vreme`
--
ALTER TABLE `vreme`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anketa_ocena`
--
ALTER TABLE `anketa_ocena`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `dani`
--
ALTER TABLE `dani`
  MODIFY `id_dani` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `galerija`
--
ALTER TABLE `galerija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `korisnik_ocena`
--
ALTER TABLE `korisnik_ocena`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ocena`
--
ALTER TABLE `ocena`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pocetna_tekst`
--
ALTER TABLE `pocetna_tekst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pol`
--
ALTER TABLE `pol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ponuda`
--
ALTER TABLE `ponuda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `raspored_dani`
--
ALTER TABLE `raspored_dani`
  MODIFY `id_rd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `raspored_treninga`
--
ALTER TABLE `raspored_treninga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `treneri`
--
ALTER TABLE `treneri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `trener_sport`
--
ALTER TABLE `trener_sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uloga_trenera`
--
ALTER TABLE `uloga_trenera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vreme`
--
ALTER TABLE `vreme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anketa_ocena`
--
ALTER TABLE `anketa_ocena`
  ADD CONSTRAINT `anketa_ocena_ibfk_1` FOREIGN KEY (`id_o`) REFERENCES `ocena` (`id`),
  ADD CONSTRAINT `anketa_ocena_ibfk_2` FOREIGN KEY (`id_a`) REFERENCES `anketa` (`id`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`pol_id`) REFERENCES `pol` (`id`),
  ADD CONSTRAINT `korisnik_ibfk_2` FOREIGN KEY (`ponuda_id`) REFERENCES `ponuda` (`id`),
  ADD CONSTRAINT `korisnik_ibfk_3` FOREIGN KEY (`uloga_id`) REFERENCES `uloga` (`id`);

--
-- Constraints for table `korisnik_ocena`
--
ALTER TABLE `korisnik_ocena`
  ADD CONSTRAINT `korisnik_ocena_ibfk_1` FOREIGN KEY (`id_k`) REFERENCES `korisnik` (`id`),
  ADD CONSTRAINT `korisnik_ocena_ibfk_2` FOREIGN KEY (`id_o`) REFERENCES `ocena` (`id`);

--
-- Constraints for table `pocetna_tekst`
--
ALTER TABLE `pocetna_tekst`
  ADD CONSTRAINT `pocetna_tekst_ibfk_1` FOREIGN KEY (`id_sport`) REFERENCES `sport` (`id`);

--
-- Constraints for table `raspored_dani`
--
ALTER TABLE `raspored_dani`
  ADD CONSTRAINT `raspored_dani_ibfk_1` FOREIGN KEY (`id_r`) REFERENCES `raspored_treninga` (`id`),
  ADD CONSTRAINT `raspored_dani_ibfk_2` FOREIGN KEY (`id_d`) REFERENCES `dani` (`id_dani`);

--
-- Constraints for table `raspored_treninga`
--
ALTER TABLE `raspored_treninga`
  ADD CONSTRAINT `raspored_treninga_ibfk_1` FOREIGN KEY (`id_trener`) REFERENCES `treneri` (`id`),
  ADD CONSTRAINT `raspored_treninga_ibfk_2` FOREIGN KEY (`id_sport`) REFERENCES `sport` (`id`),
  ADD CONSTRAINT `raspored_treninga_ibfk_4` FOREIGN KEY (`id_vreme`) REFERENCES `vreme` (`id`);

--
-- Constraints for table `treneri`
--
ALTER TABLE `treneri`
  ADD CONSTRAINT `treneri_ibfk_2` FOREIGN KEY (`ul_tr_id`) REFERENCES `uloga_trenera` (`id`);

--
-- Constraints for table `trener_sport`
--
ALTER TABLE `trener_sport`
  ADD CONSTRAINT `trener_sport_ibfk_1` FOREIGN KEY (`id_t`) REFERENCES `treneri` (`id`),
  ADD CONSTRAINT `trener_sport_ibfk_2` FOREIGN KEY (`id_s`) REFERENCES `sport` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
