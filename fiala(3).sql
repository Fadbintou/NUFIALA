-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Sep 19, 2022 at 09:01 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fiala`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` text,
  `type-admin` text,
  `mot-de-passe` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `apprenants`
--

CREATE TABLE `apprenants` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  ` passe` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apprenants`
--

INSERT INTO `apprenants` (`id`, `nom`, `prenom`, `tel`, `email`, ` passe`, `created_at`, `updated_at`) VALUES
(1, 'kokou', 'patrik', '90025896', 'kokou@gmail.com', '134', '2022-09-13 12:09:49', NULL),
(2, 'asiago', 'gogo', '90369874', 'gogo@gmail.com', '1234', '2022-09-13 17:22:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categorie_matiere`
--

CREATE TABLE `categorie_matiere` (
  `id` int(11) NOT NULL,
  `nom` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie_matiere`
--

INSERT INTO `categorie_matiere` (`id`, `nom`) VALUES
(1, 'francais'),
(2, 'anglais');

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

CREATE TABLE `matiere` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `cour` varchar(45) DEFAULT NULL,
  `exercice` text,
  `corrige` varchar(45) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matiere`
--

INSERT INTO `matiere` (`id`, `nom`, `cour`, `exercice`, `corrige`, `categorie_id`) VALUES
(1, 'orthographe', 'les conjonction de cordination', 'donner deux exemples de conjonction de cordinations', 'mais ou ', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apprenants`
--
ALTER TABLE `apprenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorie_matiere`
--
ALTER TABLE `categorie_matiere`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apprenants`
--
ALTER TABLE `apprenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categorie_matiere`
--
ALTER TABLE `categorie_matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `matiere_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie_matiere` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
