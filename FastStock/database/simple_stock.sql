/*
SQLyog Enterprise Trial - MySQL GUI v7.11 
MySQL - 5.5.5-10.1.25-MariaDB : Database - simple_stock
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`simple_stock` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `simple_stock`;

/*Table structure for table `inv_category` */

DROP TABLE IF EXISTS `inv_category`;

CREATE TABLE `inv_category` (
  `id_category` bigint(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) DEFAULT NULL,
  `category_desc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `inv_category` */

insert  into `inv_category`(`id_category`,`category_name`,`category_desc`) values (1,'Accessories','Accessories'),(2,'Baby','Baby\r'),(3,'Beauty','Beauty\r'),(4,'Book','Book\r'),(5,'Cleaning','Cleaning\r'),(6,'Clothing','Clothing\r'),(7,'Drink','Drink\r'),(8,'Electrical','Electrical\r'),(9,'Film & Music','Film & Music\r'),(10,'Food','Food\r'),(11,'Household','Household\r'),(12,'Kitchen','Kitchen\r'),(13,'Medical','Medical\r'),(14,'Office & Stationary','Office & Stationary\r'),(15,'Other','Other\r'),(16,'Otomotif','Otomotif\r'),(17,'Plumbing','Plumbing\r'),(18,'Services','Services\r'),(19,'Shoftware','Shoftware\r'),(20,'Souvenir','Souvenir\r'),(21,'Sport','Sport\r'),(22,'Tools','Tools\r'),(23,'Toys & Hobby','Toys & Hobby');

/*Table structure for table `inv_product` */

DROP TABLE IF EXISTS `inv_product`;

CREATE TABLE `inv_product` (
  `id_product` varchar(50) NOT NULL,
  `product_name` varchar(80) DEFAULT NULL,
  `product_desc` varchar(150) DEFAULT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `unit_name` varchar(30) DEFAULT NULL,
  `product_cost` varchar(120) DEFAULT NULL,
  `product_price` varchar(120) DEFAULT NULL,
  `product_img` varchar(160) DEFAULT NULL,
  `SKU` varchar(60) DEFAULT NULL,
  `product_status` varchar(10) DEFAULT NULL,
  `product_stock` int(10) DEFAULT NULL,
  `record_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_product`),
  KEY `FK_inv_product` (`category_name`),
  CONSTRAINT `FK_inv_product` FOREIGN KEY (`category_name`) REFERENCES `inv_product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `inv_product` */

/*Table structure for table `inv_supplier` */

DROP TABLE IF EXISTS `inv_supplier`;

CREATE TABLE `inv_supplier` (
  `id_supplier` bigint(10) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(50) DEFAULT NULL,
  `supplier_contact` varchar(70) DEFAULT NULL,
  `supplier_address` varchar(150) DEFAULT NULL,
  `supplier_desc` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `inv_supplier` */

/*Table structure for table `inv_unit` */

DROP TABLE IF EXISTS `inv_unit`;

CREATE TABLE `inv_unit` (
  `id_unit` bigint(10) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(30) DEFAULT NULL,
  `unit_desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_unit`),
  KEY `FK_inv_unit` (`unit_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `inv_unit` */

/*Table structure for table `inv_warehouse` */

DROP TABLE IF EXISTS `inv_warehouse`;

CREATE TABLE `inv_warehouse` (
  `id_warehouse` bigint(10) NOT NULL AUTO_INCREMENT,
  `warehouse_name` varchar(50) DEFAULT NULL,
  `warehouse_desc` varbinary(150) DEFAULT NULL,
  PRIMARY KEY (`id_warehouse`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `inv_warehouse` */

insert  into `inv_warehouse`(`id_warehouse`,`warehouse_name`,`warehouse_desc`) values (1,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
