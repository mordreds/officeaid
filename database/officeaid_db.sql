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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

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

-- Data exporting was unselected.

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

-- Data exporting was unselected.

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

-- Data exporting was unselected.

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

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

-- Data exporting was unselected.

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

-- Data exporting was unselected.

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

-- Data exporting was unselected.

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

-- Data exporting was unselected.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

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

-- Data exporting was unselected.

-- Dumping structure for table officeaid_db.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

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

-- Data exporting was unselected.

-- Dumping structure for table officeaid_db.positions
CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table officeaid_db.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `sender_contact` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `priority` enum('low','medium','high','urgent') NOT NULL DEFAULT 'low',
  `file_id` bigint(20) NOT NULL,
  `department_id` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `updated_at` bigint(20) NOT NULL,
  `assigned_to` bigint(20) NOT NULL,
  `date_solved` datetime NOT NULL,
  `status` enum('pending','processing','resolved','declined','deleted') NOT NULL DEFAULT 'pending',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

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
  `sender_contact` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
  `subject` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
  `description` MEDIUMTEXT NOT NULL COLLATE 'latin1_swedish_ci',
  `priority` ENUM('low','medium','high','urgent') NOT NULL COLLATE 'latin1_swedish_ci',
  `file_id` BIGINT(20) NOT NULL,
  `assigned_to` BIGINT(20) NOT NULL,
  `status` ENUM('pending','processing','resolved','declined','deleted') NOT NULL COLLATE 'latin1_swedish_ci',
  `date_created` DATETIME NOT NULL,
  `assignee` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
  `department` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci'
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
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_requests` AS select `a`.`id` AS `id`,`a`.`email` AS `email`,`a`.`sender_contact` AS `sender_contact`,`a`.`subject` AS `subject`,`a`.`description` AS `description`,`a`.`priority` AS `priority`,`a`.`file_id` AS `file_id`,`a`.`assigned_to` AS `assigned_to`,`a`.`status` AS `status`,`a`.`date_created` AS `date_created`,`c`.`name` AS `assignee`,
dept.name as department 

from ((
  `requests` `a` 
  
left join `employees` `c` on((`a`.`assigned_to` = `c`.`id`))
left join `access_users` `user` on((user.username = a.email))
left join  departments dept on((dept.id = user.department_id))

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
