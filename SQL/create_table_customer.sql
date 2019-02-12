create table `customer`
(
	`customer_id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`customer_name` varchar(255) NOT NULL DEFAULT '',
	`customer_gender` varchar(10) NOT NULL DEFAULT '',
	`customer_birth` date NOT NULL DEFAULT '0000-00-00',
	`customer_contact` varchar(50) NOT NULL DEFAULT '',
	`customer_address` varchar(500) NOT NULL DEFAULT '',
	`customer_state` varchar(50) NOT NULL DEFAULT '',
	`customer_zip` varchar(5) NOT NULL DEFAULT '',
	`customer_sub` int(1) NOT NULL DEFAULT 0,
	`customer_email` varchar(255) NOT NULL DEFAULT '',
	`customer_pass` varchar(255) NOT NULL DEFAULT '',
	`customer_secure` varchar(255) NOT NULL DEFAULT '',
	`customer_balance` decimal(18,2) NOT NULL DEFAULT 0.00,
	`customer_status`	varchar(50) NOT NULL DEFAULT '',
	`customer_status_remark` varchar(500) NOT NULL DEFAULT '',
	`customer_created_by` bigint(20) NOT NULL DEFAULT 0,
	`customer_created_date` datetime NOT NULL DEFAULT '0000-00-00',
	`customer_updated_by` bigint(20) NOT NULL DEFAULT 0,
	`customer_updated_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
);