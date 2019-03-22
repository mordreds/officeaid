-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2019 at 11:47 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `officeaid_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone_1` varchar(20) NOT NULL,
  `telephone_2` varchar(20) NOT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `residence_address` varchar(255) NOT NULL COMMENT 'physical location and street name where company is located',
  `website` varchar(100) DEFAULT NULL COMMENT 'website of the comany',
  `mission` varchar(255) DEFAULT NULL,
  `vision` varchar(255) DEFAULT NULL,
  `gps_location` varchar(255) DEFAULT NULL,
  `tin_number` varchar(50) DEFAULT NULL,
  `logo_path` varchar(50) NOT NULL,
  `date_of_commence` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `name`, `telephone_1`, `telephone_2`, `fax`, `email`, `postal_address`, `residence_address`, `website`, `mission`, `vision`, `gps_location`, `tin_number`, `logo_path`, `date_of_commence`) VALUES
(1, 'Okomfo Anokye Rural Bank', '0244000999', '0233888999', NULL, 'info@ctslaundry.com', 'P.O Box AN 10227, Accra - North. ', 'OFANKOR', 'www.ctslaundry.com', 'MISSION STATEMENT', 'VISION STATEMAN', 'GA-125-69631', 'TN-12345678', 'resources/img/logo.png', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `status`, `date_created`) VALUES
(1, 'Information Technology (IT)', 'Information Technology', 'active', '2018-12-30 13:53:15'),
(2, 'Client Service', 'Clients service', 'active', '2018-12-30 13:53:15'),
(3, 'Operations', '', 'active', '2018-12-30 13:53:15'),
(4, 'Finance', '', 'active', '2018-12-30 13:53:15'),
(5, 'Human Resource', '', 'active', '2018-12-30 13:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `department_positions`
--

CREATE TABLE `department_positions` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `position_id` int(11) NOT NULL,
  `date_attained` datetime NOT NULL,
  `date_released` datetime NOT NULL,
  `action_by` int(11) NOT NULL,
  `status` enum('active','inactive','deleted') DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_1` varchar(20) NOT NULL,
  `phone_2` varchar(20) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `status` enum('active','inactive','deleted') DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone_1`, `phone_2`, `branch_id`, `status`, `date_created`) VALUES
(1, 'Bismark Offei', '0245827865', '0631545845', 1, 'active', '2019-01-07 15:19:41'),
(2, 'Claude Nii Nai', '0244777888', '', 1, 'active', '2019-01-07 15:19:41'),
(3, 'Hope Avalon', '0233555666', '', 2, 'active', '2019-01-07 15:19:41'),
(4, 'James Aggaga', '0277888555', '', 3, 'active', '2019-01-07 15:19:41'),
(5, 'Augustine Sefa', '0244369258', '', 2, 'active', '2019-01-07 15:19:41'),
(6, 'Osborne Mordreds', '05417885220', '', 3, 'active', '2019-01-07 15:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_contact` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `priority` enum('low','medium','high','urgent') NOT NULL DEFAULT 'low',
  `file_id` bigint(20) NOT NULL,
  `due_date` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `assigned_to` bigint(20) NOT NULL,
  `status` enum('pending','processing','processed','declined','deleted') NOT NULL DEFAULT 'pending',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `sender_name`, `sender_contact`, `subject`, `description`, `priority`, `file_id`, `due_date`, `department_id`, `assigned_to`, `status`, `date_created`) VALUES
(1, 'Osborne', '0156366566', 'Password Reset', '', 'high', 0, '2018-12-30', 1, 0, 'pending', '2018-12-30 16:52:09'),
(2, 'Osborne', '0156366566', 'Password Reset', '', 'high', 0, '2018-12-30', 1, 0, 'pending', '2018-12-30 17:01:48'),
(3, 'Srg', 'Drg', 'Srtf', '<p>tyuti</p>', 'high', 0, '2018-12-30', 2, 0, 'pending', '2018-12-30 22:49:10'),
(4, 'Wer', 'Ser', 'We', '<p>678456</p>', 'high', 0, '2019-01-16', 2, 0, 'processing', '2019-01-05 10:05:35'),
(5, 'Wer', 'Ser', 'We', '<p>678456</p>', 'high', 0, '2019-01-16', 2, 0, 'pending', '2019-01-05 10:05:46'),
(6, 'Aseed', '45656', 'Tyhjtyu', '<p>yrtyrty</p>', 'high', 0, '2019-01-08', 2, 0, 'pending', '2019-01-05 10:14:06'),
(7, 'Aseed', '45656', 'Tyhjtyutyuty', '<p>yrtyrty</p>', 'high', 0, '2019-01-08', 2, 0, 'pending', '2019-01-05 10:14:13'),
(8, 'Aseed', '45656', 'Tyhjtyutyuty', '<p>yrtyrty</p>', 'high', 0, '2019-01-08', 2, 0, 'pending', '2019-01-05 10:22:32'),
(9, 'Gfcg', '56952+', 'Trdy', '<p>gvvjyhv</p>', 'medium', 0, '2019-01-07', 2, 0, 'pending', '2019-01-05 10:33:03'),
(10, 'Gfcg', '56952+', 'Trdy', '<p>gvvjyhv</p>', 'medium', 0, '2019-01-07', 2, 0, 'pending', '2019-01-05 10:33:13'),
(11, 'Gfcg', '56952+', 'Trdy', '<p>gvvjyhv</p>', 'medium', 0, '2019-01-07', 2, 0, 'processing', '2019-01-05 10:33:35'),
(12, 'Fyyigf', '065651618', 'Tyrdydty', '<p>chtdytdtdytf</p>', 'low', 0, '2019-01-18', 1, 0, 'pending', '2019-01-05 10:39:27'),
(13, 'Name', '67890-', 'Sub', '<p>desc</p>', 'high', 0, '2019-01-05', 3, 0, 'pending', '2019-01-05 11:20:42'),
(14, 'Name', '67890-', 'Sub', '<p>desc</p>', 'high', 0, '2019-01-05', 3, 0, 'pending', '2019-01-05 11:21:00'),
(15, 'Hjkh', 'Hkhj', 'Jukhj', '<p>jkljk</p>', 'urgent', 0, '2019-01-11', 3, 0, 'pending', '2019-01-05 11:23:05'),
(16, 'Name', 'Phone', 'Sub', '<p>dertryt</p>', 'medium', 0, '2019-01-24', 2, 0, 'pending', '2019-01-05 11:24:41'),
(17, 'Sdfsr', '0645345', 'Sdrgdfg', '<p>drgdrfg</p>', 'urgent', 0, '2019-01-17', 2, 0, 'pending', '2019-01-05 11:52:57'),
(18, 'Drg', 'Rsdg', 'Srg', '<p>ddrg</p>', 'medium', 0, '2019-01-22', 1, 0, 'pending', '2019-01-05 11:56:18'),
(19, 'Dfg', 'Dfg', 'Drg', '<p>ftyrty</p>', 'medium', 0, '2019-01-08', 2, 0, 'pending', '2019-01-05 12:22:21'),
(20, 'DFGD', 'DGFB', 'SGFS', '<p>DFG</p>', 'medium', 0, '2019-01-24', 3, 0, 'pending', '2019-01-05 12:22:59'),
(21, 'GFDF', '75634634', 'RTG', '<p>CGHB</p>', 'low', 0, '2019-01-22', 1, 0, 'pending', '2019-01-05 12:24:13'),
(22, 'Aboagye Kesse Jnr', '05442786214', 'Inbalances Of Kofi Awunoor\'s  Account', 'The above installation instructions show how to install Yii, which also creates\r\na basic Web application that works out of the box. This approach is a good\r\nstarting point for most projects, either small or big. It is especially suitable\r\nif you just start learning Yii.\r\nBut there are other installation options available:\r\n• If you only want to install the core framework and would like to build\r\nan entire application from scratch, you may follow the instructions as\r\nexplained in Building Application from Scratch.\r\n• If you want to start with a more sophisticated application, better suited\r\nto team development environments, you may consider installing the\r\nAdvanced Project Template18.', 'high', 0, '2019-05-12', 4, 1, 'pending', '2019-01-07 13:49:00'),
(23, 'Bismark', '05441245245', 'Priinter Issue', '<p>This Is Urgent</p>', 'high', 0, '2019-02-21', 1, 0, 'pending', '2019-02-20 00:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1552956645, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_requests`
-- (See below for the actual view)
--
CREATE TABLE `vw_requests` (
`id` bigint(20)
,`sender_name` varchar(255)
,`sender_contact` varchar(20)
,`subject` varchar(255)
,`description` mediumtext
,`priority` enum('low','medium','high','urgent')
,`file_id` bigint(20)
,`due_date` date
,`department_id` int(11)
,`assigned_to` bigint(20)
,`status` enum('pending','processing','processed','declined','deleted')
,`date_created` datetime
,`department_name` varchar(255)
,`assignee` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_requests`
--
DROP TABLE IF EXISTS `vw_requests`;

CREATE ALGORITHM=UNDEFINED DEFINER=`hpx703cr_office`@`localhost` SQL SECURITY DEFINER VIEW `vw_requests`  AS  select `a`.`id` AS `id`,`a`.`sender_name` AS `sender_name`,`a`.`sender_contact` AS `sender_contact`,`a`.`subject` AS `subject`,`a`.`description` AS `description`,`a`.`priority` AS `priority`,`a`.`file_id` AS `file_id`,`a`.`due_date` AS `due_date`,`a`.`department_id` AS `department_id`,`a`.`assigned_to` AS `assigned_to`,`a`.`status` AS `status`,`a`.`date_created` AS `date_created`,`b`.`name` AS `department_name`,`c`.`name` AS `assignee` from ((`requests` `a` left join `departments` `b` on((`a`.`department_id` = `b`.`id`))) left join `employees` `c` on((`a`.`assigned_to` = `c`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_positions`
--
ALTER TABLE `department_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department_positions`
--
ALTER TABLE `department_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
