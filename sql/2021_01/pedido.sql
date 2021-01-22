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

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) DEFAULT NULL,
  `sede_id` int(11) DEFAULT NULL,
  `personal_id` int(11) DEFAULT NULL,
  `tipo_pago_id` int(11) DEFAULT NULL,
  `concliente` tinyint(4) DEFAULT '1',
  `codigo` varchar(30) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `estado_pedido_id` int(1) DEFAULT '1',
  `caja_apertura_id` bigint(20) DEFAULT NULL,
  `caja_cierre_id` bigint(20) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT '0.00',
  `total_pagado` decimal(10,2) DEFAULT '0.00',
  `porcentaje_descuento` decimal(10,2) DEFAULT '0.00',
  `descuento` decimal(10,2) DEFAULT '0.00',
  `total_facturado` decimal(10,2) DEFAULT '0.00',
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
  KEY `fk_venta_vehiculo1_idx` (`sede_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12828 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
