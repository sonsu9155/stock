/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : stock_db

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 08/04/2019 08:30:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for buy_histories
-- ----------------------------
DROP TABLE IF EXISTS `buy_histories`;
CREATE TABLE `buy_histories`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `stock_type_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `method` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `before_amount` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `buy_histories_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `buy_histories_stock_type_id_foreign`(`stock_type_id`) USING BTREE,
  CONSTRAINT `buy_histories_stock_type_id_foreign` FOREIGN KEY (`stock_type_id`) REFERENCES `stock_types` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `buy_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of buy_histories
-- ----------------------------
INSERT INTO `buy_histories` VALUES (1, 1, 1, 12, 10, 'margin', 1000, 1, '2019-04-15 03:23:31', '2019-04-16 03:23:34');

-- ----------------------------
-- Table structure for deposit_histories
-- ----------------------------
DROP TABLE IF EXISTS `deposit_histories`;
CREATE TABLE `deposit_histories`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `method` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `before_amount` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `deposit_histories_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `deposit_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of deposit_histories
-- ----------------------------
INSERT INTO `deposit_histories` VALUES (1, 1, 100, '', 10000000, '2019-04-08 03:41:31', '2019-04-08 03:41:34');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2010_01_01_000000_create_money_wallets_table', 1);
INSERT INTO `migrations` VALUES (2, '2010_01_01_000001_create_stock_wallets_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (4, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (5, '2016_04_06_231711_create_table_stock_types', 1);
INSERT INTO `migrations` VALUES (6, '2016_04_06_231732_create_table_news', 1);
INSERT INTO `migrations` VALUES (7, '2016_09_05_115359_laratrust_setup_tables', 1);
INSERT INTO `migrations` VALUES (8, '2016_11_22_155121_create_table_user_sessions', 1);
INSERT INTO `migrations` VALUES (9, '2019_04_06_231650_create_table_buy_histories', 1);
INSERT INTO `migrations` VALUES (10, '2019_04_06_231650_create_table_sell_histories', 1);
INSERT INTO `migrations` VALUES (11, '2019_04_06_231650_create_table_deposit_histories', 2);
INSERT INTO `migrations` VALUES (12, '2019_04_06_231650_create_table_withdraw_histories', 2);

-- ----------------------------
-- Table structure for money_wallets
-- ----------------------------
DROP TABLE IF EXISTS `money_wallets`;
CREATE TABLE `money_wallets`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `before_amount` int(11) NOT NULL,
  `after_amount` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of money_wallets
-- ----------------------------
INSERT INTO `money_wallets` VALUES (1, 10, 10, '2019-04-06 10:05:12', '2019-04-06 10:05:16');
INSERT INTO `money_wallets` VALUES (2, 0, 0, '2019-04-08 18:42:38', '2019-04-08 18:42:38');
INSERT INTO `money_wallets` VALUES (3, 0, 0, '2019-04-08 18:42:53', '2019-04-08 18:42:53');
INSERT INTO `money_wallets` VALUES (4, 0, 0, '2019-04-08 18:44:24', '2019-04-08 18:44:24');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE,
  INDEX `password_resets_token_index`(`token`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `permission_role_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user`  (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`, `role_id`) USING BTREE,
  INDEX `role_user_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES (1, 1);
INSERT INTO `role_user` VALUES (2, 2);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'super_admin', 'Super Admin', 'Super Admin', '2016-09-08 04:36:39', '2016-09-08 04:36:39');
INSERT INTO `roles` VALUES (2, 'pabrik_admin', 'Admin Pabrik', 'Admin Pabrik', '2016-09-08 04:36:39', '2016-09-08 04:36:39');

-- ----------------------------
-- Table structure for sell_histories
-- ----------------------------
DROP TABLE IF EXISTS `sell_histories`;
CREATE TABLE `sell_histories`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `stock_type_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `method` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `before_amount` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sell_histories_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `sell_histories_stock_type_id_foreign`(`stock_type_id`) USING BTREE,
  CONSTRAINT `sell_histories_stock_type_id_foreign` FOREIGN KEY (`stock_type_id`) REFERENCES `stock_types` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `sell_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sell_histories
-- ----------------------------
INSERT INTO `sell_histories` VALUES (1, 1, 1, 12, 10, 'margin', 1000, 1, '2019-04-08 03:32:25', '2019-04-08 03:32:28');

-- ----------------------------
-- Table structure for stock_types
-- ----------------------------
DROP TABLE IF EXISTS `stock_types`;
CREATE TABLE `stock_types`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `option` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cn_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of stock_types
-- ----------------------------
INSERT INTO `stock_types` VALUES (1, '123', '8979', '123123123', '2019-04-08 15:24:43', '2019-04-08 15:24:43');
INSERT INTO `stock_types` VALUES (2, '234', '12341234', 'asdfsadfas', '2019-04-08 15:37:48', '2019-04-08 15:37:48');
INSERT INTO `stock_types` VALUES (3, '345', '123123', 'sdfsdf', '2019-04-08 15:39:47', '2019-04-08 15:39:47');
INSERT INTO `stock_types` VALUES (4, '345', 'sdfsadf', 'sadfsdf', '2019-04-08 15:40:00', '2019-04-08 15:40:00');
INSERT INTO `stock_types` VALUES (5, '456', 'sdfsdf', 'sfdsfdsfd', '2019-04-08 15:40:13', '2019-04-08 15:40:13');

-- ----------------------------
-- Table structure for stock_wallets
-- ----------------------------
DROP TABLE IF EXISTS `stock_wallets`;
CREATE TABLE `stock_wallets`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `before_amount` int(11) NOT NULL,
  `after_amount` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of stock_wallets
-- ----------------------------
INSERT INTO `stock_wallets` VALUES (1, 10, 10, '2019-04-06 10:05:46', '2019-04-06 10:05:49');
INSERT INTO `stock_wallets` VALUES (2, 0, 0, '2019-04-08 18:42:38', '2019-04-08 18:42:38');
INSERT INTO `stock_wallets` VALUES (3, 0, 0, '2019-04-08 18:42:53', '2019-04-08 18:42:53');
INSERT INTO `stock_wallets` VALUES (4, 0, 0, '2019-04-08 18:44:24', '2019-04-08 18:44:24');

-- ----------------------------
-- Table structure for user_session
-- ----------------------------
DROP TABLE IF EXISTS `user_session`;
CREATE TABLE `user_session`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_session
-- ----------------------------
INSERT INTO `user_session` VALUES (1, 1, '3rjqdLnF7j5tAXjtzOQgIXDl6lfVzfqBFXfFXpMU', '2019-04-07 04:10:05', '2019-04-08 16:47:37');
INSERT INTO `user_session` VALUES (2, 3, 'N4c0YjLvIzt0Kka8RUzEqUHrTH3QOEcepDPJfr1U', '2019-04-08 18:51:15', '2019-04-08 18:51:15');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `verification_num` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idcard` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `money_wallet_id` int(10) UNSIGNED NOT NULL,
  `stock_wallet_id` int(10) UNSIGNED NOT NULL,
  `forgot_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_phone_unique`(`phone`) USING BTREE,
  UNIQUE INDEX `users_verification_num_unique`(`verification_num`) USING BTREE,
  INDEX `users_money_wallet_id_foreign`(`money_wallet_id`) USING BTREE,
  INDEX `users_stock_wallet_id_foreign`(`stock_wallet_id`) USING BTREE,
  CONSTRAINT `users_money_wallet_id_foreign` FOREIGN KEY (`money_wallet_id`) REFERENCES `money_wallets` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `users_stock_wallet_id_foreign` FOREIGN KEY (`stock_wallet_id`) REFERENCES `stock_wallets` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'superadmin', '1111', '1111', 'admin', '$2y$10$YbLnaCn19lgc2xrSA.GFI.sqjKcvr/JAYkyKV.7g5LMmf7fNha/AC', 'asdf', 1, 1, 1, NULL, '5cH3h0oUBhH8sDrnBpVM405XfF5UKFHoYacZz6NcIyFdKtXvzWsPw1QZYrJ9', '2019-04-06 10:06:36', '2019-04-08 16:46:56');
INSERT INTO `users` VALUES (2, 'superadmin2', '11113', '11113', 'admin', '$2y$10$YbLnaCn19lgc2xrSA.GFI.sqjKcvr/JAYkyKV.7g5LMmf7fNha/AC', 'asdf', 1, 1, 1, NULL, NULL, '2019-04-06 10:06:36', '2019-04-06 10:06:39');
INSERT INTO `users` VALUES (3, '123', '123', '123', '123', '$2y$10$BOCcu8X.Ddia9xA4kFK2a.bX7TcQa9FNgFZo1q4W8s/Dc1jeRfIdq', '123', 1, 4, 4, NULL, NULL, '2019-04-08 18:44:24', '2019-04-08 18:44:24');

-- ----------------------------
-- Table structure for withdraw_histories
-- ----------------------------
DROP TABLE IF EXISTS `withdraw_histories`;
CREATE TABLE `withdraw_histories`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `method` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `before_amount` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `withdraw_histories_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `withdraw_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of withdraw_histories
-- ----------------------------
INSERT INTO `withdraw_histories` VALUES (1, 1, 100, '', 500000, '2019-04-08 03:37:32', '2019-04-08 03:37:34');

SET FOREIGN_KEY_CHECKS = 1;
