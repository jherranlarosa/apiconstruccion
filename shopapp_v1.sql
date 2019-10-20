/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 100316
Source Host           : localhost:3306
Source Database       : shopapp

Target Server Type    : MYSQL
Target Server Version : 100316
File Encoding         : 65001

Date: 2019-09-01 07:42:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for master_status
-- ----------------------------
DROP TABLE IF EXISTS `master_status`;
CREATE TABLE `master_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of master_status
-- ----------------------------
INSERT INTO `master_status` VALUES ('1', 'finalizado', 'finalizado', '1', '2019-09-01 05:34:43', '2019-09-01 05:34:43');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2016_06_01_000001_create_oauth_auth_codes_table', '1');
INSERT INTO `migrations` VALUES ('4', '2016_06_01_000002_create_oauth_access_tokens_table', '1');
INSERT INTO `migrations` VALUES ('5', '2016_06_01_000003_create_oauth_refresh_tokens_table', '1');
INSERT INTO `migrations` VALUES ('6', '2016_06_01_000004_create_oauth_clients_table', '1');
INSERT INTO `migrations` VALUES ('7', '2016_06_01_000005_create_oauth_personal_access_clients_table', '1');

-- ----------------------------
-- Table structure for oauth_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_access_tokens
-- ----------------------------
INSERT INTO `oauth_access_tokens` VALUES ('d17fea6a58c666904deea01f2ecbfac52229445aa67224e9e8756d3fb327f7ba7d117f1638312729', '6', '1', 'MyApp', '[]', '0', '2019-08-10 01:52:34', '2019-08-10 01:52:34', '2020-08-10 01:52:34');

-- ----------------------------
-- Table structure for oauth_auth_codes
-- ----------------------------
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_auth_codes
-- ----------------------------

-- ----------------------------
-- Table structure for oauth_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_clients
-- ----------------------------
INSERT INTO `oauth_clients` VALUES ('1', null, 'Laravel Personal Access Client', 'UPRcOGMskaV9ik2dSZHaeYVr6a701Sr1Ez31Mnuv', 'http://localhost', '1', '0', '0', '2019-08-10 01:47:15', '2019-08-10 01:47:15');
INSERT INTO `oauth_clients` VALUES ('2', null, 'Laravel Password Grant Client', 'n3qlVxMmswPk6yqd2eiaEHZ7F1o5gFuuEQWVl0Ck', 'http://localhost', '0', '1', '0', '2019-08-10 01:47:15', '2019-08-10 01:47:15');

-- ----------------------------
-- Table structure for oauth_personal_access_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_personal_access_clients
-- ----------------------------
INSERT INTO `oauth_personal_access_clients` VALUES ('1', '1', '2019-08-10 01:47:15', '2019-08-10 01:47:15');

-- ----------------------------
-- Table structure for oauth_refresh_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_refresh_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unitId` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stock` double(15,3) DEFAULT 0.000,
  `priceRial` double(15,3) DEFAULT 0.000,
  `priceSale` double(15,3) DEFAULT 0.000,
  `codeBar` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category` (`categoryId`),
  KEY `fk_product_unit` (`unitId`),
  CONSTRAINT `fk_product_category` FOREIGN KEY (`categoryId`) REFERENCES `product_category` (`id`),
  CONSTRAINT `fk_product_unit` FOREIGN KEY (`unitId`) REFERENCES `product_unit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('9', '6', '2', 'CASACA', 'CASACA COLOR MARRON', '1', '2019-08-26 21:31:12', '2019-08-26 21:31:12', '100.000', '150.550', '200.500', '1241341231');
INSERT INTO `product` VALUES ('10', '5', '2', 'PANTALON', 'PANTALON COLOR NEGRO', '1', '2019-08-26 21:37:37', '2019-08-26 21:37:37', '120.000', '100.000', '120.000', '1241341232');
INSERT INTO `product` VALUES ('11', '5', '1', 'ZAPATILLA', 'ZAPATILLA', '1', '2019-09-01 07:16:30', '2019-09-01 12:16:30', '300.000', '300.000', '300.000', null);

-- ----------------------------
-- Table structure for product_category
-- ----------------------------
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_category
-- ----------------------------
INSERT INTO `product_category` VALUES ('1', 'PRENDAS DE DAMA', 'PRENDAS DE MUJER2', '1', '2019-09-01 07:15:08', '2019-09-01 12:15:08');
INSERT INTO `product_category` VALUES ('2', 'PRENDAS DE VARÓN', 'PRENDAS DE HOMBRE', '1', '2019-08-01 17:54:16', '2019-08-01 22:54:16');
INSERT INTO `product_category` VALUES ('3', 'gola ', 'decsripciion2', '0', '2019-08-10 06:13:44', '2019-08-10 11:13:44');
INSERT INTO `product_category` VALUES ('4', 'categoria', '3', '0', '2019-08-10 04:56:13', '2019-08-10 09:56:13');
INSERT INTO `product_category` VALUES ('5', 'categori', '4', '0', '2019-08-10 04:57:10', '2019-08-10 09:57:10');
INSERT INTO `product_category` VALUES ('6', 'nueva', 'des', '0', '2019-08-10 11:32:09', '2019-08-10 16:32:09');
INSERT INTO `product_category` VALUES ('7', 'hola que tal ?', 'asd', '0', '2019-08-10 12:28:20', '2019-08-10 17:28:20');
INSERT INTO `product_category` VALUES ('8', 'CATEGORY3', 'SDSD', '0', '2019-08-10 12:28:16', '2019-08-10 17:28:16');

-- ----------------------------
-- Table structure for product_comentary
-- ----------------------------
DROP TABLE IF EXISTS `product_comentary`;
CREATE TABLE `product_comentary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `userId` bigint(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_comentary_product` (`productId`) USING BTREE,
  KEY `fk_user_comentary` (`userId`),
  CONSTRAINT `fk_product_comentary_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_comentary` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_comentary
-- ----------------------------

-- ----------------------------
-- Table structure for product_image
-- ----------------------------
DROP TABLE IF EXISTS `product_image`;
CREATE TABLE `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT '',
  `name` varchar(255) DEFAULT '',
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_image_product` (`productId`),
  CONSTRAINT `fk_image_product` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_image
-- ----------------------------
INSERT INTO `product_image` VALUES ('7', '9', 'localhost:8000/imageProduct/Revg5YIf4G6xObUj8lF8UCrj9wvzqYK5MXKJYFf2.png', '1', '1', '2019-08-29 23:39:25', '2019-08-29 23:39:25');
INSERT INTO `product_image` VALUES ('8', '10', 'localhost:8000/imageProduct/GfBJ24rFOzGSCFtKRK2pRq3unG16YNUple7LSma8.png', '2', '1', '2019-08-29 23:39:26', '2019-08-29 23:39:26');

-- ----------------------------
-- Table structure for product_unit
-- ----------------------------
DROP TABLE IF EXISTS `product_unit`;
CREATE TABLE `product_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_unit
-- ----------------------------
INSERT INTO `product_unit` VALUES ('1', 'Metros', 'Metros', '0', '2019-08-10 06:12:46', '2019-08-10 11:12:46');
INSERT INTO `product_unit` VALUES ('2', 'Centimentos', 'edit with postman', '0', '2019-08-10 06:12:57', '2019-08-10 11:12:57');
INSERT INTO `product_unit` VALUES ('3', 'Unidades', 'descrip', '0', '2019-08-10 04:51:54', '2019-08-10 09:51:53');
INSERT INTO `product_unit` VALUES ('4', 'nueva', 'MODIFI', '0', '2019-08-10 04:24:30', '2019-08-10 04:24:30');
INSERT INTO `product_unit` VALUES ('5', 'UNIDESDES', 'UNIDADES2', '1', '2019-09-01 07:14:58', '2019-09-01 12:14:58');
INSERT INTO `product_unit` VALUES ('6', 'KG', 'KILO GRAMOS', '1', '2019-08-01 17:25:32', '2019-08-01 22:25:32');
INSERT INTO `product_unit` VALUES ('7', 'UNIDAD3', 'DES', '0', '2019-08-10 12:28:03', '2019-08-10 17:28:03');
INSERT INTO `product_unit` VALUES ('8', 'PRUEBA DE CREACION', 'DESCRIPCIO', '0', '2019-08-14 15:56:35', '2019-08-14 20:56:35');

-- ----------------------------
-- Table structure for sale
-- ----------------------------
DROP TABLE IF EXISTS `sale`;
CREATE TABLE `sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userSellerId` bigint(20) DEFAULT NULL,
  `userClientId` bigint(20) DEFAULT NULL,
  `masterStatusId` int(11) DEFAULT NULL,
  `total_amount` double(15,3) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `igv_amount` double(15,3) DEFAULT NULL,
  `net_amount` double(15,3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_client` (`userClientId`),
  KEY `fk_user_seller` (`userSellerId`),
  KEY `fk_sale_master_status` (`masterStatusId`),
  CONSTRAINT `fk_sale_master_status` FOREIGN KEY (`masterStatusId`) REFERENCES `master_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_client` FOREIGN KEY (`userClientId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_seller` FOREIGN KEY (`userSellerId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sale
-- ----------------------------
INSERT INTO `sale` VALUES ('23', '1', '8', '1', '320.500', '1', '2019-09-01 11:29:07', '2019-09-01 11:29:07', '0.000', '320.500');
INSERT INTO `sale` VALUES ('24', '1', '8', '1', '320.500', '1', '2019-09-01 11:32:21', '2019-09-01 11:32:21', '0.000', '320.500');
INSERT INTO `sale` VALUES ('25', '1', '8', '1', '320.500', '1', '2019-09-01 11:32:54', '2019-09-01 11:32:54', '0.000', '320.500');
INSERT INTO `sale` VALUES ('26', '1', '8', '1', '320.500', '1', '2019-09-01 11:33:11', '2019-09-01 11:33:11', '0.000', '320.500');
INSERT INTO `sale` VALUES ('27', '1', '8', '1', '320.500', '1', '2019-09-01 11:33:42', '2019-09-01 11:33:42', '0.000', '320.500');
INSERT INTO `sale` VALUES ('28', '1', '9', '1', '320.500', '1', '2019-09-01 11:39:02', '2019-09-01 11:39:02', '0.000', '320.500');

-- ----------------------------
-- Table structure for sale_detail
-- ----------------------------
DROP TABLE IF EXISTS `sale_detail`;
CREATE TABLE `sale_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `saleId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_detail_product` (`productId`),
  KEY `fk_detail_sale` (`saleId`),
  CONSTRAINT `fk_detail_product` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detail_sale` FOREIGN KEY (`saleId`) REFERENCES `sale` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sale_detail
-- ----------------------------
INSERT INTO `sale_detail` VALUES ('1', null, null, '1', '2019-08-10 03:11:40', '2019-08-10 03:11:40');
INSERT INTO `sale_detail` VALUES ('5', '28', '9', '1', '2019-09-01 11:39:02', '2019-09-01 11:39:02');
INSERT INTO `sale_detail` VALUES ('6', '28', '10', '1', '2019-09-01 11:39:02', '2019-09-01 11:39:02');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rolId` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `documentIdentification` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `fk_user_rol` (`rolId`),
  CONSTRAINT `fk_user_rol` FOREIGN KEY (`rolId`) REFERENCES `user_rol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'admin', 'jherranlarosa@gmail.com', null, '$2y$10$0rycLgFZJ0wa9mVrwn90hOg9ojKHx9JYpAgXQXTdP3ptbA.vOry4i', null, '2019-08-10 01:46:12', '2019-08-10 01:46:12', null, null);
INSERT INTO `users` VALUES ('2', '2', 'seller', 'jherran@gmail.com', null, '$2y$10$PRqF9MuNQMJbk3fBxUbyJeQ1g0G6jSATagwrhXlu7lOZUrwyunebK', null, '2019-08-10 01:50:07', '2019-08-10 01:50:07', null, null);
INSERT INTO `users` VALUES ('3', '3', 'client', 'jherran2@gmail.com', null, '$2y$10$bj19tUEP2mfHTngKw8dwIOVqLFWOsoC6ffMYkzQvYaMGgWI0yAxfG', null, '2019-08-10 01:51:32', '2019-08-10 01:51:32', null, null);
INSERT INTO `users` VALUES ('4', null, 'editor2', 'jherran2xd@gmail.com', null, '$2y$10$HwcDml3HVFTQOBLLLhggJuOB.DTyUcYyKspNIaPKZpMlvK.sGoelG', null, '2019-08-10 01:52:34', '2019-08-10 01:52:34', null, null);
INSERT INTO `users` VALUES ('7', '3', 'HERRAN LA ROSA JULIO CESAR', null, null, '$2y$10$OyUtsNJqh3Arct.4ybso1eJsi/ThQljFw8YRFqJaVH3p3JpbTca8q', null, '2019-09-01 11:27:24', '2019-09-01 11:27:24', null, null);
INSERT INTO `users` VALUES ('8', '3', 'HERRAN LA ROSA JULIO CESAR', null, null, '$2y$10$2wqTq5s3cMaBSNmkSWJn5eL344CeWtfbK/nCSQT4/nElf9hiFt.sW', null, '2019-09-01 11:28:31', '2019-09-01 11:28:31', '71123308', '71123308');
INSERT INTO `users` VALUES ('9', '3', 'LOAYZA RINCON ANDREA', null, null, '$2y$10$RCCAHmQhqrmeAWanrx.Al.YQpjJG7nCHRj9F26nuw3KN/KpbS8k6m', null, '2019-09-01 11:39:02', '2019-09-01 11:39:02', '31122210', '31122210');

-- ----------------------------
-- Table structure for user_module
-- ----------------------------
DROP TABLE IF EXISTS `user_module`;
CREATE TABLE `user_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_module
-- ----------------------------
INSERT INTO `user_module` VALUES ('1', 'Inventario', 'Mdl Inventario', '1', '2019-08-10 02:58:58', '2019-08-10 02:58:58');
INSERT INTO `user_module` VALUES ('2', 'Ventas', 'Mdl Ventas', '1', '2019-08-10 02:59:07', '2019-08-10 02:59:07');

-- ----------------------------
-- Table structure for user_module_rol
-- ----------------------------
DROP TABLE IF EXISTS `user_module_rol`;
CREATE TABLE `user_module_rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moduleId` int(11) DEFAULT NULL,
  `rolId` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_module` (`moduleId`),
  KEY `fk_rol` (`rolId`),
  CONSTRAINT `fk_module` FOREIGN KEY (`moduleId`) REFERENCES `user_module` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rol` FOREIGN KEY (`rolId`) REFERENCES `user_rol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_module_rol
-- ----------------------------
INSERT INTO `user_module_rol` VALUES ('1', '1', '1', 'user admin', '1', '2019-08-10 03:00:46', '2019-08-10 03:00:46');
INSERT INTO `user_module_rol` VALUES ('2', '2', '2', 'user seller', '1', '2019-08-10 03:00:44', '2019-08-10 03:00:44');

-- ----------------------------
-- Table structure for user_rol
-- ----------------------------
DROP TABLE IF EXISTS `user_rol`;
CREATE TABLE `user_rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_rol
-- ----------------------------
INSERT INTO `user_rol` VALUES ('1', 'admin', 'administrador', '1', '2019-08-10 02:59:17', '2019-08-10 02:59:17');
INSERT INTO `user_rol` VALUES ('2', 'seller', 'user seller', '1', '2019-08-10 02:59:51', '2019-08-10 02:59:51');
INSERT INTO `user_rol` VALUES ('3', 'client', 'user client', '1', '2019-09-01 05:32:52', '2019-09-01 05:32:52');
SET FOREIGN_KEY_CHECKS=1;
