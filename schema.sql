CREATE TABLE IF NOT EXISTS `table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `field_1` varchar(255),
  `field_2` varchar(255),
  `field_3` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;