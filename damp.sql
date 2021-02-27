create table `page` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`header` VARCHAR (255) DEFAULT '',
`content` TEXT,
`short_content` TEXT,
`status` int(11) DEFAULT 0,
`category_id` int(11) DEFAULT 0,

PRIMARY KEY (`id`)
);


DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`category_id` int(11) DEFAULT 0,
`meta_title` VARCHAR (255) DEFAULT '',
`meta_description` TEXT,
`header` VARCHAR (255) DEFAULT '',
`content` TEXT,
`short_content` TEXT,
`price` DECIMAL (15,2) DEFAULT 0,
`created_at` int(11) DEFAULT 0,
`updated_at` int(11) DEFAULT 0,
`status` int(11) DEFAULT 0,
`image` TEXT,
PRIMARY KEY(`id`)
);


CREATE TABLE `product_params`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`category_id` int(11) NOT NULL,
`status` int(11) DEFAULT 0,
`pos` int(11) DEFAULT 0,
PRIMARY KEY(`id`)
);


CREATE TABLE 'product_params_translate'(
`id` int(11) NOT NULL AUTO_INCREMENT,
`product_params_id` int(11) DEFAULT 0,
`name` VARCHAR(255) NOT NULL,
`language` VARCHAR(255) DEFAULT '',
`description` TEXT,
PRIMARY KEY(`id`)
;)

CREATE TABLE `product_params_value`(
`id` int(11) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(`id`)
);

ALTER TABLE `product_params_value` ADD `product_id` int(11) DEFAULT NULL,
ALTER TABLE `product_params_value` ADD `params_id` int(11) DEFAULT NULL,

CREATE TABLE `product_params_value_translate`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`product_params_value_id` int(11) DEFAULT 0,
`language` VARCHAR (255) DEFAULT '',
`value` VARCHAR (255) NOT NULL ,

PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`created_at` int(11) DEFAULT 0,
`updated_at` int(11) DEFAULT 0,
`status` int(11) DEFAULT 0,
`index` VARCHAR (255) DEFAULT '',
`image` VARCHAR (255) DEFAULT 0,
PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `category_translate`;
CREATE TABLE `category_translate`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`category_id` int(11) DEFAULT 0,
`language` VARCHAR (255) DEFAULT '',
`header` VARCHAR (255) DEFAULT '',
`content` TEXT,
`short_content` TEXT,
PRIMARY KEY(`id`)
);


DROP TABLE IF EXISTS `page`;
CREATE TABLE `page`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`status` int(11) DEFAULT 0,
`index` VARCHAR (255) DEFAULT '',
`alias` VARCHAR (255) DEFAULT '',
`category_id` INT(11) DEFAULT NULL,
`created_at` int(11) DEFAULT 0,
`updated_at` int(11) DEFAULT 0,
PRIMARY KEY(`id`)
)

DROP TABLE IF EXISTS `page_translate`;
create table `page_translate`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`page_id` INT(11) DEFAULT 0,
`language` VARCHAR (255) DEFAULT '',
`header` VARCHAR (255) DEFAULT '',
`header2` VARCHAR (255) DEFAULT '',
`content` TEXT,
`short_content` TEXT,
`meta_title` varchar (255) default '',
`meta_description` VARCHAR (255) DEFAULT '',
`images` TEXT,
PRIMARY KEY (`id`);
)

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE `delivery`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`status` int(11) DEFAULT 0,
`pos` int(11) DEFAULT 0,
PRIMARY KEY(`id`);
)


DROP TABLE IF EXISTS `delivery_translate`;
CREATE TABLE `delivery_translate`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`delivery_id` int(11) DEFAULT 0,
`name` VARCHAR (255) DEFAULT '',
`description` TEXT,
`price` DECIMAL(15,4) DEFAULT 0,
PRIMARY KEY(`id`)
)

DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`status` int(11) DEFAULT 0,
`pos` int(11) DEFAULT 0,
PRIMARY KEY(`id`);
)


DROP TABLE IF EXISTS `payment_translate`;
CREATE TABLE `payment_translate`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`delivery_id` int(11) DEFAULT 0,
`name` VARCHAR (255) DEFAULT '',
`description` TEXT,
`price` DECIMAL(15,4) DEFAULT 0,
PRIMARY KEY(`id`)
)


DROP TABLE IF EXISTS `language`;
CREATE TABLE `language`(
`id` int(11) not null AUTO_INCREMENT,
`title` VARCHAR (255) DEFAULT '',
`code` VARCHAR (255) DEFAULT '',
`locale` VARCHAR (255) DEFAULT '',
`icon` VARCHAR (255) DEFAULT '',
`status` INT (2) DEFAULT 0,
`pos` INT (11) DEFAULT 0,
PRIMARY KEY(`id`);
)

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`(
`id` int(11) not null AUTO_INCREMENT,
`user_id` int(11) DEFAULT NULL,
`name` VARCHAR (255) DEFAULT '',
`surname` VARCHAR (255) DEFAULT '',
`patronymic` VARCHAR (255) DEFAULT '',
`phone` VARCHAR (255) DEFAULT '',
`email` VARCHAR (255) DEFAULT '',
`total` decimal (15,4) DEFAULT 0,
`count` int(11) DEFAULT 0,
`status` int(11) DEFAULT 0,
`content` TEXT,
`delivery_id` int(11) DEFAULT 0,
`payment_id` int(11) DEFAULT 0,
`ip` varchar (255) DEFAULT '',
`system_info` TEXT,
PRIMARY KEY(`id`);
);

ALTER TABLE `order` ADD hash VARCHAR (255) DEFAULT '';
DROP TABLE IF EXISTS `order_item`;
CREATE TABLE `order_item`(
`id` int(11) not null AUTO_INCREMENT,
`order_id` int(11) DEFAULT NULL,
`product_id` int(11) DEFAULT NULL,
`name` varchar (255) DEFAULT '',
`price` decimal (15,4) DEFAULT '',
`count` int(11) DEFAULT 0,
`total` decimal (15,4) DEFAULT 0,
PRIMARY KEY(`id`);
)


ALTER TABLE `user` ADD surname VARCHAR (255) DEFAULT '';
ALTER TABLE `user` ADD patronymic VARCHAR (255) DEFAULT '';
ALTER TABLE `user` ADD phone VARCHAR (255) DEFAULT '';

CREATE TABLE `user` (
`id` int(11) not null AUTO_INCREMENT,
`username` VARCHAR (255) DEFAULT '',
`auth_key` VARCHAR (32) DEFAULT '',
`password_hash` varchar (255) DEFAULT '',
`password_reset_token` varchar (255) DEFAULT '',
`email` varchar (255) DEFAULT '',
`verification_token` varchar (255) DEFAULT '',
`status` int(11) DEFAULT 0,
`role` VARCHAR (10) DEFAULT '',
`created_at` int(11) DEFAULT 0,
`updated_at` int(11) DEFAULT 0,
`last_visit` int(11) DEFAULT 0,

PRIMARY KEY(`id`)
);

CREATE TABLE `user_to_order`(
`id` int(11) not null AUTO_INCREMENT,
`user_id` int(11) DEFAULT 0,
`order_id` int(11) DEFAULT 0,

PRIMARY KEY(`id`)
)









