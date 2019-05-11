-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.1.0.5548
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for officeaid_db
CREATE DATABASE IF NOT EXISTS `officeaid_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `officeaid_db`;

-- Dumping structure for table officeaid_db.access_login_failed
CREATE TABLE IF NOT EXISTS `access_login_failed` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'auto',
  `user_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL COMMENT 'the username used for logging in ',
  `password` varchar(255) NOT NULL COMMENT 'encrypted password used for logging in ',
  `user_agent` varchar(255) NOT NULL COMMENT 'contains browser info used to access the system',
  `hostname` varchar(255) NOT NULL COMMENT 'computer name used to access the system',
  `ipaddress` varchar(20) NOT NULL DEFAULT '0.0.0.0' COMMENT 'ip address of the computer',
  `city_region` text COMMENT 'location of the user when accessing the system',
  `country` varchar(255) DEFAULT NULL COMMENT 'country from which the system was accessed',
  `access_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'date of access',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table officeaid_db.access_login_failed: 0 rows
/*!40000 ALTER TABLE `access_login_failed` DISABLE KEYS */;
/*!40000 ALTER TABLE `access_login_failed` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.access_login_successful
CREATE TABLE IF NOT EXISTS `access_login_successful` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'auto generated id',
  `user_id` int(5) NOT NULL COMMENT 'auto generated id from users table',
  `time_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'time of login by user',
  `time_out` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'time of logout by user',
  `online` int(1) NOT NULL DEFAULT '1' COMMENT 'online status of the user',
  `user_agent` varchar(255) NOT NULL COMMENT 'browser info of the user at the time of system access',
  `ipaddress` varchar(20) NOT NULL DEFAULT '0.0.0.0' COMMENT 'ip address of the user at the time of system access',
  `hostname` varchar(255) NOT NULL COMMENT 'computer name of the user at the time of system access',
  `city_region` text COMMENT 'city & region of the user at the time of system access',
  `country` varchar(255) DEFAULT NULL COMMENT 'country of the user at the time of system access',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table officeaid_db.access_login_successful: 0 rows
/*!40000 ALTER TABLE `access_login_successful` DISABLE KEYS */;
INSERT INTO `access_login_successful` (`id`, `user_id`, `time_in`, `time_out`, `online`, `user_agent`, `ipaddress`, `hostname`, `city_region`, `country`) VALUES
  (1, 1, '2019-05-10 19:52:41', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.132', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (2, 1, '2019-05-11 09:14:20', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.132', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (3, 2, '2019-05-11 09:18:15', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.132', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (4, 1, '2019-05-11 09:23:12', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.132', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (5, 12, '2019-05-11 11:45:54', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.132', '127.0.0.1', 'cbsa.com', NULL, NULL);
/*!40000 ALTER TABLE `access_login_successful` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.access_password_reset_requests
CREATE TABLE IF NOT EXISTS `access_password_reset_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requestor_user_id` int(11) NOT NULL,
  `password_token` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `local_password_token` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `acceptor_user_id` int(11) DEFAULT NULL,
  `status` varchar(45) CHARACTER SET utf8 NOT NULL,
  `date_requested` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table officeaid_db.access_password_reset_requests: ~0 rows (approximately)
/*!40000 ALTER TABLE `access_password_reset_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `access_password_reset_requests` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.access_roles_privileges_group
CREATE TABLE IF NOT EXISTS `access_roles_privileges_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'name of the group / predefined set of roles & privileges ',
  `roles` text NOT NULL COMMENT 'A set of predefined roles to set a user ',
  `privileges` text NOT NULL COMMENT 'A set of predefined privileges from roles',
  `description` varchar(255) DEFAULT NULL COMMENT 'A summary of text describing that position',
  `login_url` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active' COMMENT 'State of the group whether its active(1) or inactive(0)',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table officeaid_db.access_roles_privileges_group: 5 rows
/*!40000 ALTER TABLE `access_roles_privileges_group` DISABLE KEYS */;
INSERT INTO `access_roles_privileges_group` (`id`, `name`, `roles`, `privileges`, `description`, `login_url`, `status`, `date_created`) VALUES
  (1, 'System Developers', 'New Request|History|Directory|Report|Task|Assign-Ticket-Task|Users|Privileges|Assigned-Tickets', '', 'Designers of this software', 'dashboard', 'active', '2017-10-16 22:42:32'),
  (2, 'End Users', 'New Request|History|Directory', '', 'Chief Executive Officer Of The Whole Business', '', 'active', '2019-01-23 05:54:44'),
  (3, 'Assignees', 'New Request|History|Directory|Controls|Assigned-Tickets', '', 'Recieves Clients Warmly And Also The First Point Of Contact. Front Desk Things Too', '', 'active', '2019-01-23 05:56:09'),
  (4, 'Manager', 'New Request|History|Directory|Controls|Report|Task|Assigned|Assign-Ticket-Task', '', NULL, '', 'active', '2019-05-07 11:55:53'),
  (5, 'Administrator', 'New Request|History|Directory|Report|Task|Assigned|Users|Privileges', '', NULL, '', 'active', '2019-05-07 11:55:53');
/*!40000 ALTER TABLE `access_roles_privileges_group` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.access_roles_privileges_user
CREATE TABLE IF NOT EXISTS `access_roles_privileges_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL COMMENT 'Contains the id of the user',
  `custom_roles` text CHARACTER SET utf8 NOT NULL COMMENT 'Contains the Exceptional/Added Roles of a user',
  `custom_privileges` text CHARACTER SET utf8 NOT NULL COMMENT 'Contains the Permissible Actions on the Exceptional Roles assigned to the user',
  `group_id` int(11) NOT NULL COMMENT 'Contains the id of the group to which the user belongs to in roles & priviledges',
  `status` enum('active','inactive','deleted','') CHARACTER SET utf8 DEFAULT 'active' COMMENT 'state of the user''s permissions.',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table officeaid_db.access_roles_privileges_user: 3 rows
/*!40000 ALTER TABLE `access_roles_privileges_user` DISABLE KEYS */;
INSERT INTO `access_roles_privileges_user` (`id`, `user_id`, `custom_roles`, `custom_privileges`, `group_id`, `status`) VALUES
  (1, 1, '', '', 1, 'active'),
  (2, 2, '', '', 2, 'active'),
  (3, 11, '', '', 3, 'active'),
  (4, 12, '', '', 4, 'active');
/*!40000 ALTER TABLE `access_roles_privileges_user` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.access_users
CREATE TABLE IF NOT EXISTS `access_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `passwd` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 NOT NULL,
  `department_id` tinyint(1) NOT NULL,
  `login_attempt` tinyint(1) NOT NULL DEFAULT '5',
  `status` enum('active','inactive','deleted','') CHARACTER SET utf8 NOT NULL DEFAULT 'active',
  `created_by` bigint(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table officeaid_db.access_users: ~3 rows (approximately)
/*!40000 ALTER TABLE `access_users` DISABLE KEYS */;
INSERT INTO `access_users` (`id`, `username`, `passwd`, `fullname`, `phone_number`, `department_id`, `login_attempt`, `status`, `created_by`, `date_created`) VALUES
  (1, 'marksbonapps@gmail.com', '$2y$10$O/swrfsJ6TbhtHiyzR7GmurgN4u49VcaMFzrOtZ9.3N511hoPhOVi', 'Osborne Mordreds', '0541786220', 1, 5, 'active', 0, '2018-07-03 15:59:37'),
  (2, 'nanaaikinson@gmail.com', '$2y$10$O/swrfsJ6TbhtHiyzR7GmurgN4u49VcaMFzrOtZ9.3N511hoPhOVi', 'Nana Aikinson', '0544789635', 8, 5, 'active', 1, '2019-05-07 10:00:38'),
  (11, 'offei@okomfo.com', '$2y$10$O/swrfsJ6TbhtHiyzR7GmurgN4u49VcaMFzrOtZ9.3N511hoPhOVi', 'Bismark Offei', '+2345687985456', 2, 5, 'active', 1, '2019-05-09 22:34:41'),
  (12, 'bwboakye@gmail.com', '$2y$10$Ygl.A.MxAGMPKFqVJS9LTO8pIeuwVm6VWGIbFHf07/1fjrJwjv2me', 'Bright Boakye', '0544789635', 3, 5, 'active', 1, '2019-05-11 09:22:27');
/*!40000 ALTER TABLE `access_users` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.company_info
CREATE TABLE IF NOT EXISTS `company_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `date_of_commence` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table officeaid_db.company_info: 1 rows
/*!40000 ALTER TABLE `company_info` DISABLE KEYS */;
INSERT INTO `company_info` (`id`, `name`, `telephone_1`, `telephone_2`, `fax`, `email`, `postal_address`, `residence_address`, `website`, `mission`, `vision`, `gps_location`, `tin_number`, `logo_path`, `date_of_commence`) VALUES
  (1, 'Okomfo Anokye Rural Bank', '+233 0204344906', '0246543708', NULL, 'Info@okomfoanokyeruralbank.com', 'Okomfo Anokye Rural Bank Ltd\r\nPostal Office Box 13\r\nWiamoase Ashanti\r\nKumasi', 'Kumasi-Wiamoase', 'www.okomfoanokyeruralbank.com', 'MISSION STATEMENT', 'VISION STATEMAN', 'GA-125-69631', 'TN-12345678', 'resources/img/logo.png', '0000-00-00');
/*!40000 ALTER TABLE `company_info` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.complains
CREATE TABLE IF NOT EXISTS `complains` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table officeaid_db.complains: ~8 rows (approximately)
/*!40000 ALTER TABLE `complains` DISABLE KEYS */;
INSERT INTO `complains` (`id`, `name`, `status`, `date_created`, `createdby`) VALUES
  (1, 'T24', 'active', '2019-05-07 21:53:44', 0),
  (2, 'CCC/ACH', 'active', '2019-05-07 21:54:05', 0),
  (3, 'E-ZWICH', 'active', '2019-05-07 21:54:28', 0),
  (4, 'EMAIL', 'active', '2019-05-07 21:54:37', 0),
  (5, 'GVIVE', 'active', '2019-05-07 21:55:08', 0),
  (6, 'I - TRANS', 'active', '2019-05-07 21:55:31', 0),
  (7, 'RIO', 'active', '2019-05-07 21:55:42', 0),
  (8, 'UNITY LINK', 'active', '2019-05-07 21:55:51', 0),
  (9, 'USER WORKSTATION', 'active', '2019-05-07 21:56:09', 0);
/*!40000 ALTER TABLE `complains` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table officeaid_db.departments: ~14 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `name`, `description`, `type`, `status`, `date_created`) VALUES
  (1, 'Info. Tech. (IT)', 'Information Technology', 1, 'active', '2018-12-30 13:53:15'),
  (2, 'Client Service', 'Clients service', 1, 'active', '2018-12-30 13:53:15'),
  (3, 'Operations', '', 1, 'active', '2018-12-30 13:53:15'),
  (4, 'Finance', '', 1, 'active', '2018-12-30 13:53:15'),
  (5, 'Human Resource', '', 1, 'active', '2018-12-30 13:53:15'),
  (6, 'OKH', '', 2, 'active', '2019-04-30 08:30:36'),
  (7, 'OKW', '', 2, 'active', '2019-04-30 08:30:36'),
  (8, 'OKG', '', 2, 'active', '2019-04-30 08:30:36'),
  (9, 'OKT', '', 2, 'active', '2019-04-30 08:30:36'),
  (10, 'OKB', '', 2, 'active', '2019-04-30 08:30:36'),
  (11, 'OKF', '', 2, 'active', '2019-04-30 08:30:36'),
  (12, 'OKS', '', 2, 'active', '2019-04-30 08:30:36'),
  (13, 'OKA', '', 2, 'active', '2019-04-30 08:30:36'),
  (14, 'OKP', '', 2, 'active', '2019-04-30 08:30:36'),
  (15, 'OKK', '', 2, 'active', '2019-04-30 08:30:36');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.department_positions
CREATE TABLE IF NOT EXISTS `department_positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `position_id` int(11) NOT NULL,
  `date_attained` datetime NOT NULL,
  `date_released` datetime NOT NULL,
  `action_by` int(11) NOT NULL,
  `status` enum('active','inactive','deleted') DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table officeaid_db.department_positions: ~0 rows (approximately)
/*!40000 ALTER TABLE `department_positions` DISABLE KEYS */;
/*!40000 ALTER TABLE `department_positions` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone_1` varchar(20) NOT NULL,
  `phone_2` varchar(20) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `status` enum('active','inactive','deleted') DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table officeaid_db.employees: ~6 rows (approximately)
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`id`, `name`, `phone_1`, `phone_2`, `branch_id`, `status`, `date_created`) VALUES
  (1, 'Bismark Offei', '0245827865', '0631545845', 1, 'active', '2019-01-07 15:19:41'),
  (2, 'Claude Nii Nai', '0244777888', '', 1, 'active', '2019-01-07 15:19:41'),
  (3, 'Hope Avalon', '0233555666', '', 2, 'active', '2019-01-07 15:19:41'),
  (4, 'James Aggaga', '0277888555', '', 3, 'active', '2019-01-07 15:19:41'),
  (5, 'Augustine Sefa', '0244369258', '', 2, 'active', '2019-01-07 15:19:41'),
  (6, 'Osborne Mordreds', '05417885220', '', 3, 'active', '2019-01-07 15:19:41');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.files
CREATE TABLE IF NOT EXISTS `files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) NOT NULL,
  `createdby` int(11) NOT NULL,
  `filetype` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `filecode` varchar(255) DEFAULT NULL,
  `filepath` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table officeaid_db.files: ~3 rows (approximately)
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` (`id`, `subject`, `createdby`, `filetype`, `department_id`, `status`, `filecode`, `filepath`) VALUES
  (1, 'Priinter Issue', 1, 'zip', 1, 'Public', '', 'uploads/1-2019-04-30-18-08-55-1816015.zip'),
  (2, 'Public Key', 1, 'pdf', 7, 'Public', '', 'uploads/1-2019-05-08-01-03-27-6340176.pdf'),
  (3, 'Salaries', 3, 'pdf', 4, 'Private', '00233', 'uploads/3-2019-05-08-01-04-46-2428517.pdf');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.files_additions
CREATE TABLE IF NOT EXISTS `files_additions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(191) NOT NULL,
  `createdby` int(11) NOT NULL,
  `filetype` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `filecode` varchar(255) DEFAULT NULL,
  `filepath` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table officeaid_db.files_additions: ~0 rows (approximately)
/*!40000 ALTER TABLE `files_additions` DISABLE KEYS */;
/*!40000 ALTER TABLE `files_additions` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table officeaid_db.groups: ~2 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
  (1, 'admin', 'Administrator'),
  (2, 'members', 'General User');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.hr_company_info
CREATE TABLE IF NOT EXISTS `hr_company_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `telephone_1` varchar(20) NOT NULL,
  `telephone_2` varchar(20) NOT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `residence_address` varchar(255) NOT NULL COMMENT 'physical location and street name where company is located',
  `website` varchar(100) NOT NULL COMMENT 'website of the comany',
  `mission` varchar(255) NOT NULL,
  `vision` varchar(255) NOT NULL,
  `gps_location` varchar(255) DEFAULT NULL,
  `tin_number` varchar(50) NOT NULL,
  `logo_id` int(11) NOT NULL,
  `date_of_commence` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table officeaid_db.hr_company_info: 1 rows
/*!40000 ALTER TABLE `hr_company_info` DISABLE KEYS */;
INSERT INTO `hr_company_info` (`id`, `name`, `telephone_1`, `telephone_2`, `fax`, `email`, `postal_address`, `residence_address`, `website`, `mission`, `vision`, `gps_location`, `tin_number`, `logo_id`, `date_of_commence`) VALUES
  (1, 'CTS LAUNDRY', '0244000999', '0233888999', NULL, 'info@ctslaundry.com', 'POSTAL ADDRES', 'OFANKOR', 'www.ctslaundry.com', 'MISSION STATEMENT', 'VISION STATEMAN', 'GA-125-69631', 'TN-12345678', 0, '0000-00-00');
/*!40000 ALTER TABLE `hr_company_info` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.positions
CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table officeaid_db.positions: ~0 rows (approximately)
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `sender_contact` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `priority` enum('low','medium','high','urgent') NOT NULL DEFAULT 'low',
  `type` varchar(50) NOT NULL DEFAULT 'ticket',
  `complain_id` tinyint(4) NOT NULL DEFAULT '0',
  `duedate` date NOT NULL,
  `file_id` bigint(20) NOT NULL,
  `department_id` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `updated_at` bigint(20) NOT NULL,
  `assigned_to` bigint(20) NOT NULL,
  `date_solved` datetime NOT NULL,
  `status` enum('pending','processing','resolved','declined','deleted','closed','Excalated(Apex)','Cancelled') NOT NULL DEFAULT 'pending',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table officeaid_db.requests: ~3 rows (approximately)
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` (`id`, `email`, `sender_contact`, `subject`, `description`, `priority`, `type`, `complain_id`, `duedate`, `file_id`, `department_id`, `updated_by`, `updated_at`, `assigned_to`, `date_solved`, `status`, `date_created`) VALUES
  (1, 'nanaaikinson@gmail.com', '+23356967555', 'Can\'t Login', '<p>please Come Asap</p>', 'urgent', 'ticket', 1, '0000-00-00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 'pending', '2019-05-07 22:19:56'),
  (2, 'Marksbonapps@gmail.com', '+23356967555', 'Testing Again', '<p>urgergedrg</p>', 'urgent', 'ticket', 3, '0000-00-00', 0, 0, 0, 0, 11, '0000-00-00 00:00:00', 'pending', '2019-05-07 22:27:40'),
  (3, 'Offei@okomfo.com', '+23356967555', 'Public Keys', '<p>Medium Test</p>', 'medium', 'ticket', 2, '0000-00-00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 'pending', '2019-05-10 14:08:15'),
  (4, 'Marksbonapps@gmail.com', '+23356967555', 'Trdy', '<p>Testing Now</p>', 'high', 'ticket', 1, '0000-00-00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 'pending', '2019-05-10 14:09:00'),
  (5, 'Nanaaikinson@gmail.com', '+23356967555', 'Testing Again', '<p>desc</p>', 'low', 'ticket', 8, '0000-00-00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 'pending', '2019-05-11 01:57:50'),
  (6, 'Offei@okomfo.com', '+23356967555', 'Trdy', '<p>qwerty - Update From Assign Job Again</p>', 'low', 'ticket', 2, '0000-00-00', 0, 0, 0, 0, 11, '0000-00-00 00:00:00', 'pending', '2019-05-11 02:11:29');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;

-- Dumping structure for view officeaid_db.vw_company_info
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_company_info` (
  `id` BIGINT(20) NOT NULL,
  `name` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
  `telephone_1` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
  `telephone_2` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
  `fax` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
  `email` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
  `postal_address` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
  `residence_address` VARCHAR(255) NOT NULL COMMENT 'physical location and street name where company is located' COLLATE 'latin1_swedish_ci',
  `website` VARCHAR(100) NOT NULL COMMENT 'website of the comany' COLLATE 'latin1_swedish_ci',
  `mission` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
  `vision` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
  `gps_location` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
  `tin_number` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
  `logo_id` INT(11) NOT NULL,
  `date_of_commence` DATE NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view officeaid_db.vw_files
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_files` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `subject` VARCHAR(191) NOT NULL COLLATE 'utf8_general_ci',
  `createdby` INT(11) NOT NULL,
  `filetype` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
  `department_id` INT(11) NOT NULL,
  `status` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
  `filepath` VARCHAR(191) NOT NULL COLLATE 'utf8_general_ci',
  `fullname` VARCHAR(255) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view officeaid_db.vw_requests
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_requests` (
  `id` BIGINT(20) NOT NULL,
  `email` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
  `created_by` VARCHAR(255) NULL COLLATE 'utf8_general_ci',
  `created_by_department` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
  `sender_contact` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
  `subject` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
  `description` MEDIUMTEXT NOT NULL COLLATE 'latin1_swedish_ci',
  `priority` ENUM('low','medium','high','urgent') NOT NULL COLLATE 'latin1_swedish_ci',
  `file_id` BIGINT(20) NOT NULL,
  `assigned_to` BIGINT(20) NOT NULL,
  `status` ENUM('pending','processing','resolved','declined','deleted','closed','Excalated(Apex)','Cancelled') NOT NULL COLLATE 'latin1_swedish_ci',
  `duedate` DATE NOT NULL,
  `date_created` DATETIME NOT NULL,
  `date_solved` DATETIME NOT NULL,
  `assignee` VARCHAR(255) NULL COLLATE 'utf8_general_ci',
  `department_id` INT(11) NULL,
  `department` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
  `type` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
  `complain_id` TINYINT(4) NOT NULL,
  `complain` VARCHAR(191) NULL COLLATE 'utf8_general_ci',
  `filepath` VARCHAR(191) NULL COLLATE 'utf8_general_ci',
  `filetype` VARCHAR(50) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view officeaid_db.vw_user_details
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_user_details` (
  `id` BIGINT(20) NOT NULL,
  `username` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
  `passwd` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
  `fullname` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
  `phone_number` VARCHAR(20) NOT NULL COLLATE 'utf8_general_ci',
  `department_id` TINYINT(1) NOT NULL,
  `login_attempt` TINYINT(1) NOT NULL,
  `status` ENUM('active','inactive','deleted','') NOT NULL COLLATE 'utf8_general_ci',
  `created_by` BIGINT(20) NOT NULL,
  `date_created` TIMESTAMP NOT NULL,
  `custom_roles` MEDIUMTEXT NULL COLLATE 'utf8_general_ci',
  `custom_privileges` MEDIUMTEXT NULL COLLATE 'utf8_general_ci',
  `group_id` VARCHAR(11) NULL COLLATE 'utf8mb4_general_ci',
  `user_roles_status` VARCHAR(8) NULL COLLATE 'utf8_general_ci',
  `group_name` VARCHAR(255) NULL COLLATE 'utf8_general_ci',
  `group_roles` MEDIUMTEXT NULL COLLATE 'utf8_general_ci',
  `group_privileges` MEDIUMTEXT NULL COLLATE 'utf8_general_ci',
  `group_login_url` VARCHAR(255) NULL COLLATE 'utf8_general_ci',
  `department` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view officeaid_db.vw_company_info
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_company_info`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_company_info` AS select `hr_company_info`.`id` AS `id`,`hr_company_info`.`name` AS `name`,`hr_company_info`.`telephone_1` AS `telephone_1`,`hr_company_info`.`telephone_2` AS `telephone_2`,`hr_company_info`.`fax` AS `fax`,`hr_company_info`.`email` AS `email`,`hr_company_info`.`postal_address` AS `postal_address`,`hr_company_info`.`residence_address` AS `residence_address`,`hr_company_info`.`website` AS `website`,`hr_company_info`.`mission` AS `mission`,`hr_company_info`.`vision` AS `vision`,`hr_company_info`.`gps_location` AS `gps_location`,`hr_company_info`.`tin_number` AS `tin_number`,`hr_company_info`.`logo_id` AS `logo_id`,`hr_company_info`.`date_of_commence` AS `date_of_commence` from `hr_company_info` ;

-- Dumping structure for view officeaid_db.vw_files
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_files`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_files` AS SELECT a.*,b.fullname FROM files a

LEFT JOIN access_users b ON b.id = a.createdby ;

-- Dumping structure for view officeaid_db.vw_requests
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_requests`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_requests` AS select 
  `a`.`id` AS `id`,
  `a`.`email` AS `email`,
  user.fullname as created_by,
  dept.name as created_by_department,
  `a`.`sender_contact` AS `sender_contact`,
  `a`.`subject` AS `subject`,
  `a`.`description` AS `description`,
  `a`.`priority` AS `priority`,
  `a`.`file_id` AS `file_id`,
  `a`.`assigned_to` AS `assigned_to`,
  `a`.`status` AS `status`,
  a.duedate,
  `a`.`date_created` AS `date_created`,
  `a`.`date_solved` AS `date_solved`,
  `ass`.`fullname` AS `assignee`,
  dept.id as department_id, 
  dept.name as department, 
  a.type, 
  a.`complain_id`,
  comp.name as complain,
  file.filepath, 
  file.filetype

from ((
  `requests` `a` 
  
left join `access_users` `user` on((user.username = a.email))
left join `access_users` `ass` on((ass.id = a.assigned_to))
left join  departments dept on((dept.id = user.department_id))
left join  files file on((file.id = a.file_id))
left join complains comp on comp.id = a.complain_id

)) ;

-- Dumping structure for view officeaid_db.vw_user_details
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_user_details`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_details` AS SELECT
    `a`.`id` AS `id`,
    `a`.`username` AS `username`,
    `a`.`passwd` AS `passwd`,
    a.fullname,
    `a`.`phone_number`,
    `a`.`department_id` AS `department_id`,
`a`.`login_attempt` AS `login_attempt`,
`a`.`status` AS `status`,
`a`.`created_by` AS `created_by`,
`a`.`date_created` AS `date_created`,
COALESCE(`b`.`custom_roles`, '') AS `custom_roles`,
COALESCE(`b`.`custom_privileges`, '') AS `custom_privileges`,
COALESCE(`b`.`group_id`, '') AS `group_id`,
COALESCE(`b`.`status`, '') AS `user_roles_status`,
COALESCE(`c`.`name`, '') AS `group_name`,
COALESCE(`c`.`roles`, '') AS `group_roles`,
COALESCE(`c`.`privileges`, '') AS `group_privileges`,
`c`.`login_url` AS `group_login_url`,
dept.name as department
FROM
    (
        (
            (
                `access_users` `a`
            LEFT JOIN `access_roles_privileges_user` `b` ON
                ((`a`.`id` = `b`.`user_id`))
            )
        LEFT JOIN `access_roles_privileges_group` `c` ON
            ((`b`.`group_id` = `c`.`id`))
            
            left join departments dept on dept.id = a.department_id
        )
    ) ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
