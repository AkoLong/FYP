create table `topup`
(
	`topup_id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`topup_amount` decimal(18,2) NOT NULL DEFAULT '0.00',
	`topup_payment_method` varchar(50) NOT NULL DEFAULT '',
	`topup_reference_code` varchar(50) NOT NULL DEFAULT '',
	`topup_created_by` bigint(20) NOT NULL DEFAULT '0',
	`topup_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
);