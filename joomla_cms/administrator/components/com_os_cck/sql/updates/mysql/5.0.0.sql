ALTER TABLE `#__os_cck_entity_instance` ADD `quantity` INT NULL DEFAULT NULL AFTER `featured_shows`;
ALTER TABLE `#__os_cck_orders` ADD `quantity` INT NULL DEFAULT NULL AFTER `notreaded`;
ALTER TABLE `#__os_cck_orders_details` ADD `quantity` INT NULL DEFAULT NULL AFTER `payment_details`;
ALTER TABLE `#__os_cck_orders_details` ADD `comment` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `quantity`;
ALTER TABLE `#__os_cck_video_source` CHANGE `sequence_number` `fk_fid` INT(11) NULL DEFAULT NULL;
ALTER TABLE `#__os_cck_entity_instance` ADD `access` VARCHAR(64) NOT NULL AFTER `featured_shows`;
ALTER TABLE `#__os_cck_entity_instance` ADD `meta_title` VARCHAR(256) NOT NULL AFTER `access`;
ALTER TABLE `#__os_cck_entity_instance` ADD `meta_description` VARCHAR(256) NOT NULL AFTER `meta_title`;
ALTER TABLE `#__os_cck_entity_instance` ADD `meta_keywords` VARCHAR(256) NOT NULL AFTER `meta_description`;
ALTER TABLE `#__os_cck_entity_instance` ADD `meta_robots` TINYINT(2) NOT NULL DEFAULT '0' AFTER `meta_keywords`;

CREATE TABLE IF NOT EXISTS `#__os_cck_content_instances_price` (
  `price_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_eid` int(11) NOT NULL,
  `fk_eiid` int(11) NOT NULL,
  `fk_fid` int(11) NOT NULL,
  `price_name` varchar(255) NOT NULL DEFAULT '',
  `price_value` decimal(18,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ordering` tinyint(4) NOT NULL,
  PRIMARY KEY (`price_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__os_cck_orders_price` (
  `fk_order_id` int(11) NOT NULL,
  `fk_price_id` int(11) NOT NULL,
  `fk_eid` int(11) NOT NULL,
  `fk_eiid` int(11) NOT NULL,
  `fk_fid` int(11) NOT NULL,
  `price_name` varchar(255) NOT NULL DEFAULT '',
  `price_value` decimal(18,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_type` varchar(16) NOT NULL DEFAULT '',
  `price_ordering` tinyint(4) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

