/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50710
 Source Host           : localhost
 Source Database       : dmol

 Target Server Type    : MySQL
 Target Server Version : 50710
 File Encoding         : utf-8

 Date: 05/16/2016 23:40:39 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `dm_admin`
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
--  Table structure for `dm_dma`
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
--  Table structure for `dm_dma_extra`
-- ----------------------------
DROP TABLE IF EXISTS `dm_dma_extra`;
CREATE TABLE `dm_dma_extra` (
  `dm_id` int(11) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_keyword` varchar(255) NOT NULL,
  `seo_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dm_user`
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

SET FOREIGN_KEY_CHECKS = 1;
