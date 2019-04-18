-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 16, 2017 at 05:17 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `template_audit`
--
CREATE DATABASE IF NOT EXISTS `template_audit` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `template_audit`;

-- --------------------------------------------------------

--
-- Table structure for table `failed_logins`
--

CREATE TABLE `failed_logins` (
  `id` int(20) NOT NULL COMMENT 'auto',
  `user_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL COMMENT 'the username used for logging in ',
  `password` varchar(255) NOT NULL COMMENT 'encrypted password used for logging in ',
  `user_agent` varchar(255) NOT NULL COMMENT 'contains browser info used to access the system',
  `hostname` varchar(255) NOT NULL COMMENT 'computer name used to access the system',
  `ipaddress` varchar(20) NOT NULL DEFAULT '0.0.0.0' COMMENT 'ip address of the computer',
  `city_region` text COMMENT 'location of the user when accessing the system',
  `country` varchar(255) DEFAULT NULL COMMENT 'country from which the system was accessed',
  `access_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'date of access'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `failed_logins`
--

INSERT INTO `failed_logins` (`id`, `user_id`, `username`, `password`, `user_agent`, `hostname`, `ipaddress`, `city_region`, `country`, `access_date`) VALUES
(1, 1, 'sysadmin', '$2y$10$g4j.BzGsD4VWXWTQC31AP.eSn.LKRcM0CqR2CqnVjhRlKW0cZIN8O', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', 'London', '::1', NULL, NULL, '2017-09-07 11:34:15'),
(2, 1, 'osborne.mordred@gmail.com', '$2y$10$xrwm19QbhuEDA.iMbIng2Oz.h2zKMpfzBc09ZIkan.f8TEqVgopPu', 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', 'ip6-localhost', '::1', NULL, NULL, '2017-09-11 22:52:46'),
(3, 1, 'osborne.mordred@gmail.com', '$2y$10$EyjykDOs6c0ZNnxc/33.3.aaUTyEtBR0j2QK/Z0XhkLbweaAWFTX6', 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', 'ip6-localhost', '::1', NULL, NULL, '2017-09-11 22:53:01'),
(4, 1, 'osborne.mordred@gmail.com', '$2y$10$yXltHbqvXZB/SvsMUELKOuKMdGQNJ5rnhZWaKdE2YiJVjOudzl5WG', 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', 'ip6-localhost', '::1', NULL, NULL, '2017-09-12 22:59:18'),
(5, 1, 'osborne.mordred@gmail.com', '$2y$10$D4.2nmdk7zYtxM4sd0EwkuR5DeeH0PevXTUcpCXr6zvorVh/UOXBa', 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', 'ip6-localhost', '::1', NULL, NULL, '2017-09-13 06:33:58'),
(6, 1, 'osborne.mordred@gmail.com', '$2y$10$AwjXItANblRvEqd.K/RIDOIPf0RjcHHRC/QQSVzLESK3PYZjFHF.2', 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', 'ip6-localhost', '::1', NULL, NULL, '2017-09-13 16:53:57'),
(7, 1, 'osborne.mordred@gmail.com', '$2y$10$P6AMJ.YVbYfF5bwfdDmXeu5yxufTWTVD/Zxn8NRuKlPmIv3sdpLba', 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', 'ip6-localhost', '::1', NULL, NULL, '2017-09-13 16:54:13'),
(8, 1, 'osborne.mordred@gmail.com', '$2y$10$kBal./L/K/lqKDxbtX7wD.uH6ii2FPlmd3O8tSKm0KaEQ13puwBUe', 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', 'ip6-localhost', '::1', NULL, NULL, '2017-09-13 16:54:22'),
(9, 1, 'osborne.mordred@gmail.com', '$2y$10$uOW5Smjisgp0VEIpsmudO.p20oJheckLOMKyxjWDVre1HQ3fA/eNS', 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', 'ip6-localhost', '::1', NULL, NULL, '2017-09-13 16:54:32'),
(10, 1, 'osborne.mordred@gmail.com', '$2y$10$ucN9d6tfS8ScCKcv4ICBNeSpG4XdOHJYgVfOHJ4Xy2NpoIs/ezbuS', 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', 'ip6-localhost', '::1', NULL, NULL, '2017-09-13 16:55:00'),
(11, 1, 'osborne.mordred@gmail.com', '$2y$10$DNXUvrYQXo2ewWVVuO1zI.94gLYxPfnMwwXyFU4c1BJ9ua8o2g.MC', 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', 'ip6-localhost', '::1', NULL, NULL, '2017-09-22 06:52:33'),
(12, 1, 'osborne.mordred@gmail.com', '$2y$10$hxiRPIQbFdHjUshgSIZEle708/UlX2yG.EhoKV80MZDcFs0U0w6s2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.39', 'London', '::1', NULL, NULL, '2017-10-16 10:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `successful_logins`
--

CREATE TABLE `successful_logins` (
  `id` int(20) NOT NULL COMMENT 'auto generated id',
  `user_id` int(5) NOT NULL COMMENT 'auto generated id from users table',
  `time_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'time of login by user',
  `time_out` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'time of logout by user',
  `online` int(1) NOT NULL DEFAULT '1' COMMENT 'online status of the user',
  `user_agent` varchar(255) NOT NULL COMMENT 'browser info of the user at the time of system access',
  `ipaddress` varchar(20) NOT NULL DEFAULT '0.0.0.0' COMMENT 'ip address of the user at the time of system access',
  `hostname` varchar(255) NOT NULL COMMENT 'computer name of the user at the time of system access',
  `city_region` text COMMENT 'city & region of the user at the time of system access',
  `country` varchar(255) DEFAULT NULL COMMENT 'country of the user at the time of system access'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `successful_logins`
--

INSERT INTO `successful_logins` (`id`, `user_id`, `time_in`, `time_out`, `online`, `user_agent`, `ipaddress`, `hostname`, `city_region`, `country`) VALUES
(1, 1, '2017-09-07 11:34:24', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '::1', 'London', NULL, NULL),
(2, 1, '2017-09-07 15:47:32', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '::1', 'London', NULL, NULL),
(3, 1, '2017-09-11 22:53:18', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(4, 1, '2017-09-12 16:03:49', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(5, 1, '2017-09-12 23:09:33', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(6, 1, '2017-09-12 23:09:47', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(7, 1, '2017-09-13 06:34:17', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(8, 1, '2017-09-13 17:03:10', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(9, 1, '2017-09-13 17:04:41', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(10, 1, '2017-09-13 23:24:16', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(11, 1, '2017-09-14 22:05:51', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(12, 1, '2017-09-15 04:53:45', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(13, 1, '2017-09-15 12:01:13', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '::1', 'London', NULL, NULL),
(14, 1, '2017-09-15 15:07:38', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '::1', 'London', NULL, NULL),
(15, 1, '2017-09-16 01:22:22', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '::1', 'London', NULL, NULL),
(16, 1, '2017-09-18 09:25:32', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '::1', 'London', NULL, NULL),
(17, 1, '2017-09-18 09:31:03', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '::1', 'London', NULL, NULL),
(18, 1, '2017-09-18 10:56:51', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '::1', 'London', NULL, NULL),
(19, 1, '2017-09-18 11:50:13', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '::1', 'London', NULL, NULL),
(20, 1, '2017-09-18 11:50:25', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '::1', 'London', NULL, NULL),
(21, 1, '2017-09-18 21:35:24', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(22, 1, '2017-09-18 21:35:50', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(23, 1, '2017-09-18 21:35:52', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(24, 1, '2017-09-19 12:28:18', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(25, 1, '2017-09-19 21:05:18', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(26, 1, '2017-09-20 05:44:08', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(27, 1, '2017-09-21 19:22:13', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(28, 1, '2017-09-22 06:16:02', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(29, 1, '2017-09-22 06:45:07', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(30, 1, '2017-09-22 20:26:38', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(31, 1, '2017-09-22 21:15:46', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(32, 1, '2017-09-22 21:16:08', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(33, 1, '2017-09-23 06:53:05', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(34, 1, '2017-09-28 21:56:15', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(35, 1, '2017-09-28 21:57:55', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(36, 1, '2017-09-29 05:42:58', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(37, 1, '2017-09-29 05:59:56', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(38, 1, '2017-09-29 06:07:24', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(39, 1, '2017-09-29 06:09:06', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(40, 1, '2017-09-29 06:10:51', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(41, 1, '2017-09-29 06:11:53', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(42, 1, '2017-09-29 06:16:27', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(43, 1, '2017-09-29 06:16:33', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(44, 1, '2017-09-29 23:55:06', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(45, 1, '2017-09-30 00:07:59', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(46, 1, '2017-09-30 00:08:01', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(47, 1, '2017-09-30 08:57:15', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(48, 1, '2017-09-30 16:49:36', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(49, 1, '2017-09-30 18:22:42', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(50, 1, '2017-09-30 18:22:44', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(51, 1, '2017-10-01 07:00:23', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(52, 1, '2017-10-02 19:03:49', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(53, 1, '2017-10-03 23:33:22', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(54, 1, '2017-10-03 23:33:23', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(55, 1, '2017-10-04 19:20:50', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(56, 1, '2017-10-05 06:26:24', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(57, 1, '2017-10-05 06:26:26', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(58, 1, '2017-10-05 20:12:04', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(59, 1, '2017-10-06 05:13:05', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(60, 1, '2017-10-06 18:31:39', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(61, 1, '2017-10-07 19:49:39', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(62, 1, '2017-10-07 20:00:58', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(63, 1, '2017-10-07 20:01:00', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(64, 1, '2017-10-08 07:12:23', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(65, 1, '2017-10-08 07:12:24', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(66, 1, '2017-10-08 21:32:23', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(67, 1, '2017-10-09 18:55:48', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(68, 1, '2017-10-10 06:49:17', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(69, 1, '2017-10-11 08:31:37', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.35', '::1', 'London', NULL, NULL),
(70, 1, '2017-10-14 22:13:25', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(71, 1, '2017-10-16 10:12:28', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.39', '::1', 'London', NULL, NULL),
(72, 1, '2017-10-16 15:49:14', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.39', '::1', 'London', NULL, NULL),
(73, 1, '2017-10-16 19:57:25', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(74, 1, '2017-10-17 08:51:45', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.39', '::1', 'London', NULL, NULL),
(75, 1, '2017-10-17 12:28:07', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.39', '::1', 'London', NULL, NULL),
(76, 1, '2017-10-17 17:07:52', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.39', '::1', 'London', NULL, NULL),
(77, 1, '2017-10-17 19:50:56', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(78, 1, '2017-10-18 08:29:18', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.39', '::1', 'London', NULL, NULL),
(79, 1, '2017-10-19 18:55:53', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(80, 1, '2017-10-20 06:02:48', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(81, 1, '2017-10-20 09:36:01', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.39', '::1', 'London', NULL, NULL),
(82, 1, '2017-10-23 08:41:53', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.39', '::1', 'London', NULL, NULL),
(83, 1, '2017-10-23 15:22:55', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.50', '::1', 'London', NULL, NULL),
(84, 1, '2017-10-27 09:43:10', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.50', '::1', 'London', NULL, NULL),
(85, 1, '2017-10-27 15:41:33', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.50', '::1', 'London', NULL, NULL),
(86, 1, '2017-10-27 19:50:42', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.50', '::1', 'London', NULL, NULL),
(87, 1, '2017-10-28 09:13:39', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.50', '::1', 'London', NULL, NULL),
(88, 1, '2017-10-28 15:26:10', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.50', '::1', 'London', NULL, NULL),
(89, 1, '2017-10-28 19:58:57', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(90, 1, '2017-10-29 16:27:43', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(91, 1, '2017-10-29 23:09:58', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(92, 1, '2017-10-29 23:10:00', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(93, 1, '2017-10-30 06:58:04', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(94, 1, '2017-10-30 15:57:40', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(95, 1, '2017-10-31 07:56:29', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(96, 1, '2017-10-31 12:53:13', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(97, 1, '2017-10-31 16:47:25', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(98, 1, '2017-10-31 17:35:21', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(99, 1, '2017-10-31 17:35:34', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(100, 1, '2017-10-31 17:35:36', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(101, 1, '2017-10-31 17:43:09', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(102, 1, '2017-10-31 17:38:43', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(103, 1, '2017-10-31 17:49:16', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(104, 1, '2017-10-31 21:57:59', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(105, 1, '2017-11-16 04:51:39', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sysaudit`
--

CREATE TABLE `sysaudit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `changeset` text NOT NULL,
  `session_login_id` bigint(20) NOT NULL,
  `session_fullname` varchar(800) NOT NULL,
  `entity` varchar(100) NOT NULL,
  `record_id` bigint(20) UNSIGNED NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_logins`
--
ALTER TABLE `failed_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `successful_logins`
--
ALTER TABLE `successful_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sysaudit`
--
ALTER TABLE `sysaudit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_logins`
--
ALTER TABLE `failed_logins`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'auto', AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `successful_logins`
--
ALTER TABLE `successful_logins`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'auto generated id', AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `sysaudit`
--
ALTER TABLE `sysaudit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;--
-- Database: `template_db`
--
CREATE DATABASE IF NOT EXISTS `template_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `template_db`;

-- --------------------------------------------------------

--
-- Table structure for table `blobs`
--

CREATE TABLE `blobs` (
  `id` bigint(20) NOT NULL COMMENT 'auto generated id',
  `file_path` text CHARACTER SET latin1 NOT NULL COMMENT 'physical location of blob',
  `user_id` bigint(20) NOT NULL COMMENT 'id of the user who uploaded the file',
  `date_of_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date the file was uploaded'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blobs`
--

INSERT INTO `blobs` (`id`, `file_path`, `user_id`, `date_of_upload`) VALUES
(1, 'uploads/scanned_documents/resume/evans.docx', 1, '2017-05-30 00:36:09'),
(2, 'uploads/scanned_documents/resume/ike.docx', 1, '2017-10-11 11:25:33'),
(3, 'uploads/profile_pictures/evans.jpg', 1, '2017-10-19 20:58:56'),
(4, 'uploads/profile_pictures/ike.jpg', 1, '2017-10-19 21:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `hr_company_document`
--

CREATE TABLE `hr_company_document` (
  `id` bigint(20) NOT NULL,
  `logo_id` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_company_info`
--

CREATE TABLE `hr_company_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone_1` varchar(20) NOT NULL,
  `telephone_2` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `residence_address` varchar(255) NOT NULL COMMENT 'physical location and street name where company is located',
  `website` varchar(100) NOT NULL COMMENT 'website of the comany',
  `mission` varchar(255) NOT NULL,
  `vision` varchar(255) NOT NULL,
  `tin_number` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `hr_company_info`
--

INSERT INTO `hr_company_info` (`id`, `name`, `telephone_1`, `telephone_2`, `fax`, `email`, `postal_address`, `residence_address`, `website`, `mission`, `vision`, `tin_number`) VALUES
(1, 'MARKSBON LIMITED', '(+233) 256-487-847', '(+233) 256-982-479', '(+233) 256-975-596', 'info@mawuseng.com', 'P.O.BOX AN 10227, ACCRA - NORTH.', '12 LEXEMBORG, COCA-COLA - SPINTEX', 'www.mawums.com', 'Building World Class Software With Speed', 'This Is Our Vision Statement', 'TN10245682-GA');

-- --------------------------------------------------------

--
-- Table structure for table `hr_departments`
--

CREATE TABLE `hr_departments` (
  `id` tinyint(2) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `hr_departments`
--

INSERT INTO `hr_departments` (`id`, `name`) VALUES
(1, 'Procurement'),
(2, 'Human Resource'),
(3, 'Accounts'),
(4, 'Stores'),
(5, 'Site'),
(6, 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_biodata`
--

CREATE TABLE `hr_employee_biodata` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `id_type` varchar(50) DEFAULT NULL,
  `id_number` varchar(50) DEFAULT NULL,
  `id_expiry_date` date DEFAULT NULL,
  `id_issue_date` date DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `postal_address` text,
  `social_security` varchar(50) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_branch` varchar(255) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `photo_id` bigint(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `hr_employee_biodata`
--

INSERT INTO `hr_employee_biodata` (`id`, `first_name`, `middle_name`, `last_name`, `gender`, `date_of_birth`, `id_type`, `id_number`, `id_expiry_date`, `id_issue_date`, `marital_status`, `nationality`, `postal_address`, `social_security`, `bank_name`, `bank_branch`, `account_number`, `user_id`, `photo_id`, `status`, `created_date`) VALUES
(1, 'Evans ', 'Kwame', 'Offori', 'Male', '1975-01-20', 'National ID', '9852145698', '2020-11-20', '2013-11-20', 'Married', 'Ghanaian', 'P.O Box TF382 Trade Fair Accra', '101258963741', 'Ecobank', 'Accra-Main', '010158963741', 7, 3, 'active', '2017-08-23 10:57:54'),
(2, 'Gyasi', 'jon', 'Nimako', 'Female', '1980-01-20', 'Passport', 'GH-12596325874', '2020-03-19', '2016-03-20', 'Married', 'Ghanaian', 'P.O Box KN98 Kaneshi-Accra', '025896312345', 'Ecobank', 'Accra-Main', '010169852147', 8, 4, 'active', '2017-08-23 11:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_contact_info`
--

CREATE TABLE `hr_employee_contact_info` (
  `id` bigint(20) NOT NULL,
  `biodata_id` bigint(20) NOT NULL,
  `phone_number_1` varchar(25) CHARACTER SET utf8 NOT NULL,
  `phone_number_2` varchar(25) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `emergency_fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `emergency_relationship` varchar(50) CHARACTER SET utf8 NOT NULL,
  `emergency_occupation` varchar(50) CHARACTER SET utf8 NOT NULL,
  `emergency_phone_1` varchar(20) CHARACTER SET utf8 NOT NULL,
  `emergency_phone_2` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `emergency_residence` varchar(50) CHARACTER SET utf8 NOT NULL,
  `emergency_postal_addr` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `hr_employee_contact_info`
--

INSERT INTO `hr_employee_contact_info` (`id`, `biodata_id`, `phone_number_1`, `phone_number_2`, `email`, `emergency_fullname`, `emergency_relationship`, `emergency_occupation`, `emergency_phone_1`, `emergency_phone_2`, `emergency_residence`, `emergency_postal_addr`, `date_created`) VALUES
(1, 1, '0234567876', '0233778444', 'evansoffori@gmail.com', '', '', '', '', NULL, '', '', '2017-10-17 12:19:35'),
(2, 2, '0255685978', '', 'gyasinimako@gmail.com', '', '', '', '', NULL, '', '', '2017-10-17 12:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_other_info`
--

CREATE TABLE `hr_employee_other_info` (
  `id` int(11) NOT NULL,
  `biodata_id` varchar(20) NOT NULL,
  `salary` tinyint(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_work_info`
--

CREATE TABLE `hr_employee_work_info` (
  `id` bigint(20) NOT NULL,
  `biodata_id` bigint(20) NOT NULL,
  `employee_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `position_id` tinyint(2) NOT NULL,
  `department_id` tinyint(2) NOT NULL,
  `employment_type` varchar(50) CHARACTER SET utf8 NOT NULL,
  `employment_startdate` date DEFAULT NULL,
  `work_email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `resume_id` int(20) DEFAULT NULL,
  `application_id` bigint(20) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `hr_employee_work_info`
--

INSERT INTO `hr_employee_work_info` (`id`, `biodata_id`, `employee_id`, `position_id`, `department_id`, `employment_type`, `employment_startdate`, `work_email`, `resume_id`, `application_id`, `date_created`) VALUES
(1, 1, 'KAD/EMP/001', 1, 1, '0000-00-00', NULL, 'evans@marksbon.com', 1, 1, '2017-06-21 05:27:42'),
(2, 2, 'KAD/EMP/002', 2, 1, '0000-00-00', NULL, 'ike@marksbon.com', 2, 2, '2017-10-14 22:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `hr_position`
--

CREATE TABLE `hr_position` (
  `id` tinyint(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_position`
--

INSERT INTO `hr_position` (`id`, `name`, `description`) VALUES
(1, 'CEO', NULL),
(2, 'Board Of Directors', NULL),
(3, 'Managing Director (MD)', NULL),
(4, 'Supervisor', NULL),
(5, 'Senior Staff', NULL),
(6, 'Staff', NULL),
(7, 'Field Officer', NULL),
(8, 'Manager', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_employee_details`
--
CREATE TABLE `vw_employee_details` (
`id` bigint(20)
,`first_name` varchar(100)
,`middle_name` varchar(50)
,`last_name` varchar(100)
,`fullname` varchar(252)
,`gender` varchar(20)
,`date_of_birth` date
,`id_type` varchar(50)
,`phone_number_1` varchar(25)
,`phone_number_2` varchar(25)
,`email` varchar(50)
,`id_number` varchar(50)
,`id_expiry_date` date
,`id_issue_date` date
,`marital_status` varchar(50)
,`nationality` varchar(255)
,`postal_address` text
,`social_security` varchar(50)
,`bank_name` varchar(255)
,`bank_branch` varchar(255)
,`account_number` varchar(50)
,`user_id` bigint(20)
,`status` varchar(255)
,`created_date` datetime
,`employment_type` varchar(50)
,`employment_startdate` date
,`employee_id` varchar(50)
,`work_email` varchar(50)
,`department` varchar(255)
,`current_position` varchar(50)
,`profile_photo` text
,`resume_file_path` text
,`application_file_path` text
);

-- --------------------------------------------------------

--
-- Structure for view `vw_employee_details`
--
DROP TABLE IF EXISTS `vw_employee_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_employee_details`  AS  select `a`.`id` AS `id`,`a`.`first_name` AS `first_name`,`a`.`middle_name` AS `middle_name`,`a`.`last_name` AS `last_name`,concat(`a`.`first_name`,' ',`a`.`middle_name`,' ',`a`.`last_name`) AS `fullname`,`a`.`gender` AS `gender`,`a`.`date_of_birth` AS `date_of_birth`,`a`.`id_type` AS `id_type`,`g`.`phone_number_1` AS `phone_number_1`,`g`.`phone_number_2` AS `phone_number_2`,`g`.`email` AS `email`,`a`.`id_number` AS `id_number`,`a`.`id_expiry_date` AS `id_expiry_date`,`a`.`id_issue_date` AS `id_issue_date`,`a`.`marital_status` AS `marital_status`,`a`.`nationality` AS `nationality`,`a`.`postal_address` AS `postal_address`,`a`.`social_security` AS `social_security`,`a`.`bank_name` AS `bank_name`,`a`.`bank_branch` AS `bank_branch`,`a`.`account_number` AS `account_number`,`a`.`user_id` AS `user_id`,`a`.`status` AS `status`,`a`.`created_date` AS `created_date`,`d`.`employment_type` AS `employment_type`,`d`.`employment_startdate` AS `employment_startdate`,`d`.`employee_id` AS `employee_id`,`d`.`work_email` AS `work_email`,`e`.`name` AS `department`,`f`.`name` AS `current_position`,(select `blobs`.`file_path` from `blobs` where (`a`.`photo_id` = `blobs`.`id`)) AS `profile_photo`,(select `blobs`.`file_path` from `blobs` where (`d`.`resume_id` = `blobs`.`id`)) AS `resume_file_path`,(select `blobs`.`file_path` from `blobs` where (`d`.`application_id` = `blobs`.`id`)) AS `application_file_path` from (((((`hr_employee_biodata` `a` left join `hr_employee_other_info` `c` on((`a`.`id` = `c`.`biodata_id`))) left join `hr_employee_work_info` `d` on((`a`.`id` = `d`.`biodata_id`))) left join `hr_employee_contact_info` `g` on((`a`.`id` = `g`.`biodata_id`))) left join `hr_departments` `e` on((`d`.`department_id` = `e`.`id`))) left join `hr_position` `f` on((`d`.`position_id` = `f`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blobs`
--
ALTER TABLE `blobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_company_document`
--
ALTER TABLE `hr_company_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_company_info`
--
ALTER TABLE `hr_company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_departments`
--
ALTER TABLE `hr_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_employee_biodata`
--
ALTER TABLE `hr_employee_biodata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_number` (`id_number`,`social_security`,`account_number`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status` (`status`(1));

--
-- Indexes for table `hr_employee_contact_info`
--
ALTER TABLE `hr_employee_contact_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id_UNIQUE` (`biodata_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number_1` (`phone_number_1`);

--
-- Indexes for table `hr_employee_other_info`
--
ALTER TABLE `hr_employee_other_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_employee_work_info`
--
ALTER TABLE `hr_employee_work_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id_UNIQUE` (`biodata_id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr_position`
--
ALTER TABLE `hr_position`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blobs`
--
ALTER TABLE `blobs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'auto generated id', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hr_company_document`
--
ALTER TABLE `hr_company_document`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_company_info`
--
ALTER TABLE `hr_company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hr_departments`
--
ALTER TABLE `hr_departments`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hr_employee_biodata`
--
ALTER TABLE `hr_employee_biodata`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hr_employee_contact_info`
--
ALTER TABLE `hr_employee_contact_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hr_employee_other_info`
--
ALTER TABLE `hr_employee_other_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_employee_work_info`
--
ALTER TABLE `hr_employee_work_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hr_position`
--
ALTER TABLE `hr_position`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;--
-- Database: `template_permissions`
--
CREATE DATABASE IF NOT EXISTS `template_permissions` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `template_permissions`;

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_tabs`
--

CREATE TABLE `dashboard_tabs` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `comment` varchar(100) CHARACTER SET utf8 NOT NULL,
  `icon` varchar(50) CHARACTER SET utf8 NOT NULL,
  `link` varchar(50) CHARACTER SET utf8 NOT NULL,
  `bg` varchar(50) CHARACTER SET utf8 NOT NULL,
  `privileges` varchar(255) CHARACTER SET utf8 NOT NULL,
  `system_type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` enum('active','inactive','deleted','') CHARACTER SET utf8 NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard_tabs`
--

INSERT INTO `dashboard_tabs` (`id`, `name`, `comment`, `icon`, `link`, `bg`, `privileges`, `system_type`, `status`) VALUES
(1, 'company', 'Organizational Structure', 'fa fa-institution', 'settings/company', 'text-teal-400', 'Can Create Company Profile|Can Edit Company Profile|Can Delete Company Profile', 'Human-Resource', 'active'),
(2, 'users', 'Add New / Manage User(s)', 'fa fa-users', 'administration/users', 'text-teal-400', 'All Users|Add New User', 'Administration', 'active'),
(3, 'permissions', 'Set Roles & Priv. For Users / Groups', 'fa fa-lock', 'administration/roles_priviledges', 'text-teal-400', 'All Roles|All Privileges|Set Role', 'Administration', 'active'),
(4, 'backup', 'Backup All Data ', 'fa fa-database', 'administration/backup', 'text-teal-400', 'Can Backup Data', 'Administration', 'active'),
(5, 'audit', 'Main Audit System', 'fa fa-database', 'administration/audit', 'text-teal-400', 'Can Access Department Audit|Can Access All Audit', 'Administration', 'active'),
(6, 'license', 'Enter License Key To Activate System', 'fa fa-line-chart', 'administration/license', 'text-teal-400', 'Can Activate', 'Administration', 'active'),
(7, 'settings', 'For Administrators Only', 'fa fa-gears', 'settings/', 'text-teal-400', 'Can Activate / Deactivate System', 'Administration', 'active'),
(8, 'system', 'For Developers Only', 'fa fa-lock', 'system/settings', 'text-teal-400', '', 'Reserved', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_requests`
--

CREATE TABLE `password_reset_requests` (
  `id` int(11) NOT NULL,
  `requestor_user_id` int(11) NOT NULL,
  `password_token` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `local_password_token` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `acceptor_user_id` int(11) DEFAULT NULL,
  `status` varchar(45) CHARACTER SET utf8 NOT NULL,
  `date_requested` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_requests`
--

INSERT INTO `password_reset_requests` (`id`, `requestor_user_id`, `password_token`, `local_password_token`, `acceptor_user_id`, `status`, `date_requested`) VALUES
(1, 1, NULL, NULL, NULL, 'Pending', '2017-09-12 08:10:00'),
(2, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 19:16:20'),
(3, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 19:52:49'),
(4, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:00:58'),
(5, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:01:45'),
(6, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:17:27'),
(7, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:33:39'),
(8, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:36:50'),
(9, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:37:50'),
(10, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:39:33'),
(11, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:40:41'),
(12, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:45:34'),
(13, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 22:12:05'),
(14, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 22:16:26'),
(15, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 22:17:56'),
(16, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 22:26:29'),
(17, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 22:32:03'),
(18, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 22:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `roles_privileges_group`
--

CREATE TABLE `roles_privileges_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'name of the group / predefined set of roles & privileges ',
  `roles` text NOT NULL COMMENT 'A set of predefined roles to set a user ',
  `privileges` text NOT NULL COMMENT 'A set of predefined privileges from roles',
  `description` varchar(255) DEFAULT NULL COMMENT 'A summary of text describing that position',
  `login_url` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active' COMMENT 'State of the group whether its active(1) or inactive(0)',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles_privileges_group`
--

INSERT INTO `roles_privileges_group` (`id`, `name`, `roles`, `privileges`, `description`, `login_url`, `status`, `date_created`) VALUES
(1, 'System Developer', 'staff|company|users|permissions|backup|audit|license|settings|system', '', 'Designers of this software', '', 'active', '2017-10-16 17:42:32'),
(2, 'Administrator', 'staff|company|users|permissions|backup|audit|license|settings|', '', 'Administrator of the company', '', 'active', '2017-10-16 17:42:32'),
(3, 'Senior Staff', '', '', NULL, '', 'active', '2017-10-16 17:42:32'),
(4, 'Junior Staff', '', '', NULL, '', 'active', '2017-10-16 17:42:32'),
(5, 'Client', '', '', NULL, '', 'active', '2017-10-16 17:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `roles_privileges_user`
--

CREATE TABLE `roles_privileges_user` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL COMMENT 'Contains the id of the user',
  `custom_roles` text CHARACTER SET utf8 NOT NULL COMMENT 'Contains the Exceptional/Added Roles of a user',
  `custom_privileges` text CHARACTER SET utf8 NOT NULL COMMENT 'Contains the Permissible Actions on the Exceptional Roles assigned to the user',
  `group_id` int(11) NOT NULL COMMENT 'Contains the id of the group to which the user belongs to in roles & priviledges',
  `status` enum('active','inactive','deleted','') CHARACTER SET utf8 DEFAULT 'active' COMMENT 'state of the user''s permissions.'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles_privileges_user`
--

INSERT INTO `roles_privileges_user` (`id`, `user_id`, `custom_roles`, `custom_privileges`, `group_id`, `status`) VALUES
(1, 1, '', '', 1, 'active'),
(2, 2, '', '', 1, 'active'),
(3, 3, '', '', 5, 'active'),
(4, 4, '', '', 5, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `passwd` varchar(100) CHARACTER SET utf8 NOT NULL,
  `default_passwd` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 NOT NULL,
  `temp_employee_id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `biodata_id` bigint(20) NOT NULL DEFAULT '0',
  `first_login` tinyint(1) NOT NULL DEFAULT '0',
  `login_attempt` tinyint(1) NOT NULL DEFAULT '5',
  `status` enum('active','inactive','deleted','') CHARACTER SET utf8 NOT NULL DEFAULT 'inactive',
  `created_by` bigint(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `passwd`, `default_passwd`, `fullname`, `phone_number`, `temp_employee_id`, `biodata_id`, `first_login`, `login_attempt`, `status`, `created_by`, `date_created`) VALUES
(1, 'osborne.mordred@gmail.com', '$2y$10$GuOFXrr8Xdd5JFHD9vzm8.tUeafbhkUfvImwdDkswS8NJJOqzV3BC', '', 'Osborne Mordreds', '0541786220', 'KAD/SYS/1', 0, 0, 5, 'active', 1, '2017-05-25 06:05:10'),
(2, 'wikills2k@gmail.com', '$2y$10$GuOFXrr8Xdd5JFHD9vzm8.tUeafbhkUfvImwdDkswS8NJJOqzV3BC', '', 'Bismark Offei ', '0245626487', 'KAD/SYS/2', 0, 0, 5, 'active', 1, '2017-05-25 06:05:10'),
(3, 'evans@marksbon.com', '', '$2y$10$WxR9pcai8uwiHmsOPT.4NuN5HhCWV9aeRIkUo7oOJgyWw.O.FLkHy', 'Evans  Kwame Offori', '', '', 1, 0, 5, 'inactive', 0, '2017-10-20 09:49:42'),
(4, 'ike@marksbon.com', '', '$2y$10$9fYLtPVJu4AbtIUVh2JO7.iCBEJCY5SfG9DyU/0XhZKbx/W1pFTNC', 'Gyasi jon Nimako', '', '', 2, 0, 5, 'active', 0, '2017-10-27 09:59:17');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_user_details`
--
CREATE TABLE `vw_user_details` (
`id` bigint(20)
,`username` varchar(255)
,`passwd` varchar(100)
,`fullname` varchar(255)
,`phone_number` varchar(25)
,`employee_id` varchar(50)
,`biodata_id` bigint(20)
,`first_login` tinyint(1)
,`login_attempt` tinyint(1)
,`status` enum('active','inactive','deleted','')
,`created_by` bigint(20)
,`date_created` timestamp
,`custom_roles` mediumtext
,`custom_privileges` mediumtext
,`group_id` varchar(11)
,`user_roles_status` varchar(8)
,`group_name` varchar(255)
,`group_roles` mediumtext
,`group_privileges` mediumtext
);

-- --------------------------------------------------------

--
-- Structure for view `vw_user_details`
--
DROP TABLE IF EXISTS `vw_user_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_details`  AS  select `a`.`id` AS `id`,`a`.`username` AS `username`,`a`.`passwd` AS `passwd`,coalesce(convert((select concat(`template_db`.`hr_employee_biodata`.`first_name`,' ',`template_db`.`hr_employee_biodata`.`middle_name`,' ',`template_db`.`hr_employee_biodata`.`last_name`) from `template_db`.`hr_employee_biodata` where (`template_db`.`hr_employee_biodata`.`id` = `a`.`biodata_id`)) using utf8),`a`.`fullname`) AS `fullname`,coalesce((select `template_db`.`hr_employee_contact_info`.`phone_number_1` from `template_db`.`hr_employee_contact_info` where (`template_db`.`hr_employee_contact_info`.`biodata_id` = `a`.`biodata_id`)),`a`.`phone_number`) AS `phone_number`,coalesce((select `template_db`.`hr_employee_work_info`.`employee_id` from `template_db`.`hr_employee_work_info` where (`template_db`.`hr_employee_work_info`.`biodata_id` = `a`.`biodata_id`)),`a`.`temp_employee_id`) AS `employee_id`,`a`.`biodata_id` AS `biodata_id`,`a`.`first_login` AS `first_login`,`a`.`login_attempt` AS `login_attempt`,`a`.`status` AS `status`,`a`.`created_by` AS `created_by`,`a`.`date_created` AS `date_created`,coalesce(`b`.`custom_roles`,'') AS `custom_roles`,coalesce(`b`.`custom_privileges`,'') AS `custom_privileges`,coalesce(`b`.`group_id`,'') AS `group_id`,coalesce(`b`.`status`,'') AS `user_roles_status`,coalesce(`c`.`name`,'') AS `group_name`,coalesce(`c`.`roles`,'') AS `group_roles`,coalesce(`c`.`privileges`,'') AS `group_privileges` from (((`users` `a` left join `roles_privileges_user` `b` on((`a`.`id` = `b`.`user_id`))) left join `roles_privileges_group` `c` on((`b`.`group_id` = `c`.`id`))) left join `template_db`.`hr_employee_work_info` `d` on((`a`.`biodata_id` = `d`.`biodata_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dashboard_tabs`
--
ALTER TABLE `dashboard_tabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_requests`
--
ALTER TABLE `password_reset_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_privileges_group`
--
ALTER TABLE `roles_privileges_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `roles_privileges_user`
--
ALTER TABLE `roles_privileges_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dashboard_tabs`
--
ALTER TABLE `dashboard_tabs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `password_reset_requests`
--
ALTER TABLE `password_reset_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `roles_privileges_group`
--
ALTER TABLE `roles_privileges_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roles_privileges_user`
--
ALTER TABLE `roles_privileges_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
