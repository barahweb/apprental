/*
SQLyog Professional v12.4.3 (64 bit)
MySQL - 10.4.22-MariaDB : Database - pemesananmobil
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pemesananmobil` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `pemesananmobil`;

/*Table structure for table `customerservice` */

DROP TABLE IF EXISTS `customerservice`;

CREATE TABLE `customerservice` (
  `id_customerservice` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama_customerservice` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_customerservice`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customerservice` */

insert  into `customerservice`(`id_customerservice`,`username`,`password`,`nama_customerservice`) values 
(1,'cs1','123','umam'),
(2,'cs2','123','bangkit'),
(3,'cs3','123','rian');

/*Table structure for table `mobil` */

DROP TABLE IF EXISTS `mobil`;

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL AUTO_INCREMENT,
  `id_customerservice` int(11) DEFAULT NULL,
  `id_type` int(20) DEFAULT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `warna` varchar(100) DEFAULT NULL,
  `no_plat` varchar(10) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `harga` float DEFAULT NULL,
  `gambar` blob DEFAULT NULL,
  PRIMARY KEY (`id_mobil`),
  KEY `id_type` (`id_type`),
  KEY `id_admin` (`id_customerservice`),
  CONSTRAINT `mobil_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`),
  CONSTRAINT `mobil_ibfk_3` FOREIGN KEY (`id_customerservice`) REFERENCES `customerservice` (`id_customerservice`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mobil` */

insert  into `mobil`(`id_mobil`,`id_customerservice`,`id_type`,`merk`,`warna`,`no_plat`,`tahun`,`status`,`harga`,`gambar`) values 
(31,1,8,'Toyota Yaris','Putih','AB 3416 RE',2020,'Tersedia',300000,'Toyota Yaris Terbaru 2015_1.png'),
(32,1,8,'Toyota Yaris','Merah','AB 4918 CA',2020,'Tersedia',300000,'yaris 2020_1.jpg'),
(33,1,8,'Honda Jazz','Hitam','AB 3187 AO',2020,'Tersedia',300000,'jazz 2020 hitam_1.jpg'),
(34,1,8,'Honda Brio','Kuning','AB 5638 CE',2018,'Tersedia',250000,'Honda-Brio-2018.png'),
(35,1,7,'Nisan Grand Livina','Hitam','AB 6391 DE',2018,'Tersedia',275000,'grand livina_1.jpg'),
(36,1,6,'Toyota Avanza Veloz','Abu-Abu','AB 1069 GA',2020,'Tersedia',275000,'veloz_1.jpg'),
(37,1,6,'Mitsubishi Expander','Silver','AB 1069 YI',2019,'Tersedia',300000,'expander_1.jpg'),
(38,1,7,'Toyota Kijang Inova','Hitam','AB 6391 CA',2016,'Tersedia',300000,'kijang inova_1.png'),
(39,1,8,'Daihatsu Ayla','Merah','AB 7428 OG',2018,'Tersedia',250000,'ayla merah_1.jpg'),
(40,1,6,'Toyota Avanza','Hitam','AB 4635 DA',2017,'Tersedia',275000,'avanza hitam_1.jpg'),
(41,1,6,'Toyota Avanza','Silver','AB 3315 XK',2016,'Tersedia',250000,'11avanza abu.jpg'),
(42,1,6,'Toyota Avanza','Putih','AB 2810 EA',2019,'Tersedia',250000,'12avanza putih.jpg'),
(43,1,8,'Honda Brio','Putih','AB 3810 EO',2014,'Tersedia',250000,'13brio putih.jpg'),
(44,1,9,' Toyota Kijang Innova Reborn','Putih','B 1510 RDA',2019,'Tersedia',350000,'14reborn.png'),
(45,1,8,'Honda Brio Satya','Hitam','AB 4873 XK',2019,'Tersedia',250000,'15brio satya hitam.png'),
(46,1,8,'Honda Brio Satya','Putih','AB 3810 VO',2020,'Tersedia',250000,'16brio satya putih.png'),
(47,1,6,'Toyota Calya','Silver Metalic','AB 3810 EE',2019,'Tersedia',250000,'17callya.jpg'),
(48,1,6,'Toyota Calya','Putih','AB 3810 RO',2018,'Tersedia',250000,'18calya putuh.jpg'),
(49,1,6,'Honda Jazz','Silver Metalic','AB 5730 AA',2017,'Tersedia',275000,'19jazz2014.jpg'),
(50,1,8,'Honda Jazz','Merah','AB 1715 XK',2019,'Tersedia',275000,'20jazz 2020.jpg'),
(51,1,10,' Toyota Kijang Innova','Silver Metalic','AB 3825 EA',2015,'Tersedia',350000,'21inova disel.jpg'),
(52,1,10,'Mitsubishi Pajero Sport','Hitam','AB 3811 VO',2018,'Tersedia',450000,'22pajero hitam.jpg');

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `alamat` longtext DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `no_ktp` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id_pelanggan`,`nama`,`username`,`alamat`,`gender`,`no_telepon`,`no_ktp`,`password`) values 
(18,'Muhammad Iqbal Yafi','iqbal','yogyakarta','Laki-Laki','082241569346','6866252006980001','12345'),
(19,'riko hadi prayoga','yoga','riau','Laki-Laki','082267190951','121466488699675','123'),
(20,'Fandy Safwan','fandy','jogja','Laki-Laki','082267190955','1214664886996753','123'),
(21,'lavin vebri','alvin','jogja','Laki-Laki','082237190951','121466458699675','123'),
(22,'putra adinata','putra','jambi','Laki-Laki','082267190962','121466458696301','123'),
(23,'reza septiana saputri','reza','medan','Perempuan','082267518951','121466440399675','123'),
(24,'resi ratna sari','resi','kalimantan','Laki-Laki','082260918951','121466488699036','123'),
(25,'yella septia amanda','yella','sako','Perempuan','082267196208','126036458696301','123'),
(26,'nela fitria ningsih','nela','aceh','Perempuan','082260679490','121466488690001','123'),
(27,'lodia kurniawati','lodia','lombok','Perempuan','082260916539','12146648834036','123');

/*Table structure for table `transaksi_peminjaman` */

DROP TABLE IF EXISTS `transaksi_peminjaman`;

CREATE TABLE `transaksi_peminjaman` (
  `id_peminjaman` varchar(25) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_customerservice` int(11) DEFAULT NULL,
  `id_mobil` int(11) DEFAULT NULL,
  `tgl_peminjaman` datetime DEFAULT NULL,
  `tgl_kembali` datetime DEFAULT NULL,
  `tgl_pengembalian` datetime DEFAULT NULL,
  `status_peminjaman` varchar(25) DEFAULT NULL,
  `status_pengembalian` varchar(25) DEFAULT NULL,
  `pdf` varchar(250) DEFAULT NULL,
  `harga_peminjaman` float DEFAULT NULL,
  `denda` float DEFAULT NULL,
  PRIMARY KEY (`id_peminjaman`),
  KEY `id_mobil` (`id_mobil`),
  KEY `id_customer` (`id_pelanggan`),
  KEY `id_admin` (`id_customerservice`),
  CONSTRAINT `transaksi_peminjaman_ibfk_5` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`),
  CONSTRAINT `transaksi_peminjaman_ibfk_6` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  CONSTRAINT `transaksi_peminjaman_ibfk_7` FOREIGN KEY (`id_customerservice`) REFERENCES `customerservice` (`id_customerservice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksi_peminjaman` */

insert  into `transaksi_peminjaman`(`id_peminjaman`,`id_pelanggan`,`id_customerservice`,`id_mobil`,`tgl_peminjaman`,`tgl_kembali`,`tgl_pengembalian`,`status_peminjaman`,`status_pengembalian`,`pdf`,`harga_peminjaman`,`denda`) values 
('RENT-1SDT3WVCOG',26,2,33,'2022-01-24 22:19:38','2022-01-25 22:19:38','2022-01-24 22:20:00','4','Sesuai Jadwal','https://app.sandbox.midtrans.com/snap/v1/transactions/3eef047e-fbfd-4527-8151-48c51172c5c8/pdf',300000,0),
('RENT-2WZ47TP4LB',25,2,34,'2022-01-24 22:18:14','2022-01-25 22:18:14','2022-01-24 22:18:00','4','Sesuai Jadwal','https://app.sandbox.midtrans.com/snap/v1/transactions/f3348d9c-3b26-4841-946d-ef7c2e49c13f/pdf',250000,0),
('RENT-53VAJ6STSJ',18,NULL,42,'2022-01-24 22:21:39','2022-01-26 22:21:39',NULL,'3',NULL,'https://app.sandbox.midtrans.com/snap/v1/transactions/fa7d3dc9-e0d5-4218-ade1-f5d2262a15e5/pdf',500000,NULL),
('RENT-8KZ05JWC3R',24,2,32,'2022-01-24 22:16:49','2022-01-25 22:16:49','2022-01-24 22:17:00','4','Sesuai Jadwal','https://app.sandbox.midtrans.com/snap/v1/transactions/4b4ce32b-5b33-4606-b6fa-7967b678d82d/pdf',300000,0),
('RENT-9BWZSH8IX9',22,NULL,52,'2022-01-24 22:29:04','2022-01-30 22:29:04',NULL,'3',NULL,'https://app.sandbox.midtrans.com/snap/v1/transactions/15ecc0d9-26f7-48fd-8c03-5757be8c14a9/pdf',2700000,NULL),
('RENT-DPYPL47QL7',19,NULL,39,'2022-01-25 22:23:43','2022-01-29 22:23:43',NULL,'3',NULL,'https://app.sandbox.midtrans.com/snap/v1/transactions/404e132d-3946-4c5c-8638-5dfcf6d96312/pdf',1000000,NULL),
('RENT-EH615ZEVWJ',22,1,50,'2022-01-26 22:09:40','2022-01-27 22:09:40','2022-01-24 22:10:00','4','Sesuai Jadwal','https://app.sandbox.midtrans.com/snap/v1/transactions/bb8ff67b-f2e2-4950-aefc-807904bd5a4c/pdf',275000,0),
('RENT-GVPPCMP7Z6',19,1,36,'2022-01-25 21:49:49','2022-01-26 21:49:49','2022-01-24 21:50:00','4','Sesuai Jadwal','https://app.sandbox.midtrans.com/snap/v1/transactions/96991677-4dc0-4142-86f3-717a52c69d14/pdf',275000,0),
('RENT-LIMYYGAJHJ',24,NULL,37,'2022-01-26 17:22:25','2022-01-27 17:22:25',NULL,'5',NULL,'https://app.sandbox.midtrans.com/snap/v1/transactions/4e053df7-5a38-4e88-8f7e-fa083353a2f3/pdf',300000,NULL),
('RENT-MI1NL2AQG3',21,NULL,33,'2022-01-24 22:26:36','2022-01-27 22:26:36',NULL,'3',NULL,'https://app.sandbox.midtrans.com/snap/v1/transactions/e0fcc8c5-8604-444f-bec8-674905b3168a/pdf',900000,NULL),
('RENT-PQG8BU69GM',23,2,33,'2022-01-24 22:13:27','2022-01-25 22:13:27','2022-01-24 22:14:00','4','Sesuai Jadwal','https://app.sandbox.midtrans.com/snap/v1/transactions/b0d14844-a365-4505-929d-e5d1e39f72f2/pdf',300000,0),
('RENT-RAZE8MLLX3',21,1,44,'2022-01-24 22:03:49','2022-01-25 22:03:49','2022-01-24 22:04:00','4','Sesuai Jadwal','https://app.sandbox.midtrans.com/snap/v1/transactions/a8a32698-cf2a-4fa5-8968-0c9dc54ba2ab/pdf',350000,0),
('RENT-UGIJXD853O',18,1,37,'2022-01-25 21:42:25','2022-01-26 21:42:25','2022-01-24 21:43:00','4','Sesuai Jadwal','https://app.sandbox.midtrans.com/snap/v1/transactions/22b908e7-6779-4fc0-a418-b62d65fe3b2a/pdf',300000,0),
('RENT-X8E5G06TZN',20,NULL,43,'2022-01-24 22:27:56','2022-01-31 22:27:56',NULL,'3',NULL,'https://app.sandbox.midtrans.com/snap/v1/transactions/61eefe06-5ef1-4415-97ee-0c06e0ccdb90/pdf',1750000,NULL),
('RENT-XG1L8JM96A',20,1,48,'2022-01-25 00:03:48','2022-01-26 12:03:48','2022-01-24 22:03:00','4','Sesuai Jadwal','https://app.sandbox.midtrans.com/snap/v1/transactions/f5003c61-b1c0-4f72-aa97-ade98ca4c01d/pdf',250000,0),
('RENT-ZBMR6GEN8H',24,NULL,32,'2022-01-27 10:41:45','2022-01-28 10:41:45',NULL,'5',NULL,'https://app.sandbox.midtrans.com/snap/v1/transactions/8e5fdaec-e710-4327-b880-b00d710b40e9/pdf',300000,NULL),
('RENT-ZH58ZO6VU9',25,NULL,36,'2022-01-27 13:54:51','2022-01-28 13:54:51',NULL,'1',NULL,'https://app.sandbox.midtrans.com/snap/v1/transactions/91ea1a75-f2e0-4d4e-af03-d77bca6204d9/pdf',275000,NULL);

/*Table structure for table `type` */

DROP TABLE IF EXISTS `type`;

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nama_type` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `type` */

insert  into `type`(`id_type`,`nama_type`) values 
(6,'SUV'),
(7,'MPV'),
(8,'Sedan'),
(9,'Tipe V Diesel'),
(10,'Tipe G Diesel');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
