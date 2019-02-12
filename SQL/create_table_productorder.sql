create table `productorder`
(
	`productorder_id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`productorder_order_id` bigint(20) NOT NULL DEFAULT '0',
	`productorder_product_id` bigint(20) NOT NULL DEFAULT '0',
	`productorder_quantity` int(2) NOT NULL DEFAULT '0',
	`productorder_product_price` decimal(5,2) NOT NULL DEFAULT '0.00',
	`productorder_totprice` decimal(7,2) NOT NULL DEFAULT '0.00'
);