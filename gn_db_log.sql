# Host: localhost  (Version 5.5.5-10.1.26-MariaDB)
# Date: 2017-11-01 17:11:02
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "log"
#

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `err_code` int(11) DEFAULT NULL,
  `err_msg` varchar(255) DEFAULT NULL,
  `test_time` int(11) DEFAULT NULL,
  `success_no` int(11) DEFAULT NULL,
  `dev_mac` varchar(255) DEFAULT NULL,
  `dev_ip` varchar(255) DEFAULT NULL,
  `created_at` time DEFAULT NULL,
  `updated_at` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "test"
#

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_no` varchar(255) DEFAULT NULL,
  `phone_brand` varchar(255) DEFAULT NULL,
  `phone_model` varchar(255) DEFAULT NULL,
  `os_type` int(11) DEFAULT NULL,
  `os_ver` varchar(255) DEFAULT NULL,
  `rom_system` varchar(255) DEFAULT NULL,
  `rom_ver` varchar(255) DEFAULT NULL,
  `router_brand` varchar(255) DEFAULT NULL,
  `router_model` varchar(255) DEFAULT NULL,
  `wifi_ssid` varchar(255) DEFAULT NULL,
  `wifi_pwd` varchar(255) DEFAULT NULL,
  `created_at` time DEFAULT NULL,
  `updated_at` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
