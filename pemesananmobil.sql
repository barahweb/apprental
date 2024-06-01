/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : pemesananmotor

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 20/08/2023 16:49:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for customerservice
-- ----------------------------
DROP TABLE IF EXISTS `customerservice`;
CREATE TABLE `customerservice`  (
  `id_customerservice` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_customerservice` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_customerservice`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customerservice
-- ----------------------------
INSERT INTO `customerservice` VALUES (1, 'cs1', '123', 'umam');
INSERT INTO `customerservice` VALUES (2, 'cs2', '123', 'bangkit');
INSERT INTO `customerservice` VALUES (3, 'cs3', '123', 'rian');
INSERT INTO `customerservice` VALUES (4, 'pemilik', '123', 'pemilik');

-- ----------------------------
-- Table structure for motor
-- ----------------------------
DROP TABLE IF EXISTS `motor`;
CREATE TABLE `motor`  (
  `id_motor` int(11) NOT NULL AUTO_INCREMENT,
  `id_customerservice` int(11) NULL DEFAULT NULL,
  `id_type` int(20) NULL DEFAULT NULL,
  `merk` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `warna` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_plat` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun` year NULL DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga` float NULL DEFAULT NULL,
  `gambar` blob NULL,
  PRIMARY KEY (`id_motor`) USING BTREE,
  INDEX `id_type`(`id_type`) USING BTREE,
  INDEX `id_admin`(`id_customerservice`) USING BTREE,
  CONSTRAINT `motor_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `motor_ibfk_3` FOREIGN KEY (`id_customerservice`) REFERENCES `customerservice` (`id_customerservice`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of motor
-- ----------------------------
INSERT INTO `motor` VALUES (31, 1, 8, 'Toyota Yaris', 'Putih', 'AB 3416 RE', 2020, 'Tersedia', 300000, 0x546F796F7461205961726973205465726261727520323031355F312E706E67);
INSERT INTO `motor` VALUES (32, 1, 8, 'Toyota Yaris', 'Merah', 'AB 4918 CA', 2020, 'Tersedia', 300000, 0x796172697320323032305F312E6A7067);
INSERT INTO `motor` VALUES (33, 1, 8, 'Honda Jazz', 'Hitam', 'AB 3187 AO', 2020, 'Tersedia', 300000, 0x6A617A7A203230323020686974616D5F312E6A7067);
INSERT INTO `motor` VALUES (34, 1, 8, 'Honda Brio', 'Kuning', 'AB 5638 CE', 2018, 'Tersedia', 250000, 0x486F6E64612D4272696F2D323031382E706E67);
INSERT INTO `motor` VALUES (35, 1, 7, 'Nisan Grand Livina', 'Hitam', 'AB 6391 DE', 2018, 'Tersedia', 275000, 0x6772616E64206C6976696E615F312E6A7067);
INSERT INTO `motor` VALUES (36, 1, 6, 'Toyota Avanza Veloz', 'Abu-Abu', 'AB 1069 GA', 2020, 'Tersedia', 275000, 0x76656C6F7A5F312E6A7067);
INSERT INTO `motor` VALUES (37, 1, 6, 'Mitsubishi Expander', 'Silver', 'AB 1069 YI', 2019, 'Tersedia', 300000, 0x657870616E6465725F312E6A7067);
INSERT INTO `motor` VALUES (38, 1, 7, 'Toyota Kijang Inova', 'Hitam', 'AB 6391 CA', 2016, 'Tersedia', 300000, 0x6B696A616E6720696E6F76615F312E706E67);
INSERT INTO `motor` VALUES (39, 1, 8, 'Daihatsu Ayla', 'Merah', 'AB 7428 OG', 2018, 'Tersedia', 250000, 0x61796C61206D657261685F312E6A7067);
INSERT INTO `motor` VALUES (40, 1, 6, 'Toyota Avanza', 'Hitam', 'AB 4635 DA', 2017, 'Tersedia', 275000, 0x6176616E7A6120686974616D5F312E6A7067);
INSERT INTO `motor` VALUES (41, 1, 6, 'Toyota Avanza', 'Silver', 'AB 3315 XK', 2016, 'Tersedia', 250000, 0x31316176616E7A61206162752E6A7067);
INSERT INTO `motor` VALUES (42, 1, 6, 'Toyota Avanza', 'Putih', 'AB 2810 EA', 2019, 'Tersedia', 250000, 0x31326176616E7A612070757469682E6A7067);
INSERT INTO `motor` VALUES (43, 1, 8, 'Honda Brio', 'Putih', 'AB 3810 EO', 2014, 'Tersedia', 250000, 0x31336272696F2070757469682E6A7067);
INSERT INTO `motor` VALUES (44, 1, 9, ' Toyota Kijang Innova Reborn', 'Putih', 'B 1510 RDA', 2019, 'Tersedia', 350000, 0x31347265626F726E2E706E67);
INSERT INTO `motor` VALUES (45, 1, 8, 'Honda Brio Satya', 'Hitam', 'AB 4873 XK', 2019, 'Tersedia', 250000, 0x31356272696F20736174796120686974616D2E706E67);
INSERT INTO `motor` VALUES (46, 1, 8, 'Honda Brio Satya', 'Putih', 'AB 3810 VO', 2020, 'Tersedia', 250000, 0x31366272696F2073617479612070757469682E706E67);
INSERT INTO `motor` VALUES (47, 1, 6, 'Toyota Calya', 'Silver Metalic', 'AB 3810 EE', 2019, 'Tersedia', 250000, 0x313763616C6C79612E6A7067);
INSERT INTO `motor` VALUES (48, 1, 6, 'Toyota Calya', 'Putih', 'AB 3810 RO', 2018, 'Tersedia', 250000, 0x313863616C79612070757475682E6A7067);
INSERT INTO `motor` VALUES (49, 1, 6, 'Honda Jazz', 'Silver Metalic', 'AB 5730 AA', 2017, 'Tersedia', 275000, 0x31396A617A7A323031342E6A7067);
INSERT INTO `motor` VALUES (50, 1, 8, 'Honda Jazz', 'Merah', 'AB 1715 XK', 2019, 'Tersedia', 275000, 0x32306A617A7A20323032302E6A7067);
INSERT INTO `motor` VALUES (51, 1, 10, ' Toyota Kijang Innova', 'Silver Metalic', 'AB 3825 EA', 2015, 'Tersedia', 350000, 0x3231696E6F766120646973656C2E6A7067);
INSERT INTO `motor` VALUES (52, 1, 10, 'Mitsubishi Pajero Sport', 'Hitam', 'AB 3811 VO', 2018, 'Tersedia', 450000, 0x323270616A65726F20686974616D2E6A7067);
INSERT INTO `motor` VALUES (53, 1, 7, 'Toyota', 'Biru', 'AB2310IA', 2023, 'Tersedia', 20000, 0x466750596A325456734145746375412E6A7067);

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan`  (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gender` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_ktp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
INSERT INTO `pelanggan` VALUES (18, 'Muhammad Iqbal Yafi', 'iqbal', 'yogyakarta', 'Laki-Laki', '082241569346', '6866252006980001', '12345');
INSERT INTO `pelanggan` VALUES (19, 'riko hadi prayoga', 'yoga', 'riau', 'Laki-Laki', '082267190951', '121466488699675', '123');
INSERT INTO `pelanggan` VALUES (20, 'Fandy Safwan', 'fandy', 'jogja', 'Laki-Laki', '082267190955', '1214664886996753', '123');
INSERT INTO `pelanggan` VALUES (21, 'lavin vebri', 'alvin', 'jogja', 'Laki-Laki', '082237190951', '121466458699675', '123');
INSERT INTO `pelanggan` VALUES (22, 'putra adinata', 'putra', 'jambi', 'Laki-Laki', '082267190962', '121466458696301', '123');
INSERT INTO `pelanggan` VALUES (23, 'reza septiana saputri', 'reza', 'medan', 'Perempuan', '082267518951', '121466440399675', '123');
INSERT INTO `pelanggan` VALUES (24, 'resi ratna sari', 'resi', 'kalimantan', 'Laki-Laki', '082260918951', '121466488699036', '123');
INSERT INTO `pelanggan` VALUES (25, 'yella septia amanda', 'yella', 'sako', 'Perempuan', '082267196208', '126036458696301', '123');
INSERT INTO `pelanggan` VALUES (26, 'nela fitria ningsih', 'nela', 'aceh', 'Perempuan', '082260679490', '121466488690001', '123');
INSERT INTO `pelanggan` VALUES (27, 'lodia kurniawati', 'lodia', 'lombok', 'Perempuan', '082260916539', '12146648834036', '123');
INSERT INTO `pelanggan` VALUES (28, 'kasdk', 'Testing', 'Bebas', 'Laki-Laki', '087912371', '2812931723', '123456');
INSERT INTO `pelanggan` VALUES (29, 'barah', 'barah', '1', 'Laki-Laki', '087802472524', '01312312', '123');

-- ----------------------------
-- Table structure for sopir
-- ----------------------------
DROP TABLE IF EXISTS `sopir`;
CREATE TABLE `sopir`  (
  `id_sopir` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sopir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gender` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_telepon` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_ktp` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga_sewa` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ketersediaan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_sopir`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sopir
-- ----------------------------
INSERT INTO `sopir` VALUES (1, 'Andre Taulani', 'Aktif', 'Mejing Wetan RT 006 RW 006 ', 'Laki-Laki', '087802472524', '1110018799923', '100000', 'booked');
INSERT INTO `sopir` VALUES (2, 'Verdy', 'Aktif', 'Yogyakarta', 'Laki-Laki', '085654898132', '1110018799922', '200000', NULL);

-- ----------------------------
-- Table structure for transaksi_peminjaman
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_peminjaman`;
CREATE TABLE `transaksi_peminjaman`  (
  `id_peminjaman` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_pelanggan` int(11) NULL DEFAULT NULL,
  `id_customerservice` int(11) NULL DEFAULT NULL,
  `id_motor` int(11) NULL DEFAULT NULL,
  `tgl_peminjaman` datetime(0) NULL DEFAULT NULL,
  `tgl_kembali` datetime(0) NULL DEFAULT NULL,
  `tgl_pengembalian` datetime(0) NULL DEFAULT NULL,
  `status_peminjaman` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_pengembalian` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pdf` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga_peminjaman` float NULL DEFAULT NULL,
  `denda` float NULL DEFAULT NULL,
  `id_sopir` int(5) NULL DEFAULT NULL,
  `harga_sopir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_peminjaman`) USING BTREE,
  INDEX `id_motor`(`id_motor`) USING BTREE,
  INDEX `id_customer`(`id_pelanggan`) USING BTREE,
  INDEX `id_admin`(`id_customerservice`) USING BTREE,
  INDEX `id_sopir`(`id_sopir`) USING BTREE,
  CONSTRAINT `transaksi_peminjaman_ibfk_5` FOREIGN KEY (`id_motor`) REFERENCES `motor` (`id_motor`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `transaksi_peminjaman_ibfk_6` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `transaksi_peminjaman_ibfk_7` FOREIGN KEY (`id_customerservice`) REFERENCES `customerservice` (`id_customerservice`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `transaksi_peminjaman_ibfk_8` FOREIGN KEY (`id_sopir`) REFERENCES `sopir` (`id_sopir`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi_peminjaman
-- ----------------------------
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-1A4BWHETJJ', 29, NULL, 40, '2023-07-18 09:35:17', '2023-07-19 09:35:17', NULL, '4', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/8977ea7f-1192-4a02-b855-7ac1df07fa99/pdf', 275000, NULL, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-1SDT3WVCOG', 26, 2, 33, '2022-01-24 22:19:38', '2022-01-25 22:19:38', '2022-01-24 22:20:00', '2', 'Sesuai Jadwal', 'https://app.sandbox.midtrans.com/snap/v1/transactions/3eef047e-fbfd-4527-8151-48c51172c5c8/pdf', 300000, 0, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-1UAGYC8R0F', 28, NULL, 37, '2023-07-16 19:41:02', '2023-07-18 19:41:02', NULL, '2', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/2a32ecc3-c0b9-43c6-af81-3b03663f1219/pdf', 600000, NULL, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-2WZ47TP4LB', 25, 2, 34, '2022-01-24 22:18:14', '2022-01-25 22:18:14', '2022-01-24 22:18:00', '4', 'Sesuai Jadwal', 'https://app.sandbox.midtrans.com/snap/v1/transactions/f3348d9c-3b26-4841-946d-ef7c2e49c13f/pdf', 250000, 0, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-53VAJ6STSJ', 18, 1, 42, '2022-01-24 22:21:39', '2022-01-26 22:21:39', '2023-07-31 08:32:00', '4', 'Terlambat', 'https://app.sandbox.midtrans.com/snap/v1/transactions/fa7d3dc9-e0d5-4218-ade1-f5d2262a15e5/pdf', 500000, 275000000, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-8KZ05JWC3R', 24, 2, 32, '2022-01-24 22:16:49', '2022-01-25 22:16:49', '2022-01-24 22:17:00', '4', 'Sesuai Jadwal', 'https://app.sandbox.midtrans.com/snap/v1/transactions/4b4ce32b-5b33-4606-b6fa-7967b678d82d/pdf', 300000, 0, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-9BWZSH8IX9', 22, 1, 52, '2022-01-24 22:29:04', '2022-01-30 22:29:04', '2023-07-31 08:57:00', '4', 'Terlambat', 'https://app.sandbox.midtrans.com/snap/v1/transactions/15ecc0d9-26f7-48fd-8c03-5757be8c14a9/pdf', 2700000, 1474200000, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-B9CQR10B35', 29, NULL, 42, '2023-08-17 11:41:30', '2023-08-19 11:41:30', NULL, '5', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/27a2b717-c8ee-435a-950a-e5948503d0eb/pdf', 700000, NULL, 1, '100000');
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-DPYPL47QL7', 19, 1, 39, '2022-01-25 22:23:43', '2022-01-29 22:23:43', '2023-07-31 08:50:00', '4', 'Terlambat', 'https://app.sandbox.midtrans.com/snap/v1/transactions/404e132d-3946-4c5c-8638-5dfcf6d96312/pdf', 1000000, 547000000, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-EH615ZEVWJ', 22, 1, 50, '2022-01-26 22:09:40', '2022-01-27 22:09:40', '2022-01-24 22:10:00', '4', 'Sesuai Jadwal', 'https://app.sandbox.midtrans.com/snap/v1/transactions/bb8ff67b-f2e2-4950-aefc-807904bd5a4c/pdf', 275000, 0, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-GVPPCMP7Z6', 19, 1, 36, '2022-01-25 21:49:49', '2022-01-26 21:49:49', '2022-01-24 21:50:00', '4', 'Sesuai Jadwal', 'https://app.sandbox.midtrans.com/snap/v1/transactions/96991677-4dc0-4142-86f3-717a52c69d14/pdf', 275000, 0, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-LIMYYGAJHJ', 24, NULL, 37, '2022-01-26 17:22:25', '2022-01-27 17:22:25', NULL, '5', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/4e053df7-5a38-4e88-8f7e-fa083353a2f3/pdf', 300000, NULL, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-MI1NL2AQG3', 21, NULL, 33, '2022-01-24 22:26:36', '2022-01-27 22:26:36', NULL, '3', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/e0fcc8c5-8604-444f-bec8-674905b3168a/pdf', 900000, NULL, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-PQG8BU69GM', 23, 2, 33, '2022-01-24 22:13:27', '2022-01-25 22:13:27', '2022-01-24 22:14:00', '4', 'Sesuai Jadwal', 'https://app.sandbox.midtrans.com/snap/v1/transactions/b0d14844-a365-4505-929d-e5d1e39f72f2/pdf', 300000, 0, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-RAZE8MLLX3', 21, 1, 44, '2022-01-24 22:03:49', '2022-01-25 22:03:49', '2022-01-24 22:04:00', '4', 'Sesuai Jadwal', 'https://app.sandbox.midtrans.com/snap/v1/transactions/a8a32698-cf2a-4fa5-8968-0c9dc54ba2ab/pdf', 350000, 0, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-UGIJXD853O', 18, 1, 37, '2022-01-25 21:42:25', '2022-01-26 21:42:25', '2022-01-24 21:43:00', '4', 'Sesuai Jadwal', 'https://app.sandbox.midtrans.com/snap/v1/transactions/22b908e7-6779-4fc0-a418-b62d65fe3b2a/pdf', 300000, 0, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-X8E5G06TZN', 20, NULL, 43, '2022-01-24 22:27:56', '2022-01-31 22:27:56', NULL, '3', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/61eefe06-5ef1-4415-97ee-0c06e0ccdb90/pdf', 1750000, NULL, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-XG1L8JM96A', 20, 1, 48, '2022-01-25 00:03:48', '2022-01-26 12:03:48', '2022-01-24 22:03:00', '4', 'Sesuai Jadwal', 'https://app.sandbox.midtrans.com/snap/v1/transactions/f5003c61-b1c0-4f72-aa97-ade98ca4c01d/pdf', 250000, 0, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-ZBMR6GEN8H', 24, NULL, 32, '2022-01-27 10:41:45', '2022-01-28 10:41:45', NULL, '5', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/8e5fdaec-e710-4327-b880-b00d710b40e9/pdf', 300000, NULL, NULL, NULL);
INSERT INTO `transaksi_peminjaman` VALUES ('RENT-ZH58ZO6VU9', 25, NULL, 36, '2022-01-27 13:54:51', '2022-01-28 13:54:51', NULL, '5', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/91ea1a75-f2e0-4d4e-af03-d77bca6204d9/pdf', 275000, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type`  (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nama_type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_type`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES (6, 'SUV');
INSERT INTO `type` VALUES (7, 'MPV');
INSERT INTO `type` VALUES (8, 'Sedan');
INSERT INTO `type` VALUES (9, 'Tipe V Diesel');
INSERT INTO `type` VALUES (10, 'Tipe G Diesel');

SET FOREIGN_KEY_CHECKS = 1;
