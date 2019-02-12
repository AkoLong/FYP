create table `order`
(
	`order_id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`order_product_type_amount` int(10) NOT NULL DEFAULT '0',
	`order_restaurant_id` bigint(20) NOT NULL DEFAULT '0',
	`order_status` varchar(50) NOT NULL DEFAULT '',
	`order_status_remark` varchar(500) NOT NULL DEFAULT '',
	`order_grand_total` decimal(12,2) NOT NULL DEFAULT '0.00',
	`order_payment_method` varchar(50) NOT NULL DEFAULT '',
	`order_delivery_address` varchar(500) NOT NULL DEFAULT '',
	`order_delivery_fee` decimal(10,2) NOT NULL DEFAULT '0.00',
	`order_created_by` bigint(20) NOT NULL DEFAULT '0',
	`order_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`order_updated_by` bigint(20) NOT NULL DEFAULT '0',
	`order_updated_date`  datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`order_closed_by` bigint(20) NOT NULL DEFAULT '0',
	`order_closed_date`  datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
);