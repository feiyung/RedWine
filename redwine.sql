/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : redwine

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-10-12 13:46:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for zy_admin
-- ----------------------------
DROP TABLE IF EXISTS `zy_admin`;
CREATE TABLE `zy_admin` (
  `ad_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `ad_password` varchar(50) NOT NULL DEFAULT '' COMMENT '密码',
  `add_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `login_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `is_super` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为超级管理员，1是，0不是',
  `is_normal` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否正常，1正常，0不正常',
  `group_id` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '所属权限分组，0表示无权限分组',
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='红酒系统管理员表';

-- ----------------------------
-- Records of zy_admin
-- ----------------------------
INSERT INTO `zy_admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1507687426', '0', '0', '0', '1', '0');
INSERT INTO `zy_admin` VALUES ('2', '黄飞', 'e10adc3949ba59abbe56e057f20f883e', '1507778588', '0', '0', '1', '1', '0');

-- ----------------------------
-- Table structure for zy_admin_access
-- ----------------------------
DROP TABLE IF EXISTS `zy_admin_access`;
CREATE TABLE `zy_admin_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `p_name` varchar(20) NOT NULL COMMENT '权限名称',
  `url` varchar(255) NOT NULL,
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否正常，1正常，0不正常',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户权限表';

-- ----------------------------
-- Records of zy_admin_access
-- ----------------------------
INSERT INTO `zy_admin_access` VALUES ('1', '0', '管理员管理', '', '1507526065', '1507540342', '0');
INSERT INTO `zy_admin_access` VALUES ('2', '1', '用户管理', 'admin/adminlist', '1507526981', '1507539725', '1');
INSERT INTO `zy_admin_access` VALUES ('3', '1', '权限管理', 'admin/accesslist', '1507527127', '1507539739', '1');
INSERT INTO `zy_admin_access` VALUES ('4', '1', '分组管理', '', '1507539776', '1507540426', '1');

-- ----------------------------
-- Table structure for zy_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `zy_admin_role`;
CREATE TABLE `zy_admin_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(15) NOT NULL COMMENT '角色名',
  `ad_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `son_access` text COMMENT '子权限',
  `parent_access` text COMMENT '父权限',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1正常，0不正常',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of zy_admin_role
-- ----------------------------
INSERT INTO `zy_admin_role` VALUES ('1', '1', '0', null, null, '1507599664', '1507599664', '1');
INSERT INTO `zy_admin_role` VALUES ('2', '超级管理员', '0', null, null, '1507600013', '1507600013', '1');

-- ----------------------------
-- Table structure for zy_redwine
-- ----------------------------
DROP TABLE IF EXISTS `zy_redwine`;
CREATE TABLE `zy_redwine` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wine_name` varchar(30) DEFAULT NULL COMMENT '酒名',
  `class_id` int(10) unsigned DEFAULT NULL COMMENT '分类id',
  `property_id` int(10) unsigned DEFAULT NULL COMMENT '属性id',
  `sales_num` int(10) unsigned DEFAULT '0' COMMENT '销量',
  `sku_num` int(10) unsigned DEFAULT NULL COMMENT '库存',
  `create_time` int(11) unsigned DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  `status` tinyint(1) unsigned DEFAULT NULL,
  `price` int(10) unsigned DEFAULT NULL COMMENT '价格',
  `description` varchar(255) DEFAULT NULL COMMENT '说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='红酒表';

-- ----------------------------
-- Records of zy_redwine
-- ----------------------------
INSERT INTO `zy_redwine` VALUES ('1', '拉菲', null, null, '50', '0', '1507615977', '1507618656', '1', '10000', '拉菲拉菲拉菲');
INSERT INTO `zy_redwine` VALUES ('2', '波尔多干红', null, null, '10', '90', '1507618839', '1507618839', '1', '500', '');
INSERT INTO `zy_redwine` VALUES ('3', '长城干红', null, null, '25', '75', '1507620284', '1507620336', '1', '100', '干红');

-- ----------------------------
-- Table structure for zy_sku
-- ----------------------------
DROP TABLE IF EXISTS `zy_sku`;
CREATE TABLE `zy_sku` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wine_id` int(10) unsigned NOT NULL COMMENT '酒id',
  `property_id` int(10) unsigned NOT NULL COMMENT '库存属性id',
  `price` int(10) unsigned DEFAULT NULL COMMENT '价格',
  `sku_num` int(10) unsigned DEFAULT NULL COMMENT '库存数量',
  `sales_num` int(10) unsigned DEFAULT NULL COMMENT '销量',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of zy_sku
-- ----------------------------

-- ----------------------------
-- Table structure for zy_wineorder
-- ----------------------------
DROP TABLE IF EXISTS `zy_wineorder`;
CREATE TABLE `zy_wineorder` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_num` varchar(30) DEFAULT NULL COMMENT '订单号',
  `wine_id` int(10) unsigned DEFAULT NULL COMMENT '商品id',
  `wine_name` varchar(30) DEFAULT NULL COMMENT '商品名称',
  `price` int(10) unsigned DEFAULT NULL COMMENT '单价',
  `wine_num` int(10) unsigned DEFAULT NULL COMMENT '商品数量',
  `total_price` int(10) unsigned DEFAULT NULL COMMENT '订单总价',
  `ad_id` int(10) unsigned DEFAULT NULL COMMENT '订单创建者id',
  `ad_name` varchar(10) DEFAULT NULL COMMENT '创建者名称',
  `buy_name` varchar(10) DEFAULT NULL COMMENT '买家名',
  `buy_tel` varchar(11) DEFAULT NULL COMMENT '买家电话',
  `order_status` tinyint(1) unsigned DEFAULT '0' COMMENT '订单状态0未付款，1已付款',
  `create_time` int(11) unsigned DEFAULT NULL,
  `update_time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of zy_wineorder
-- ----------------------------
INSERT INTO `zy_wineorder` VALUES ('1', '1111111111', null, '拉菲', '100', '10', '1000', '1', null, null, null, '0', '0', '0');
INSERT INTO `zy_wineorder` VALUES ('2', '2017101070611', '3', '长城干红', '100', '12', '1200', '1', '0', '123', '123', '1', '1507626089', '1507626089');
INSERT INTO `zy_wineorder` VALUES ('3', '2017101178845', '2', '波尔多干红', '500', '50', '25000', '1', 'admin', 'admin', '1', '0', '1507689814', '1507689814');
INSERT INTO `zy_wineorder` VALUES ('4', '2017101176088', '1', '拉菲', '10000', '1', '10000', '1', 'admin', '1', '1', '0', '1507691297', '1507691297');
INSERT INTO `zy_wineorder` VALUES ('5', '2017101140850', '1', '拉菲', '10000', '1', '10000', '1', 'admin', '1', '15223408636', '0', '1507691703', '1507691703');
INSERT INTO `zy_wineorder` VALUES ('6', '2017101138578', '1', '拉菲', '10000', '1', '10000', '1', 'admin', '1', '15223408636', '0', '1507691869', '1507691869');
INSERT INTO `zy_wineorder` VALUES ('7', '2017101131131', '1', '拉菲', '10000', '1', '10000', '1', 'admin', '1', '15223408636', '0', '1507691919', '1507691919');
INSERT INTO `zy_wineorder` VALUES ('8', '2017101158030', '1', '拉菲', '10000', '1', '10000', '1', 'admin', '1', '15223408636', '0', '1507692043', '1507692043');
INSERT INTO `zy_wineorder` VALUES ('9', '2017101104306', '2', '波尔多干红', '500', '10', '5000', '1', 'admin', 'admin', '15223408636', '0', '1507692109', '1507692109');
INSERT INTO `zy_wineorder` VALUES ('10', '2017101157817', '3', '长城干红', '100', '25', '2500', null, null, '黄飞', '15223408636', '0', '1507709217', '1507709217');
INSERT INTO `zy_wineorder` VALUES ('11', '2017101223822', '1', '拉菲', '10000', '49', '490000', null, null, '111', '15223408636', '0', '1507774247', '1507774247');
