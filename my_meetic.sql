-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2018 at 01:33 PM
-- Server version: 5.7.20
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_meetic`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_auteur` int(100) NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `id_destinataire` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `id_auteur`, `message`, `id_destinataire`, `date`) VALUES
(10, 15, 'Coucou', 10, '2018-01-15 19:19:18'),
(12, 15, 'Bonjour je vous contact blblblblblrhoferyferyfegyi', 10, '2018-01-16 11:40:15'),
(14, 15, 'Un autre test', 10, '2018-01-16 11:42:48'),
(15, 15, 'TEST', 10, '2018-01-16 11:47:30'),
(16, 15, 'test', 10, '2018-01-16 15:25:40'),
(17, 15, 'test', 10, '2018-01-16 15:25:43'),
(18, 15, 'test', 10, '2018-01-16 15:26:39'),
(19, 10, 'Test blblblbl', 15, '2018-01-16 15:26:52'),
(20, 15, 'Test blblblbl', 10, '2018-01-16 15:27:12'),
(21, 15, 'Test blblblbl', 10, '2018-01-16 15:27:37'),
(22, 15, 'Il fait beau', 10, '2018-01-16 15:28:04'),
(23, 10, 'admin', 15, '2018-01-16 15:31:12'),
(24, 10, 'WOW', 15, '2018-01-16 16:02:59'),
(26, 15, 'Test', 10, '2018-01-17 09:46:46'),
(30, 15, 'Bonjour', 16, '2018-01-18 08:59:32'),
(31, 15, 'test', 10, '2018-01-18 08:59:51'),
(32, 15, 'j envoie un message à admin', 10, '2018-01-18 09:01:02'),
(33, 15, 'J\'envoie un message Ã  admin', 16, '2018-01-18 09:07:20'),
(34, 15, 'J\'envoie un message Ã  admin', 10, '2018-01-18 09:07:46'),
(38, 15, 'Test', 16, '2018-01-18 11:48:15'),
(39, 15, 'test', 16, '2018-01-18 11:48:17'),
(41, 15, '', 24, '2018-01-19 11:15:44'),
(42, 15, '', 24, '2018-01-19 11:15:44'),
(43, 15, '', 24, '2018-01-19 11:15:44'),
(44, 15, 't', 24, '2018-01-19 11:18:11'),
(45, 15, 'fg', 24, '2018-01-19 11:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(45) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `age` int(10) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(45) NOT NULL DEFAULT '0',
  `cle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `nom`, `prenom`, `date_de_naissance`, `age`, `sexe`, `ville`, `departement`, `region`, `pays`, `mail`, `password`, `active`, `cle`) VALUES
(10, 'admin', 'admin', 'admin', '1996-12-30', 18, 'Homme', 'Chauny', 'Aisne', 'Picardue', 'France', 'mymeebapt@gmail.com', '5e52fee47e6b070565f74372468cdc699de89107', 1, 'bcaf8fa4df96b26d5e17f7220380d502'),
(15, '02300bd', 'Dumont', 'Baptiste', '1990-01-01', 21, 'Homme', 'Chauny', 'Aisne', 'Picardie', 'France', '02300bd@gmail.com', '8ed17cbe0862b55dd2bc5bdcd5682d4261c2eebf', 1, '5a39900c57656d24c783c7e0267e51c6'),
(16, 'bell', 'JESUIS', 'UNCOMPTERANDOM', '1990-01-30', 27, 'Homme', 'Narbonne', 'fubgfnbn', 'rifeirgji', 'France', 'bellsan02@gmail.com', '5e52fee47e6b070565f74372468cdc699de89107', 1, 'f64278bd73bcaf7d69474d167c82e123'),
(27, 'Layerz', 'Dumont', 'Baptiste', '1990-01-01', 28, 'Homme', 'Chauny', 'Crfeu', 'rg', 'France', 'ilayerz@gmail.com', '5e52fee47e6b070565f74372468cdc699de89107', 1, '74153fbda687f0c69697381c24c59911');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
