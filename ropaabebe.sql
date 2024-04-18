/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.28-MariaDB : Database - ropabebe
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ropabebe` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `ropabebe`;

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `idcate` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `categorias` */

insert  into `categorias`(`idcate`,`nombre`) values 
(1,'Ropa de bebe'),
(2,'Juguetes'),
(3,'Accesorios');

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombrecli` varchar(50) DEFAULT NULL,
  `edad` int(2) DEFAULT NULL,
  `sexo` varchar(2) DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2023 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `clientes` */

insert  into `clientes`(`idcliente`,`nombrecli`,`edad`,`sexo`,`telefono`,`foto`) values 
(2020,'Blanca',22,'M',2147483647,'blanca.webp'),
(2021,'Andrea',24,'M',1425225210,'andrea.jpg'),
(2022,'Carlos',28,'H',2147483647,'carlos.webp');

/*Table structure for table `compras` */

DROP TABLE IF EXISTS `compras`;

CREATE TABLE `compras` (
  `idcompra` int(11) NOT NULL AUTO_INCREMENT,
  `idcliente` int(11) DEFAULT NULL,
  `idprove` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idcompra`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `compras` */

insert  into `compras`(`idcompra`,`idcliente`,`idprove`,`fecha`,`total`,`created_at`,`updated_at`) values 
(1,2,3,'2024-04-04',500,'2024-04-04 15:54:59',NULL),
(2,1,4,'2024-04-04',40,'2024-04-04 16:52:13',NULL),
(3,NULL,NULL,'2024-04-09',NULL,'2024-04-09 00:37:50','2024-04-09 00:37:50');

/*Table structure for table `detallecompras` */

DROP TABLE IF EXISTS `detallecompras`;

CREATE TABLE `detallecompras` (
  `iddetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idcompra` int(11) DEFAULT NULL,
  `idpro` int(11) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iddetalle`)
) ENGINE=InnoDB AUTO_INCREMENT=3051 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `detallecompras` */

insert  into `detallecompras`(`iddetalle`,`idcompra`,`idpro`,`cantidad`,`precio`,`created_at`,`updated_at`) values 
(3030,1,2,3,500,'2024-04-04 15:54:00',NULL),
(3031,4,5,2,500,'2024-04-05 03:17:23','2024-04-05 03:17:23'),
(3032,2,5,4,400,'2024-04-04 21:18:41',NULL),
(3033,3,4,2,300,'2024-04-04 21:19:08',NULL),
(3034,5,7,1,250,'2024-04-04 21:19:39',NULL),
(3035,3,5,3,500,'2024-04-05 03:20:46','2024-04-05 03:20:46'),
(3036,3,5,3,500,'2024-04-05 03:20:51','2024-04-05 03:20:51'),
(3038,4,2,2,200,'2024-04-05 03:47:15','2024-04-05 03:47:15'),
(3039,5,5,5,500,'2024-04-05 03:49:42','2024-04-05 03:49:42'),
(3040,6,2,2,200,'2024-04-05 05:17:55','2024-04-05 05:17:55'),
(3041,7,5,2,500,'2024-04-05 05:22:37','2024-04-05 05:22:37'),
(3042,8,5,1,500,'2024-04-05 05:28:12','2024-04-05 05:28:12'),
(3043,10,2,1,200,'2024-04-05 06:02:10','2024-04-05 06:02:10'),
(3044,11,2,4,200,'2024-04-05 06:11:13','2024-04-05 06:11:13'),
(3045,11,2,4,200,'2024-04-05 06:11:28','2024-04-05 06:11:28'),
(3046,4,5,1,500,'2024-04-05 06:29:26','2024-04-05 06:29:26'),
(3047,5,5,1,500,'2024-04-05 06:33:41','2024-04-05 06:33:41'),
(3048,6,5,1,500,'2024-04-07 22:34:02','2024-04-07 22:34:02'),
(3049,3,2,2,200,'2024-04-07 22:41:30','2024-04-07 22:41:30'),
(3050,4,6,2,200,'2024-04-09 00:37:50','2024-04-09 00:37:50');

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `idpro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `idcate` int(11) DEFAULT NULL,
  `cantidad` int(50) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `talla` varchar(10) DEFAULT NULL,
  `genero` varchar(2) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `idpedido` int(11) DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idpro`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `productos` */

insert  into `productos`(`idpro`,`nombre`,`descripcion`,`idcate`,`cantidad`,`precio`,`talla`,`genero`,`color`,`archivo`,`idpedido`,`activo`,`created_at`,`updated_at`) values 
(1,'ropa','drgrgrfg',3,100,158.00,'1-3 meses','M','rosa','20240401_224236_1458318c3f500fc7cf364ed2624ca64abody.jpg',NULL,'Si','2024-04-01 22:42:36','2024-04-01 22:43:38'),
(2,'gorro','fsbfbffbfsbdfs',3,5,200.00,'3-6 meses','H','blanco','20240401_224301_7fcc7fe99671b19763547712fb9bf7b420231208_031302_gorro.jpg',NULL,'Si','2024-04-01 22:43:01','2024-04-07 22:41:30'),
(3,'zapatos','fddfdffd',2,43,250.00,'6-12 meses','M','rosa','20240401_224331_20231208_062918_zapatillas.jpg',NULL,'Si','2024-04-01 22:43:31','2024-04-01 22:43:39'),
(4,'sandalias','FJFJHJF',3,56,250.00,'3-6 meses','M','rosa','20240402_211452_20231208_062918_zapatillas.jpg',NULL,'Si','2024-04-02 21:14:52','2024-04-03 22:20:17'),
(5,'peluche','dfdfdfd',2,54,500.00,'1-3 meses','H','cafe','peluche.webp',NULL,'Si','2024-04-03 16:17:34','2024-04-07 22:34:02'),
(6,'sonaja','fjefnfjdnfkd',2,22,200.00,'3-6 meses','M','amarillo','20240403_222010_sonaja.jpg',NULL,'Si','2024-04-03 22:20:10','2024-04-09 00:37:50'),
(7,'vestido','iejfuhfnmgm',1,0,800.00,'6-12 meses','M','blanco y rosa','20240403_222358_vestido.jpg',NULL,'Si','2024-04-03 22:23:58','2024-04-03 22:25:24'),
(9,'pañalero','grgrgddfg',1,20,600.00,'3-6 meses','H','azul marino','20240403_222639_pañalero.jpg',NULL,'Si','2024-04-03 22:26:39','2024-04-03 22:26:43');

/*Table structure for table `proveedores` */

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `idprove` int(11) NOT NULL AUTO_INCREMENT,
  `nombrepro` varchar(50) DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  PRIMARY KEY (`idprove`)
) ENGINE=InnoDB AUTO_INCREMENT=4448 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `proveedores` */

insert  into `proveedores`(`idprove`,`nombrepro`,`telefono`) values 
(4444,'Litte Saps',2147483647),
(4445,'Baby Store ',2147483647),
(4446,'Baby Boutique Solutions',2147483647),
(4447,'Tiny Threads',2147483647);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `user` varchar(40) DEFAULT NULL,
  `pasw` varchar(100) DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`idu`,`nombre`,`user`,`pasw`,`activo`,`tipo`) values 
(1,'evelin','evelin2@gmail.com','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','si','administrador'),
(2,'coque','jorge@gmail.com','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','si','user');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
