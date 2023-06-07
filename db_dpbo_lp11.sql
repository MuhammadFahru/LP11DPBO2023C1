/*
 Navicat Premium Data Transfer

 Source Server         : Local Mysql (XAMPP)
 Source Server Type    : MySQL
 Source Server Version : 100427 (10.4.27-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_dpbo_lp11

 Target Server Type    : MySQL
 Target Server Version : 100427 (10.4.27-MariaDB)
 File Encoding         : 65001

 Date: 08/06/2023 01:30:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pasien
-- ----------------------------
DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tempat` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tl` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telp` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pasien
-- ----------------------------
INSERT INTO `pasien` VALUES (1, '1234561001', 'Dinda', 'Bandung', '2020-12-11', 'Perempuan', 'dindawahyu@upi.edu', '088970803025');
INSERT INTO `pasien` VALUES (2, '6754327002', 'Wahyu', 'Cimahi', '2020-12-14', 'Laki-laki', 'wah@upi.edu', '089678898545');
INSERT INTO `pasien` VALUES (4, '7890654001', 'Ayang', 'Bandung', '2020-11-29', 'Perempuan', 'ay@gmail.com', '081321778980');
INSERT INTO `pasien` VALUES (5, '9876576008', 'Zulfan', 'bandung', '2021-01-04', 'Laki-laki', 'jull@gmai.com', '088970803025');
INSERT INTO `pasien` VALUES (6, '1234567009', 'Prilla', 'Seoul', '2001-05-05', 'Perempuan', 'prillarosaria@upi.edu', '081234876235');
INSERT INTO `pasien` VALUES (7, '7135712004', 'Son', 'Canada', '1994-02-21', 'Perempuan', 'chrstjsmn@gmail.com', '081573038425');
INSERT INTO `pasien` VALUES (8, '8478347011', 'Jeno', 'Incheon', '2000-12-23', 'Laki-laki', 'jeno@gmail.com', '08138746239');
INSERT INTO `pasien` VALUES (9, '8795642002', 'Mark', 'Canada', '1999-08-20', 'Laki-laki', 'mark@upi.edu', '08237218473');

SET FOREIGN_KEY_CHECKS = 1;
