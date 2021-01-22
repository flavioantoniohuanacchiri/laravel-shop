/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.7.32-ndb-7.6.16 : Database - php_isil
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`php_isil` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `php_isil`;

/*Table structure for table `pedido_detalle` */

DROP TABLE IF EXISTS `pedido_detalle`;

CREATE TABLE `pedido_detalle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT '1' COMMENT '1 producto, 2 combo',
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `combo_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '0',
  `facturado` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_created_at` varchar(45) DEFAULT NULL,
  `user_updated_at` varchar(45) DEFAULT NULL,
  `user_deleted_at` varchar(45) DEFAULT NULL,
  `userid_created_at` int(11) DEFAULT NULL,
  `userid_updated_at` int(11) DEFAULT NULL,
  `userid_deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_venta_vehiculo1_idx` (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38960 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
