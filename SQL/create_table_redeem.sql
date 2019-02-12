create table `redeem`
(
	`redeem_id` bigint(20) not null primary key auto_increment,
	`redeem_amount` decimal(18,2) not null default '0.00',
	`redeem_bank_name` varchar(255) not null default '',
	`redeem_bank_account_number` varchar(255) not null default '',
	`redeem_bank_account_name` varchar(255) not null default '',
	`redeem_status` varchar(50) not null default '',
	`redeem_status_remark` varchar(255) not null default '',
	`redeem_created_by` bigint(20) not null default '0',
	`redeem_created_date` datetime not null default '0000-00-00 00:00:00',
	`redeem_updated_by` bigint(20) not null default '0',
	`redeem_updated_date` datetime not null default '0000-00-00 00:00:00',
	`redeem_closed_by` bigint(20) not null default '0',
	`redeem_closed_date` datetime not null default '0000-00-00 00:00:00'
);