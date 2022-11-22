-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2019 at 11:13 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestuniv`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(500) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('joaocostagr@outlook.pt', '$2y$10$W8GdwMUj2oGA9PlBx9HuZe0O2tIkgYBFnW1m4xpDS7CZuTfO3lALC', '2019-08-18'),
('costinha.programador@gmail.com', '$2y$10$QpcBAc9gaiG7h8OOKuDs.ulpALzimO5WBrOY6fcfIXNaNxFR3.gMa', '2019-08-10'),
('anaritame@hotmail.com', '$2y$10$kpmkXy2Pa.aN.aRx37iYuuxKYUc6J3TUn5we5QSVWa5w1243O7CqO', '2019-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Ano` text,
  `Semestre` varchar(5) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `detail` text NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Ano`, `Semestre`, `name`, `detail`, `updated_at`, `created_at`) VALUES
(1, '1', '1', 'Arte Clássica', '11', '2019-11-02 17:38:58', '2019-11-02'),
(2, '1', '1', 'Arte Pré-Clássica', '12', '2019-11-03 16:13:28', '2019-11-03'),
(15, '1', '1', 'Arte Pré-Histórica', '12', '2019-11-03 18:05:44', '2019-11-03'),
(16, '1', '1', 'Introdução ás Artes Asiáticas', '13', '2019-11-03 18:07:09', '2019-11-03'),
(17, '1', '1', 'Metodologias da História da Arte', '15', '2019-11-03 18:07:41', '2019-11-03'),
(18, '1', '2', 'Arte da Antiguidade Tardia e Islâmica', '13', '2019-11-03 18:12:39', '2019-11-03'),
(19, '1', '2', 'Iconografia e Iconologia', '14', '2019-11-03 22:24:51', '2019-11-03'),
(20, '1', '2', 'Introdução à Museologia', '14', '2019-11-03 22:25:24', '2019-11-03'),
(21, '1', '2', 'Introdução à Paleografia e Diplomática', '12', '2019-11-03 22:25:57', '2019-11-03'),
(22, '1', '2', 'Introdução às Ciência do Património', '14', '2019-11-03 22:26:21', '2019-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'João', 'costinha.programador@gmail.com', NULL, '$2y$10$mPpVBXr/uX3yUWWYuq2EiezTpKj.EtZ0swVndGlbQfPRnPKYO.sA6', NULL, '2019-06-07 10:01:16', '2019-06-07 10:01:16'),
(2, 'joao', 'joaocostagr@outlook.pt', NULL, '$2y$10$aGHuM3pZ9F7B0ZHlO8f5Z.3BzUC20Wrm6VvbHUwN4ui4TWI3uluga', 'sR9gtZ8fNWCI0dEfWLuAjEcg4ek1PaCFXqiE2yx3XlkzKFwdjG6QyngkUQ35', '2019-06-07 10:48:23', '2019-06-07 10:48:23'),
(3, 'zemilho', 'zemilho@gmail.com', NULL, '$2y$10$NrHchcXub5KRLDT9lwfmHO5fYlJ.6cLkxK8FxeuX/FMQtElpclvfK', NULL, '2019-06-07 10:53:55', '2019-06-07 10:53:55'),
(4, 'Joao Pedro', 'costa.joao36@gmail.com', NULL, '$2y$10$arQg9c5WrJFGwqIHzebSyePoatxQlgOrMf6JgKy7MYYPr3/KVFXjG', NULL, '2019-10-29 23:03:57', '2019-10-29 23:03:57'),
(5, 'Ana Rita', 'anaritame@hotmail.com', NULL, '$2y$10$FHuvczNpghoxWRGL5fV2leixBmT0NwVF8xQWgHB1rAoIHfOS9U00W', 'JZEaVn9jq9Ybpr1Nqf8EaP4WIyziiFLep04D5VoP0mMPoiyBPYsLP15PVrDR', '2019-11-02 17:37:40', '2019-11-02 17:37:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
