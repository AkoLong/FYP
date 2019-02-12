create table `review`
(
	`review_id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`review_content` varchar(500) NOT NULL DEFAULT '',
	`review_rating` int(1) NOT NULL DEFAULT '0',
	`review_customer_name` varchar(255) NOT NULL DEFAULT '',
	`review_restaurant_id`  bigint(20) NOT NULL DEFAULT '0',
	`review_restaurant_name` varchar(255) NOT NULL DEFAULT '',
	`review_created_by` bigint(20) NOT NULL DEFAULT '0',
	`review_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
	
);