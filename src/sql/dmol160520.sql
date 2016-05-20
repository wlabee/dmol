/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : dmol

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2016-05-20 16:42:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dm_admin
-- ----------------------------
DROP TABLE IF EXISTS `dm_admin`;
CREATE TABLE `dm_admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0正常',
  `create_time` int(11) NOT NULL,
  `create_date` date NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dm_admin
-- ----------------------------

-- ----------------------------
-- Table structure for dm_dma
-- ----------------------------
DROP TABLE IF EXISTS `dm_dma`;
CREATE TABLE `dm_dma` (
  `dm_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `create_time` int(11) NOT NULL,
  `create_date` date NOT NULL,
  PRIMARY KEY (`dm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dm_dma
-- ----------------------------

-- ----------------------------
-- Table structure for dm_dma_extra
-- ----------------------------
DROP TABLE IF EXISTS `dm_dma_extra`;
CREATE TABLE `dm_dma_extra` (
  `dm_id` int(11) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_keyword` varchar(255) NOT NULL,
  `seo_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dm_dma_extra
-- ----------------------------

-- ----------------------------
-- Table structure for dm_dma_group
-- ----------------------------
DROP TABLE IF EXISTS `dm_dma_group`;
CREATE TABLE `dm_dma_group` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_name` varchar(30) NOT NULL COMMENT '组名',
  `g_value` text NOT NULL COMMENT '组,的所有标签',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`g_id`),
  KEY `idx_name` (`g_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dm_dma_group
-- ----------------------------

-- ----------------------------
-- Table structure for dm_dma_mark
-- ----------------------------
DROP TABLE IF EXISTS `dm_dma_mark`;
CREATE TABLE `dm_dma_mark` (
  `mk_id` int(11) NOT NULL AUTO_INCREMENT,
  `mk_name` varchar(30) NOT NULL COMMENT '标签名',
  `mk_type` varchar(20) NOT NULL COMMENT '标签类型',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0正常',
  PRIMARY KEY (`mk_id`),
  KEY `idx_name` (`mk_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dm_dma_mark
-- ----------------------------

-- ----------------------------
-- Table structure for dm_user
-- ----------------------------
DROP TABLE IF EXISTS `dm_user`;
CREATE TABLE `dm_user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `nick_name` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态，（锁定，异常等）。0正常',
  `create_time` int(11) NOT NULL,
  `create_date` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dm_user
-- ----------------------------
