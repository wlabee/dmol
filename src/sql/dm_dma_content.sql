/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : dmol

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2016-05-24 17:08:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dm_dma_content
-- ----------------------------
DROP TABLE IF EXISTS `dm_dma_content`;
CREATE TABLE `dm_dma_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dm_id` int(11) NOT NULL,
  `mk_id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
