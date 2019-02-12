create table `product`
(
	`product_id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`product_name` varchar(255) NOT NULL DEFAULT '',
	`product_type` varchar(255) NOT NULL DEFAULT '',
	`product_price` decimal(5,2) NOT NULL DEFAULT 0.00,
	`product_discounted_price` decimal(5,2) NOT NULL DEFAULT 0.00,
	`product_description` varchar(500) NOT NULL DEFAULT '',
	`product_image_path` varchar(500) NOT NULL DEFAULT '',
	`product_restaurant_id` bigint(20) NOT NULL DEFAULT 0,
	`product_created_by` bigint(20) NOT NULL DEFAULT 0,
	`product_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`product_updated_by` bigint(20) NOT NULL DEFAULT 0,
	`product_updated_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
);