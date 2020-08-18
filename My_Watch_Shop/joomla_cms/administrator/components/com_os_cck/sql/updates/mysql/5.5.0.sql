ALTER TABLE `#__os_cck_orders_price` ADD `сart_item` TINYINT(2) NOT NULL AFTER `price_ordering`;
ALTER TABLE `#__os_cck_orders_details` ADD `row_data` TEXT NOT NULL AFTER `comment`;
ALTER TABLE `#__os_cck_orders` ADD `number_of_downloads` INT NOT NULL DEFAULT '0' AFTER `quantity`;

CREATE TABLE IF NOT EXISTS `#__os_cck_coupons` (
  `coup_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(16) NOT NULL,
  `creation_date` date NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL,
  `value` int(11) NOT NULL,
  `used_number` int(11) NOT NULL,
  `max_uses` int(11) NOT NULL,
  `entities` varchar(255) NOT NULL,
  `user_group_ids` varchar(255) NOT NULL,
  `category_ids` varchar(255) NOT NULL,
  `published` tinyint(2) NOT NULL,
  PRIMARY KEY (`coup_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;