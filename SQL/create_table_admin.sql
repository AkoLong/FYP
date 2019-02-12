create table `admin`
(
	`admin_id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`admin_name` varchar(255) NOT NULL DEFAULT '',
	`admin_email` varchar(255) NOT NULL DEFAULT '',
	`admin_pass` varchar(255) NOT NULL DEFAULT '',
	`admin_created_by` bigint(20) NOT NULL DEFAULT 0,
	`admin_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`admin_updated_by` bigint(20) NOT NULL DEFAULT 0,
	`admin_updated_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'	
);