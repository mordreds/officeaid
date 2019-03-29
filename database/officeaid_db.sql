-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.1.0.5464
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table officeaid_db.access_login_failed: 1 rows
/*!40000 ALTER TABLE `access_login_failed` DISABLE KEYS */;
INSERT INTO `access_login_failed` (`id`, `user_id`, `username`, `password`, `user_agent`, `hostname`, `ipaddress`, `city_region`, `country`, `access_date`) VALUES
  (1, 1, 'marksbonapps@gmail.com', 'a460be6a7e38cc2f79598f4b1e9f894f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.107', 'cbsa.com', '127.0.0.1', NULL, NULL, '2019-03-26 00:04:54');
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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table officeaid_db.access_login_successful: 19 rows
/*!40000 ALTER TABLE `access_login_successful` DISABLE KEYS */;
INSERT INTO `access_login_successful` (`id`, `user_id`, `time_in`, `time_out`, `online`, `user_agent`, `ipaddress`, `hostname`, `city_region`, `country`) VALUES
  (1, 1, '2019-03-26 00:38:11', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.107', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (2, 1, '2019-03-26 00:39:16', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.107', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (3, 1, '2019-03-26 00:39:23', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.107', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (4, 1, '2019-03-26 00:42:46', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.107', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (5, 1, '2019-03-26 00:44:23', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.107', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (6, 1, '2019-03-26 00:45:24', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.107', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (7, 1, '2019-03-26 00:46:10', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.107', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (8, 1, '2019-03-26 00:47:06', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.107', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (9, 1, '2019-03-26 00:47:49', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.107', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (10, 1, '2019-03-26 00:49:36', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.107', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (11, 1, '2019-03-26 00:50:18', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.107', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (12, 1, '2019-03-26 00:52:44', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.107', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (13, 1, '2019-03-26 00:54:32', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.107', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (14, 1, '2019-03-27 10:54:44', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.107', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (15, 1, '2019-03-27 20:12:08', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.118', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (16, 1, '2019-03-27 20:14:09', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.118', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (17, 1, '2019-03-29 04:10:10', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.118', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (18, 1, '2019-03-29 04:53:20', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.0.1617 Safari/537.36', '127.0.0.1', 'cbsa.com', NULL, NULL),
  (19, 1, '2019-03-29 07:38:45', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.118', '127.0.0.1', 'cbsa.com', NULL, NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table officeaid_db.access_roles_privileges_group: 3 rows
/*!40000 ALTER TABLE `access_roles_privileges_group` DISABLE KEYS */;
INSERT INTO `access_roles_privileges_group` (`id`, `name`, `roles`, `privileges`, `description`, `login_url`, `status`, `date_created`) VALUES
  (1, 'SYSTEM', 'statistics|overview|inhouse|dispatch|Settings|company|users|permissions|customers|reports|sms', '', 'Designers of this software', 'dashboard', 'active', '2017-10-16 18:42:32'),
  (2, 'CEO', '', '', 'Chief Executive Officer Of The Whole Business', '', 'active', '2019-01-22 23:54:44'),
  (3, 'RECEPTIONIST', '', '', 'Recieves Clients Warmly And Also The First Point Of Contact. Front Desk Things Too', '', 'active', '2019-01-22 23:56:09');
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table officeaid_db.access_roles_privileges_user: 1 rows
/*!40000 ALTER TABLE `access_roles_privileges_user` DISABLE KEYS */;
INSERT INTO `access_roles_privileges_user` (`id`, `user_id`, `custom_roles`, `custom_privileges`, `group_id`, `status`) VALUES
  (1, 1, '', '', 1, 'active');
/*!40000 ALTER TABLE `access_roles_privileges_user` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.access_users
CREATE TABLE IF NOT EXISTS `access_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `passwd` varchar(100) CHARACTER SET utf8 NOT NULL,
  `default_passwd` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 NOT NULL,
  `temp_employee_id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `biodata_id` bigint(20) NOT NULL DEFAULT '0',
  `demo_user_id` int(11) NOT NULL,
  `first_login` tinyint(1) NOT NULL DEFAULT '0',
  `login_attempt` tinyint(1) NOT NULL DEFAULT '5',
  `online` tinyint(4) NOT NULL,
  `status` enum('active','inactive','deleted','') CHARACTER SET utf8 NOT NULL DEFAULT 'active',
  `created_by` bigint(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table officeaid_db.access_users: ~1 rows (approximately)
/*!40000 ALTER TABLE `access_users` DISABLE KEYS */;
INSERT INTO `access_users` (`id`, `username`, `passwd`, `default_passwd`, `fullname`, `phone_number`, `temp_employee_id`, `biodata_id`, `demo_user_id`, `first_login`, `login_attempt`, `online`, `status`, `created_by`, `date_created`) VALUES
  (1, 'marksbonapps@gmail.com', '$2y$10$O/swrfsJ6TbhtHiyzR7GmurgN4u49VcaMFzrOtZ9.3N511hoPhOVi', '', 'Osborne Mordreds', '0541786220', 'KAD/SYS/001', 0, 0, 0, 5, 0, 'active', 0, '2018-07-03 16:59:37');
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
  (1, 'Okomfo Anokye Rural Bank', '0244000999', '0233888999', NULL, 'info@ctslaundry.com', 'P.O Box AN 10227, Accra - North. ', 'OFANKOR', 'www.ctslaundry.com', 'MISSION STATEMENT', 'VISION STATEMAN', 'GA-125-69631', 'TN-12345678', 'resources/img/logo.png', '0000-00-00');
/*!40000 ALTER TABLE `company_info` ENABLE KEYS */;

-- Dumping structure for table officeaid_db.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table officeaid_db.departments: ~5 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `name`, `description`, `status`, `date_created`) VALUES
  (1, 'Information Technology (IT)', 'Information Technology', 'active', '2018-12-30 13:53:15'),
  (2, 'Client Service', 'Clients service', 'active', '2018-12-30 13:53:15'),
  (3, 'Operations', '', 'active', '2018-12-30 13:53:15'),
  (4, 'Finance', '', 'active', '2018-12-30 13:53:15'),
  (5, 'Human Resource', '', 'active', '2018-12-30 13:53:15');
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
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table officeaid_db.requests: ~23 rows (approximately)
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
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
  (23, 'Bismark', '05441245245', 'Priinter Issue', '<p>This Is Urgent Test</p>', 'high', 0, '2019-02-21', 1, 0, 'pending', '2019-02-20 00:24:08');
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

-- Dumping structure for view officeaid_db.vw_requests
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_requests` (
  `id` BIGINT(20) NOT NULL,
  `sender_name` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
  `sender_contact` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
  `subject` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
  `description` MEDIUMTEXT NOT NULL COLLATE 'latin1_swedish_ci',
  `priority` ENUM('low','medium','high','urgent') NOT NULL COLLATE 'latin1_swedish_ci',
  `file_id` BIGINT(20) NOT NULL,
  `due_date` DATE NOT NULL,
  `department_id` INT(11) NOT NULL,
  `assigned_to` BIGINT(20) NOT NULL,
  `status` ENUM('pending','processing','processed','declined','deleted') NOT NULL COLLATE 'latin1_swedish_ci',
  `date_created` DATETIME NOT NULL,
  `department_name` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
  `assignee` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view officeaid_db.vw_user_details
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_user_details` (
  `id` BIGINT(20) NOT NULL,
  `username` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
  `passwd` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
  `default_passwd` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
  `fullname` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
  `phone_number` VARCHAR(20) NOT NULL COLLATE 'utf8_general_ci',
  `employee_id` VARCHAR(20) NOT NULL COLLATE 'utf8_general_ci',
  `biodata_id` BIGINT(20) NOT NULL,
  `first_login` TINYINT(1) NOT NULL,
  `login_attempt` TINYINT(1) NOT NULL,
  `status` ENUM('active','inactive','deleted','') NOT NULL COLLATE 'utf8_general_ci',
  `created_by` BIGINT(20) NOT NULL,
  `date_created` TIMESTAMP NOT NULL,
  `custom_roles` MEDIUMTEXT NULL COLLATE 'utf8_general_ci',
  `custom_privileges` MEDIUMTEXT NULL COLLATE 'utf8_general_ci',
  `group_id` VARCHAR(11) NULL COLLATE 'utf8mb4_unicode_ci',
  `user_roles_status` VARCHAR(8) NULL COLLATE 'utf8_general_ci',
  `group_name` VARCHAR(255) NULL COLLATE 'utf8_general_ci',
  `group_roles` MEDIUMTEXT NULL COLLATE 'utf8_general_ci',
  `group_privileges` MEDIUMTEXT NULL COLLATE 'utf8_general_ci',
  `group_login_url` VARCHAR(255) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view officeaid_db.vw_company_info
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_company_info`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_company_info` AS select `hr_company_info`.`id` AS `id`,`hr_company_info`.`name` AS `name`,`hr_company_info`.`telephone_1` AS `telephone_1`,`hr_company_info`.`telephone_2` AS `telephone_2`,`hr_company_info`.`fax` AS `fax`,`hr_company_info`.`email` AS `email`,`hr_company_info`.`postal_address` AS `postal_address`,`hr_company_info`.`residence_address` AS `residence_address`,`hr_company_info`.`website` AS `website`,`hr_company_info`.`mission` AS `mission`,`hr_company_info`.`vision` AS `vision`,`hr_company_info`.`gps_location` AS `gps_location`,`hr_company_info`.`tin_number` AS `tin_number`,`hr_company_info`.`logo_id` AS `logo_id`,`hr_company_info`.`date_of_commence` AS `date_of_commence` from `hr_company_info` ;

-- Dumping structure for view officeaid_db.vw_requests
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_requests`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_requests` AS select `a`.`id` AS `id`,`a`.`sender_name` AS `sender_name`,`a`.`sender_contact` AS `sender_contact`,`a`.`subject` AS `subject`,`a`.`description` AS `description`,`a`.`priority` AS `priority`,`a`.`file_id` AS `file_id`,`a`.`due_date` AS `due_date`,`a`.`department_id` AS `department_id`,`a`.`assigned_to` AS `assigned_to`,`a`.`status` AS `status`,`a`.`date_created` AS `date_created`,`b`.`name` AS `department_name`,`c`.`name` AS `assignee` from ((`requests` `a` left join `departments` `b` on((`a`.`department_id` = `b`.`id`))) left join `employees` `c` on((`a`.`assigned_to` = `c`.`id`))) ;

-- Dumping structure for view officeaid_db.vw_user_details
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_user_details`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_details` AS SELECT
    `a`.`id` AS `id`,
    `a`.`username` AS `username`,
    `a`.`passwd` AS `passwd`,
    `a`.`default_passwd` AS `default_passwd`,
    a.fullname,
    `a`.`phone_number`,
    `a`.`temp_employee_id` AS `employee_id`,
`a`.`biodata_id` AS `biodata_id`,
`a`.`first_login` AS `first_login`,
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
`c`.`login_url` AS `group_login_url`
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
        )
    ) ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
