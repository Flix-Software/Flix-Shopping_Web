ALTER TABLE `#__os_cck_content_instances_price` ADD INDEX(`fk_eid`);
ALTER TABLE `#__os_cck_content_instances_price` ADD INDEX(`fk_eiid`);
ALTER TABLE `#__os_cck_content_instances_price` ADD INDEX(`fk_fid`);
ALTER TABLE `#__os_cck_child_parent_connect` ADD INDEX(`media_type`);
ALTER TABLE `#__os_cck_entity_field` ADD INDEX(`published`);